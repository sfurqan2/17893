<?php

namespace app\Repositories;

use App\Models\User;
use App\Models\Expense;
use app\Intefaces\ExpenseRepositoryInterface;

class ExpenseRepositoryMySql implements ExpenseRepositoryInterface {

    public function all(): array
    {
        return Expense::all()->toArray();
    }

    public function getUserExpense(int $user_id): array
    {
        return User::find($user_id)->Expense->toArray();
    }
    
}