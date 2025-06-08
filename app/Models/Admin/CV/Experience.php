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

    public function curriculo()
    {
        return $this->belongsTo(Curriculo::class, "id", "id_experieces");
    }
}
