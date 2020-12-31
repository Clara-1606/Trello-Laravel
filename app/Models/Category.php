<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Le modèle Category qui est lié à la table categories dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=["name"];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    
    /**
     * Renvoi la liste des tâches possédant cette catégorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function tasks()
{
    return $this->hasMany('App\Models\Task');
}
}
