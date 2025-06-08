<?php

namespace App\Models\Admin\CV;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "curriculos";
    protected $fillable = [
        "id_user",
        "id_languages",
        "id_experieces",
        "id_hability",
        "name",
        "document",
        "born",
        "gender",
        "email",
        "address",
        "telephone",
        "profitional_profile",
        "grade",
        "course",
        "institute",
        "year_start",
        "year_end",
        "image",
    ];


    public function languages()
    {
        return $this->hasMany(Language::class, "id", "id_languages");
    }

    public function expriencies()
    {
        return $this->hasMany(Experience::class, "id", "id_experieces");
    }

    public function habilities()
    {
        return $this->hasMany(Hability::class, "id", "id_hability");
    }

}
