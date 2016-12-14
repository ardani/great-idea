<?php

namespace Arc\Presenters;

use Arc\Transformers\IdeaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class IdeaPresenter
 *
 * @package namespace App\Presenters;
 */
class IdeaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new IdeaTransformer();
    }
}
