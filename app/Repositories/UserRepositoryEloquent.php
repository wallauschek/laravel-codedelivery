<?php

namespace CodeDelivery\Repositories;

use Illuminate\Database\Eloquent\Collection as Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    
    protected $skipPresenter = true;

    public function getDeliverymen(){
        return $this->model->where('role','deliveryman')->lists('name','id');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return \CodeDelivery\Presenters\UserPresenter::class;
    }

    
}
