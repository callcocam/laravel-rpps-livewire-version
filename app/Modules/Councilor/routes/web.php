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


Route::get('afiliacoes', \App\Modules\Councilor\App\Http\Livewire\Affiliations\ListComponent::class)->name('affiliations-admin-stores');
Route::get('afiliacoes/cadastrar', \App\Modules\Councilor\App\Http\Livewire\Affiliations\CreateComponent::class)->name('affiliations-admin-create');
Route::get('afiliacoes/{affiliation}/editar', \App\Modules\Councilor\App\Http\Livewire\Affiliations\EditComponent::class)->name('affiliations-admin-edit');
