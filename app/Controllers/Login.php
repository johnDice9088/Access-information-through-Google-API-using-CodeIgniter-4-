<?php namespace App\Controllers;

use CodeIgniter\Controller;
use Google_Client;
use Google_Service_Oauth2;

class Login extends Controller
{
    private $client;

    public function __construct()
    {
        // Initialize Google Client
        $this->client = new Google_Client();
        $this->client->setClientId('355844498542-q6929u21mn4mkiqio6fvamdl2ii010ft.apps.googleusercontent.com');
        $this->client->setClientSecret('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');
        $this->client->setRedirectUri('http://localhost/project/public/login/callback');
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function index()
    {
        $loginUrl = $this->client->createAuthUrl();
        return redirect()->to($loginUrl);
    }

    public function callback()
    {
        if (isset($_GET['code'])) {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->client->setAccessToken($token['access_token']);

            $service = new Google_Service_Oauth2($this->client);
            $user = $service->userinfo->get();

            $data = [
                'name' => $user->name,
                'email' => $user->email
            ];

            return view('profile', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
