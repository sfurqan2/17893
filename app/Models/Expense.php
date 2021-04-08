<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $with = ['expenseItems', 'expenseItems.expenseCategory', 'user:id,name,designation_id', 'user.designation'];

    protected $fillable = [
        'date',
        'user_id',
        'total_amount',
        'status',
    ];

    protected $casts = [
        'updated_at' => 'datetime:d-m-Y h:i:sa',
    ];

    public function expenseItems()
    {
        return $this->hasMany(ExpenseItem::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
