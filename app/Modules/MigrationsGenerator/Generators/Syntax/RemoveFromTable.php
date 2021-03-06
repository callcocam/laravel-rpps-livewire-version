<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace SIGA\MigrationsGenerator\Generators\Syntax;

class RemoveFromTable extends AbstractTable {

    /**
     * Compile and return string for removing columns
     *
     * @param $migrationData
     * @param array $fields
     * @return mixed
     */
    public function remove($migrationData, array $fields)
    {
        $migrationData['method'] = 'table';

        $compiled = $this->compiler->compile($this->getTemplate(), $migrationData);

        return $this->replaceFieldsWith($this->dropColumns($fields), $compiled);
    }

    /**
     * Return string for dropping all columns
     *
     * @param array $fields
     * @return array
     */
    protected function dropColumns(array $fields)
    {
        $schema = [];

        foreach($fields as $field)
        {
            $schema[] = $this->dropColumn($field);
        }

        return $schema;
    }

    /**
     * Return string for dropping a column
     *
     * @param $field
     * @return string
     */
    private function dropColumn($field)
    {
        return sprintf("\$table->dropColumn('%s');", $field['field']);
    }

    protected function getItem(array $item)
    {
        // TODO: Implement getItem() method.
    }
}
