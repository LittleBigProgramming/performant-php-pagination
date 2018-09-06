<?php

namespace App\Transformers;

use App\User;

class UsersTransformer extends \League\Fractal\TransformerAbstract {

    public function transform(User $user) {
        return [
            'name' => $user->name,
            'avatar' => $user->avatar(),
        ];
    }
}