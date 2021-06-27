<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;

    use HasFactory;
    use Sluggable;
    //use SoftDeletes;
    protected $guarded = [];
    //laisser passées ttes les données 
   // protected $dates = ["created_at", "updated_at", "deleted_at", "published_at"];//redéclarer  ttes les dates de Post.laravel traite les dates sous forme dobjet donc on dit que tt doit etre pris comme objet

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title', //notre sluggable aura pour source le titre de l'article 
            ]
        ];
    }


}
