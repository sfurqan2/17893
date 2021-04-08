<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpenseController;
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

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:department_head'])->group(function(){
        Route::get('/expenses/manage', function(){
            return view('department.manage-expenses');
        })->name('manage_expenses');

        Route::get('/expenses/history', function(){
            return view('department.expense-history', ['expenses' => auth()->user()->department->users->reject(function($user){
                return $user->expenses->isEmpty();
            })->map(function($user){
                return $user->expenses;
            })->flatten()]);
        })->name('expense_history');
    });

    Route::resources([
        'expenses' => ExpenseController::class,
    ]);

    Route::middleware('role:budget_head')->group(function(){
        Route::resources([
            'budgets' => BudgetController::class
        ]);
    });

});
