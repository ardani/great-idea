<?php

namespace Arc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Arc\Entities\IdeaLove;
use Arc\Validators\IdeaLoveValidator;

/**
 * Class IdeaLoveRepositoryEloquent
 * @package namespace App\Repositories;
 */
class IdeaLoveRepositoryEloquent extends BaseRepository implements IdeaLoveRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return IdeaLove::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
