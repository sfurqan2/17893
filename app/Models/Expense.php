<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'status',
    ];

    public function expenseItems()
    {
        return $this->hasMany(ExpenseItem::class);
    }
}
