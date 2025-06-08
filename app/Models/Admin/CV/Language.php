<?php

namespace App\Models\Admin\CV;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "languages";
    protected $fillable = [
        "name",
        "level",
    ];

    public function curriculo()
    {
        return $this->belongsTo(Curriculo::class, 'id_languages', 'id');
    }
}
