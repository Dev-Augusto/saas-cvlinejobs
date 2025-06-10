<?php

namespace App\Models\Admin\CV;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hability extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "habilities";
    protected $fillable = [
        "name",
    ];

    public function curriculos()
    {
        return $this->belongsToMany(Curriculo::class, 'curriculo_hability', 'hability_id', 'curriculo_id');
    }
}
