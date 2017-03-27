<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id 分类ID
 * @property string name 分类名
 */
class Category extends Model
{
    protected $fillable = [
        'name'
    ];
}
