<?php

use App\Models\Food;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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



Route::get('/', function () {
    $foods = Http::get('http://food-api.test/api/v1/foods')->json();
    return view('welcome', compact('foods'));
});

Route::get('recipes/{food}', function (Food $food) {
    $food = Http::get('http://food-api.test/api/v1/foods/' . $food->id)[0];
    return view('show', compact('food'));
})->name('show');

Route::get('/create', function () {
    $ingredients = Ingredient::all();
    return view('create', compact('ingredients'));
});

Route::get('/{id}/edit', function ($id) {
    $food = Http::get('http://food-api.test/api/v1/foods/' . $id)[0];
    $ingredients = Ingredient::all();

    return view('edit', compact('food', 'ingredients'));
})->name('recipe.edit');

Route::delete('/{id}', function ($id) {
    Food::find($id)->delete();
    return redirect('/');
})->name('recipe.delete');
