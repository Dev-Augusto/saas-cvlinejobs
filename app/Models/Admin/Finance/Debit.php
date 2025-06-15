<?php

namespace App\Models\Admin\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debit extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'debits';
    protected $fillable = [
        'price',
        'description'
    ];
}
