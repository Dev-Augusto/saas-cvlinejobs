<?php

namespace App\Models\Admin\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "companys";

    protected $fillable = [
        'id_user',
        'nif_number',
        'owner',
        'phone',
        'address',
        'image'
    ];
}
