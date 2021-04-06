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


Route::get('vereadores', \App\Modules\Councilor\App\Http\Livewire\Users\ListComponent::class)->name('councilors-admin-stores');
Route::get('vereadores/cadastrar', \App\Modules\Councilor\App\Http\Livewire\Users\CreateComponent::class)->name('councilors-admin-create');
Route::get('vereadores/{councilor}/editar', \App\Modules\Councilor\App\Http\Livewire\Users\EditComponent::class)->name('councilors-admin-edit');


Route::get('afiliacoes', \App\Modules\Councilor\App\Http\Livewire\Affiliations\ListComponent::class)->name('affiliations-admin-stores');
Route::get('afiliacoes/cadastrar', \App\Modules\Councilor\App\Http\Livewire\Affiliations\CreateComponent::class)->name('affiliations-admin-create');
Route::get('afiliacoes/{affiliation}/editar', \App\Modules\Councilor\App\Http\Livewire\Affiliations\EditComponent::class)->name('affiliations-admin-edit');

Route::get('mandatos', \App\Modules\Councilor\App\Http\Livewire\Mandaties\ListComponent::class)->name('mandaties-admin-stores');
Route::get('mandatos/cadastrar', \App\Modules\Councilor\App\Http\Livewire\Mandaties\CreateComponent::class)->name('mandaties-admin-create');
Route::get('mandatos/{mandaty}/editar', \App\Modules\Councilor\App\Http\Livewire\Mandaties\EditComponent::class)->name('mandaties-admin-edit');

Route::get('legislaturas', \App\Modules\Councilor\App\Http\Livewire\Legislaturies\ListComponent::class)->name('legislaturies-admin-stores');
Route::get('legislaturas/cadastrar', \App\Modules\Councilor\App\Http\Livewire\Legislaturies\CreateComponent::class)->name('legislaturies-admin-create');
Route::get('legislaturas/{legislatury}/editar', \App\Modules\Councilor\App\Http\Livewire\Legislaturies\EditComponent::class)->name('legislaturies-admin-edit');

Route::get('mandato-sessoes', \App\Modules\Councilor\App\Http\Livewire\MandetieSessions\ListComponent::class)->name('mandetiesessions-admin-stores');
Route::get('mandato-sessoes/cadastrar', \App\Modules\Councilor\App\Http\Livewire\MandetieSessions\CreateComponent::class)->name('mandetiesessions-admin-create');
Route::get('mandato-sessoes/{mandetiesession}/editar', \App\Modules\Councilor\App\Http\Livewire\MandetieSessions\EditComponent::class)->name('mandetiesessions-admin-edit');

Route::get('rasoes-fim-madatos', \App\Modules\Councilor\App\Http\Livewire\MandateReasons\ListComponent::class)->name('mandatereasons-admin-stores');
Route::get('rasoes-fim-madatos/cadastrar', \App\Modules\Councilor\App\Http\Livewire\MandateReasons\CreateComponent::class)->name('mandatereasons-admin-create');
Route::get('rasoes-fim-madatos/{mandatereason}/editar', \App\Modules\Councilor\App\Http\Livewire\MandateReasons\EditComponent::class)->name('mandatereasons-admin-edit');

Route::get('atos-dos-vereadores', \App\Modules\Councilor\App\Http\Livewire\KindOfActs\ListComponent::class)->name('kindofacts-admin-stores');
Route::get('atos-dos-vereadores/cadastrar', \App\Modules\Councilor\App\Http\Livewire\KindOfActs\CreateComponent::class)->name('kindofacts-admin-create');
Route::get('atos-dos-vereadores/{mandatereason}/editar', \App\Modules\Councilor\App\Http\Livewire\KindOfActs\EditComponent::class)->name('kindofacts-admin-edit');

Route::get('corrente-afiliacoes', \App\Modules\Councilor\App\Http\Livewire\CurrentAffiliations\ListComponent::class)->name('currentaffiliations-admin-stores');
Route::get('corrente-afiliacoes/cadastrar', \App\Modules\Councilor\App\Http\Livewire\CurrentAffiliations\CreateComponent::class)->name('currentaffiliations-admin-create');
Route::get('corrente-afiliacoes/{currentaffiliation}/editar', \App\Modules\Councilor\App\Http\Livewire\CurrentAffiliations\EditComponent::class)->name('currentaffiliations-admin-edit');

Route::get('tipos-de-comissoes', \App\Modules\Councilor\App\Http\Livewire\CommissionTypes\ListComponent::class)->name('commissiontypes-admin-stores');
Route::get('tipos-de-comissoes/cadastrar', \App\Modules\Councilor\App\Http\Livewire\CommissionTypes\CreateComponent::class)->name('commissiontypes-admin-create');
Route::get('tipos-de-comissoes/{commissiontype}/editar', \App\Modules\Councilor\App\Http\Livewire\CommissionTypes\EditComponent::class)->name('commissiontypes-admin-edit');

Route::get('comissoes', \App\Modules\Councilor\App\Http\Livewire\Commissions\ListComponent::class)->name('commissions-admin-stores');
Route::get('comissoes/cadastrar', \App\Modules\Councilor\App\Http\Livewire\Commissions\CreateComponent::class)->name('commissions-admin-create');
Route::get('comissoes/{commissiontype}/editar', \App\Modules\Councilor\App\Http\Livewire\Commissions\EditComponent::class)->name('commissions-admin-edit');

Route::get('mesa-diretoras', \App\Modules\Councilor\App\Http\Livewire\BoardOfDirectors\ListComponent::class)->name('boardofdirectors-admin-stores');
Route::get('mesa-diretoras/cadastrar', \App\Modules\Councilor\App\Http\Livewire\BoardOfDirectors\CreateComponent::class)->name('boardofdirectors-admin-create');
Route::get('mesa-diretoras/{boardofdirector}/editar', \App\Modules\Councilor\App\Http\Livewire\BoardOfDirectors\EditComponent::class)->name('boardofdirectors-admin-edit');
