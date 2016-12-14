<?php

namespace Arc\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Arc\Repositories\IdeaRepository;
use Arc\Entities\Idea;
use Arc\Validators\IdeaValidator;

/**
 * Class IdeaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class IdeaRepositoryEloquent extends BaseRepository implements IdeaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Idea::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
