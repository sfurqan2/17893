<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'year',
        'budget_per_month',
        'designation_id'
    ];

    public function designation(){
        return $this->belongsTo(Designation::class);
    }
}
