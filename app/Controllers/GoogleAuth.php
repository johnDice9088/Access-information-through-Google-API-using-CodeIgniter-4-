<?php namespace App\Controllers;

use Google_Client;
use Google_Service_Oauth2;

class GoogleAuth extends BaseController
{
    public function index()
    {
        return view('google_login');
    }

    public function login()
    {
        $client = new Google_Client();
        $client->setClientId('355844498542-q6929u21mn4mkiqio6fvamdl2ii010ft.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri('http://localhost/project/public/googleauth/callback');
        $client->addScope(["email", "profile"]);

        $auth_url = $client->createAuthUrl();
        return redirect()->to($auth_url);
    }
    public function dashboard()
{
    $data = [
        'user' => session()->get('google_user')
    ];

    return view('google_dashboard', $data);
}


    public function callback()
    {
        $client = new Google_Client();
        $client->setClientId('355844498542-q6929u21mn4mkiqio6fvamdl2ii010ft.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri('http://localhost/project/public/googleauth/callback');

        if($this->request->getGet('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));

            if(!isset($token["error"])) {
                $client->setAccessToken($token['access_token']);

                $service =  new Google_Service_Oauth2($client);
                $user = $service->userinfo->get();
                session()->set('google_user', $user);

                return redirect()->to('/googleauth/dashboard');

                // Handle the user data as per your application's requirements

            //    return redirect()->to('/dashboard'); // assuming a dashboard route is set up
            }
        }

       // Redirect back to login in case of error
    }
    public function logout()
{
    session()->remove('google_user');  // Remove user data from session
    return redirect()->to('/googleauth');  // Redirect back to the login page
}

}
