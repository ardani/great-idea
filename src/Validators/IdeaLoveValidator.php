<?php

namespace Arc\Validators;
/**
 * Created by PhpStorm.
 * User: ardani
 * Date: 12/14/16
 * Time: 06:53
 */

use \Prettus\Validator\LaravelValidator;

class IdeaLoveValidator extends LaravelValidator {

    protected $rules = [
        'user_id' => 'required',
        'idea_id'  => 'required'
    ];

}