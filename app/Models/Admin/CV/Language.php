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

    public function curriculos()
    {
        return $this->belongsToMany(Curriculo::class, 'curriculo_language', 'language_id', 'curriculo_id');
    }
}
