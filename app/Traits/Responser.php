<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;

trait Responser
{
    public function responser($array)
    {
        $ave_followers = $array['followers']/$array['public_repos'];
        $array['average_followers_per_repo'] = $ave_followers;

        $result = Arr::only($array, [
            'name',
            'login',
            'company',
            'followers',
            'public_repos',
            'average_followers_per_repo'
        ]);

        return $result;
    }
}
