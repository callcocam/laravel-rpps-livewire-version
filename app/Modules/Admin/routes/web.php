<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  \App\Modules\Admin\App\Http\Livewire\Dashboard::class)->name('admin-admin-stores');

Route::get('/minha-conta', function () {
    return view('admin::profile');
})->name('admin-profile');


/**
 * Destroy an authenticated session.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse
 */
Route::get('/logout', function (\Illuminate\Http\Request $request) {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login');

})->name('logout');


Route::get('icons', \App\Modules\Admin\App\Http\Livewire\Icon::class)->name('icons.index');
Route::get('icons-brands', \App\Modules\Admin\App\Http\Livewire\IconBrands::class)->name('icons-brands.index');

Route::get('menus', \App\Modules\Admin\App\Http\Livewire\Menus\ListComponent::class)->name('menus.index');
Route::get('menus/create', \App\Modules\Admin\App\Http\Livewire\Menus\CreateComponent::class)->name('menus.create');
Route::get('menus/{menu}/edit', \App\Modules\Admin\App\Http\Livewire\Menus\EditComponent::class)->name('menus.edit');


Route::get('sub-menus', \App\Modules\Admin\App\Http\Livewire\SubMenus\ListComponent::class)->name('sub-menus.index');
Route::get('sub-menus/manager/menus', \App\Modules\Admin\App\Http\Livewire\SubMenus\ManagerComponent::class)->name('sub-menus.manager');
Route::get('sub-menus/create', \App\Modules\Admin\App\Http\Livewire\SubMenus\CreateComponent::class)->name('sub-menus.create');
Route::get('sub-menus/{submenu}/edit', \App\Modules\Admin\App\Http\Livewire\SubMenus\EditComponent::class)->name('sub-menus.edit');


Route::get('companies', \App\Modules\Admin\App\Http\Livewire\Companies\ListComponent::class)->name('companies.index');
Route::get('companies/create', \App\Modules\Admin\App\Http\Livewire\Companies\CreateComponent::class)->name('companies.create');
Route::get('companies/{company}/edit', \App\Modules\Admin\App\Http\Livewire\Companies\EditComponent::class)->name('companies.edit');


Route::get('roles', \App\Modules\Admin\App\Http\Livewire\Roles\ListComponent::class)->name('roles.index');
Route::get('roles/create', \App\Modules\Admin\App\Http\Livewire\Roles\CreateComponent::class)->name('roles.create');
Route::get('roles/{role}/edit', \App\Modules\Admin\App\Http\Livewire\Roles\EditComponent::class)->name('roles.edit');


Route::get('permissions', \App\Modules\Admin\App\Http\Livewire\Permissions\ListComponent::class)->name('permissions.index');
