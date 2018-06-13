<?php

namespace App\Api;

use GuzzleHttp\Client;

class Lastfm
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getSession($token)
    {
        $signature = md5('api_key' . env('LASTFM_API_KEY') . 'methodauth.getSessiontoken' . $token . env('LASTFM_SECRET'));
        $result = $this->client->get('http://ws.audioscrobbler.com/2.0/?method=auth.getSession&api_key=' . env('LASTFM_API_KEY') . '&api_sig=' . $signature . '&token=' . $token . '&format=json');

        return json_decode($result->getBody(), true)['session'];
    }

    public function current()
    {
        $name = session('name');

        $result = $this->client->get('http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=' . $name . '&api_key=' . env('LASTFM_API_KEY') . '&limit=1&format=json');
        $data = json_decode($result->getBody(), true)['recenttracks']['track'][0];

        $id = md5($data['artist']['mbid']);

        return [
            'id' => $id,
            'artist' => $data['artist']['#text'],
            'album' => $data['album']['#text'],
            'album_art' => $data['image'][3]['#text'],
            'track' => $data['name']
        ];
    }
}
