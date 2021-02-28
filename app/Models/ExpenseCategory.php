<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_category_name',
    ];

    public function expenseItems()
    {
        return $this->hasMany(ExpenseItem::class);
    }
}
