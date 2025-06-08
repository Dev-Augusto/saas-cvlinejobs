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

    public function curriculo()
    {
        return $this->belongsTo(Curriculo::class, "id", "id_hability");
    }
}
