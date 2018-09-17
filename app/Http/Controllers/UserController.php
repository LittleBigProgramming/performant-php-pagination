<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UsersTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UserController extends Controller {

    /**
     * @return mixed
     */
    public function index() {
        $users = User::paginate(10);
        $usersCollection = $users->getCollection();

        return fractal()
            ->collection($usersCollection)
            ->parseIncludes(['user'])
            ->transformWith(new UsersTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($users))
            ->toArray();
    }
}
