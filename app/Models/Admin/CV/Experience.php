<?php

namespace App\Models\Admin\CV;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "experiecies";
    protected $fillable = [
        "company",
        "area",
        "start_year",
        "end_year",
        "description",
    ];

    public function curriculos()
    {
        return $this->belongsToMany(Curriculo::class, 'curriculo_experiece', 'experiece_id', 'curriculo_id');
    }
}
