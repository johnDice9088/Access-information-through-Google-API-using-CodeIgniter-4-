<?php
namespace App\Controllers;
use Google_Client;
use Google_Service_Oauth2;

//namespace App\Controllers\Google_Service_Oauth2;

class Home extends BaseController {
 
  
  public function index() {
    return view('login');


  //  session_start();
  }

public function login(){

    $google_client = new Google_Client();
      
  
    //$url = $google_client->createAuthUrl();

    $google_client->setClientId('355844498542-q6929u21mn4mkiqio6fvamdl2ii010ft.apps.googleusercontent.com'); //Define your ClientID
   
     $google_client->setClientSecret('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'); //Define your Client Secret Key
   
     $google_client->setRedirectUri('http://localhost/project/public/callback'); //Define your Redirect Uri
   
    $google_client->addScope('email');
   
     $google_client->addScope('profile');

     $url = $google_client->createAuthUrl();
    return redirect()->to($url);
}


    public function callback(){
      $google_client = new Google_Client();
      $google_client->setClientId('355844498542-q6929u21mn4mkiqio6fvamdl2ii010ft.apps.googleusercontent.com'); //Define your ClientID
   
      $google_client->setClientSecret('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'); //Define your Client Secret Key
    
      $google_client->setRedirectUri('http://localhost/project/public/callback'); //Define your Redirect Uri

      if($this->request->getGet('code')) {
        $token = $google_client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));

        if(!isset($token["error"])) {
            $google_client->setAccessToken($token['access_token']);

            $service =  new Google_Service_Oauth2($google_client);
            $user = $service->userinfo->get();
            session()->set('google_user', $user);
            return redirect()->to('/home/dashboard');
    }
  }


    }
    public function dashboard(){
      $data = [
        'user' => session()->get('google_user')
    ];

      return view ('login2',$data);
    }



    public function logout()
    {
        session()->remove('google_user');  // Remove user data from session
        return redirect()->to('/');  // Redirect back to the login page
    }
  



  }


   
     