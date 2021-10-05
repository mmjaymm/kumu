<?php

namespace App\Http\Controllers;

use App\Traits\Responser;
use App\Traits\GithubApis;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;

class GithubController extends Controller
{
    use GithubApis;
    use Responser;

    public function allList()
    {
        $response = $this->performRequestUsers('GET', '/users');
        $users = collect($response)->take(10);
        $all = [];

        foreach ($users as $user) {
            $all[] = json_decode($this->getUser($user->login)->content());
        }

        $all = collect($all)->sortBy('name');
        return view('home', compact('all'));
        // return response()->json($all);
    }

    public function getUser($username)
    {
        $user = Redis::get('user:'.$username);

        if(!isset($user)){
            $result = $this->performRequestUsers('GET', '/users', '/'.$username);
            $response = $this->responser((array) $result);
            $user = json_encode($response);
            Redis::set('user:'.$response['login'], $user);
        }
        
        return response()->json(json_decode($user));
    }
}
