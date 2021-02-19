<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Livewire;

class LivewireComponentsFinder
{
    /**
     * @var Filesystem
     */
    protected $filesystem;

    protected $manistest;

    /**
     * LivewireComponentsFinder constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function build($path, $namespace)
    {

        $this->manistest = $this->getClassNames(ComponentParser::generatePathFromNamespace($path))
            ->mapWithKeys(function ($class) {
                return [$class::getName() => $class];
            })->toArray();

        $this->write($this->manistest, $namespace);

        return $this;
    }

    public function write(array $manifest, $namespace)
    {


        foreach ($manifest as $value) {
            $alias = strtolower(str_replace('\\', '.', $value));
            $alias = Str::afterLast($alias, 'livewire.');
            $alias = str_replace('component', '', $alias);
            Livewire::component(sprintf('%s::%s', $namespace, $alias), $value);
        }
    }

    public function getClassNames($path)
    {

        return collect($this->filesystem->allFiles($path))->map(function (\SplFileInfo $file) {
            return app()->getNamespace() .
                \Livewire\str($file->getPathname())
                    ->after(app_path() . '/')
                    ->replace(['/', '.php'], ['\\', ''])->__toString();
        })->filter(function (string $class) {
            return is_subclass_of($class, Component::class) &&
                !(new \ReflectionClass($class))->isAbstract();
        });
    }
}
