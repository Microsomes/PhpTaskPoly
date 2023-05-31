<?php

namespace App\GraphQL\Queries;

use App\Models\Park;

final class ParkQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

    public function breeds($p, array $args)
    {
        $park = Park::find($p->id);

        return  $park->breed()->get();
    }
}
