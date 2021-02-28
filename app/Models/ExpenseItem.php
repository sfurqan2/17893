<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_id',
        'expense_category_id',
        'amount',
    ];

    public function expense(){
        return $this->belongsTo(Expense::class);
    }

    public function expenseCategory(){
        return $this->belongsTo(ExpenseCategory::class);
    }
}
