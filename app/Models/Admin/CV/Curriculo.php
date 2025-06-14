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
        "templante_number",
        "lang",
    ];


    public function languages()
    {
        return $this->belongsToMany(Language::class, 'curriculo_language', 'curriculo_id', 'language_id');
    }

    public function experiencies()
    {
        return $this->belongsToMany(Experience::class, 'curriculo_experience', 'curriculo_id', 'experience_id');
    }

    public function habilities()
    {
        return $this->belongsToMany(Hability::class, 'curriculo_hability', 'curriculo_id', 'hability_id');
    }

    public static function search($name = null, $id_user=null)
    {
       return Curriculo::where(
            function ($query) use ($name, $id_user) {
                if ($name != null) {
                    $query->where('name','LIKE','%'.$name.'%');
                }
                if ($id_user != null) {
                    $query->where('id_user',$id_user);
                }
            }
        )
        ->orderBy('id','desc')
        ->paginate(10);
    }

}
