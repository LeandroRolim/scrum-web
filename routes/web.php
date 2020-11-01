<?php

use App\Http\Livewire\HomePage;
use App\Http\Livewire\Project\Create;
use App\Http\Livewire\Project\Index;
use App\Http\Livewire\Project\Tasks;
use App\Http\Livewire\Project\Members;
use App\Http\Livewire\Project\VotingComponent;
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

Route::get('/', HomePage::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('projects', Index::class)->name('project.index');
    Route::get('projects/create', Create::class)->name('project.create');
    Route::get('projects/{project}/tasks', Tasks::class)->name('project.tasks');
    Route::get('projects/{project}/members', Members::class)->name('project.members');
    Route::get('projects/{project}/voting', VotingComponent::class)->name('project.voting');
});
