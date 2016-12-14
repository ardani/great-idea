<?php

namespace Arc\Transformers;

use League\Fractal\TransformerAbstract;
use Arc\Entities\Idea;

/**
 * Class IdeaTransformer
 * @package namespace App\Transformers;
 */
class IdeaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Idea entity
     * @param \Idea $model
     *
     * @return array
     */
    public function transform(Idea $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
