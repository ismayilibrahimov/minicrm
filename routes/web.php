<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false,]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('companies', CompanyController::class)->middleware('auth');
Route::resource('employees', EmployeeController::class)->middleware('auth');


Route::get('lang/{lang}', function ($locale) {
    App::setlocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
