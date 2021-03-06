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


Route::get('icons', \App\Modules\Admin\App\Http\Livewire\Utils\Icons::class)->name('icons-admin-index');

Route::get('translations', \App\Modules\Admin\App\Http\Livewire\Translations\ListComponent::class)->name('translations-admin-stores');
Route::get('translations/create', \App\Modules\Admin\App\Http\Livewire\Translations\CreateComponent::class)->name('translations-admin-create');
Route::get('translations/{translation}/edit', \App\Modules\Admin\App\Http\Livewire\Translations\EditComponent::class)->name('translations-admin-edit');

Route::get('users', \App\Modules\Admin\App\Http\Livewire\Users\ListComponent::class)->name('users-admin-stores');
Route::get('users/create', \App\Modules\Admin\App\Http\Livewire\Users\CreateComponent::class)->name('users-admin-create');
Route::get('users/{user}/edit', \App\Modules\Admin\App\Http\Livewire\Users\EditComponent::class)->name('users-admin-edit');

Route::get('menus', \App\Modules\Admin\App\Http\Livewire\Menus\ListComponent::class)->name('menus-admin-stores');
Route::get('menus/create', \App\Modules\Admin\App\Http\Livewire\Menus\CreateComponent::class)->name('menus-admin-create');
Route::get('menus/{menu}/edit', \App\Modules\Admin\App\Http\Livewire\Menus\EditComponent::class)->name('menus-admin-edit');


Route::get('sub-menus', \App\Modules\Admin\App\Http\Livewire\SubMenus\ListComponent::class)->name('sub-menus-admin-stores');
Route::get('sub-menus/manager/menus', \App\Modules\Admin\App\Http\Livewire\SubMenus\ManagerComponent::class)->name('sub-menus-admin-manager');
Route::get('sub-menus/create', \App\Modules\Admin\App\Http\Livewire\SubMenus\CreateComponent::class)->name('sub-menus-admin-create');
Route::get('sub-menus/{submenu}/edit', \App\Modules\Admin\App\Http\Livewire\SubMenus\EditComponent::class)->name('sub-menus-admin-edit');


Route::get('companies', \App\Modules\Admin\App\Http\Livewire\Companies\ListComponent::class)->name('companies-admin-stores');
Route::get('companies/create', \App\Modules\Admin\App\Http\Livewire\Companies\CreateComponent::class)->name('companies-admin-create');
Route::get('companies/{company}/edit', \App\Modules\Admin\App\Http\Livewire\Companies\EditComponent::class)->name('companies-admin-edit');


Route::get('roles', \App\Modules\Admin\App\Http\Livewire\Roles\ListComponent::class)->name('roles-admin-stores');
Route::get('roles/create', \App\Modules\Admin\App\Http\Livewire\Roles\CreateComponent::class)->name('roles-admin-create');
Route::get('roles/{role}/edit', \App\Modules\Admin\App\Http\Livewire\Roles\EditComponent::class)->name('roles-admin-edit');


Route::get('permissions', \App\Modules\Admin\App\Http\Livewire\Permissions\ListComponent::class)->name('permissions-admin-stores');
Route::get('permissions/create', \App\Modules\Admin\App\Http\Livewire\Permissions\CreateComponent::class)->name('permissions-admin-create');
Route::get('permissions/{permission}/edit', \App\Modules\Admin\App\Http\Livewire\Permissions\EditComponent::class)->name('permissions-admin-edit');

Route::get('posts', \App\Modules\Admin\App\Http\Livewire\Posts\ListComponent::class)->name('posts-admin-stores');
Route::get('posts/create', \App\Modules\Admin\App\Http\Livewire\Posts\CreateComponent::class)->name('posts-admin-create');
Route::get('posts/{post}/edit', \App\Modules\Admin\App\Http\Livewire\Posts\EditComponent::class)->name('posts-admin-edit');

Route::get('categories', \App\Modules\Admin\App\Http\Livewire\Categories\ListComponent::class)->name('categories-admin-stores');
Route::get('categories/create', \App\Modules\Admin\App\Http\Livewire\Categories\CreateComponent::class)->name('categories-admin-create');
Route::get('categories/{category}/edit', \App\Modules\Admin\App\Http\Livewire\Categories\EditComponent::class)->name('categories-admin-edit');


Route::get('sliders', \App\Modules\Admin\App\Http\Livewire\Sliders\ListComponent::class)->name('sliders-admin-stores');
Route::get('sliders/create', \App\Modules\Admin\App\Http\Livewire\Sliders\CreateComponent::class)->name('sliders-admin-create');
Route::get('sliders/{slider}/edit', \App\Modules\Admin\App\Http\Livewire\Sliders\EditComponent::class)->name('sliders-admin-edit');

