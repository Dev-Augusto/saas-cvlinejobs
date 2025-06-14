<?php

namespace App\Models\Admin\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'licenses';
    protected $fillable = [
        'id_user',
        'price',
        'month',
        'payment_date',
        'payment_expiration',
        'comprovative',
        'status',
    ];
}
