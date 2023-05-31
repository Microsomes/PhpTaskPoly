<?php

namespace App\GraphQL\Queries;

use App\Models\User;

final class UserQuery
{
    

    public function breeds($u, array $args)
    {

        $user = User::find($u->id);

        return  $user->breed()->get();
    }

    public function parks($u, array $args)
    {

        $user = User::find($u->id);

        return  $user->breed()->get();
    }
}
