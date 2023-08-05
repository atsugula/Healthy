<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 *
 * @property $id
 * @property $titulo
 * @property $link
 * @property $description
 * @property $id_categoria
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Video extends Model
{

    static $rules = [
      'titulo' => 'required',
      'link' => 'required',
      'description' => 'required',
      'id_categoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
      'titulo',
      'link',
      'description',
      'id_categoria',
      'miniatura',
    ];

    public function getLinkAttribute()
    {
      return str_replace('watch?v=', 'embed/', $this->attributes['link'] ?? '');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'id_categoria');
    }


}
