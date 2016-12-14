<?php

namespace Arc\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Idea extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
