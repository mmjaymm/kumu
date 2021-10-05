<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;

trait GithubApis
{
    public function performRequestUsers($method, $prefix, $requestUrl = '')
    {
        $client = new Client([
            'base_uri' => env('GITHUB_API_BASE_URL')
        ]);

        $headers['Accept'] = "application/vnd.github.v3+json";
        $requestUrl = $prefix.$requestUrl;

        $response = $client->request(
            'GET', 
            $requestUrl,
            ['headers' => $headers]
        );

        return json_decode($response->getBody()->getContents());
    }
}
