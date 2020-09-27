<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    // public function login(Route $route,Request $request)
    // {
    //     $http = new \GuzzleHttp\Client;
        // try {
            
        //     $response = $http->post(config('services.passport.login_endpoint'), [
        //         'form_params' => [
        //             'username' => $request->username,
        //             'password' => $request->password,
        //             'grant_type' => 'password',
        //             'client_id' => config('services.passport.client_id'),
        //             'client_secret' => config('services.passport.client_secret')
                   
        //         ]
        //     ]);
            
                
        //     return $response;

        // } catch (\GuzzleHttp\Exception\BadResponseException $e) {
           
        //     if ($e->getCode() === 400) {
        //         return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
        //     } else if ($e->getCode() === 401) {
        //         return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
        //     }
                
        //     return response()->json('Something went wrong on the server.', $e->getCode());
        // }
    //     $username = $request->username;
    //     $password = $request->password;

        
    //     $request->request->add([
    //         'username' => 'schaden.geovany@example.org',
    //         'password' => 'password',
    //         'grant_type' => 'password',
    //         'client_id' => env('API_CLIENT_ID'),
    //         'client_secret' => env('API_CLIENT_SECRET')
    //     ]);
           
    //     $tokenRequest = Request::create(
    //         env('APP_URL').'/oauth/token',
    //         'post'
    //     );
    //     $response = Route::dispatch($tokenRequest);
    //     if ($response->getStatusCode() === 400) {
    //                 return response()->json('Invalid Request. Please enter a username or a password.', $response->getStatusCode());
    //             } else if ($response->getStatusCode() === 401) {
    //                 return response()->json('Your credentials are incorrect. Please try again', $response->getStatusCode());
    //             }
                    
    //             return response()->json('Something went wrong on the server.', $response->getStatusCode());
            
    // }
   
        public function login(Route $route,Request $request){
        $username = $request->username;
        $password = $request->password;
       
        $request->request->add([
            'username' => $username,
            'password' => $password,
            'grant_type' => 'password',
            'client_id' => config('services.passport.client_id'),
            'client_secret' => config('services.passport.client_secret')
            // 'client_id' => env('API_CLIENT_ID'),
            // 'client_secret' => env('API_CLIENT_SECRET')
        ]);
       
        $tokenRequest = Request::create(
            env('APP_URL').'/oauth/token',
            'post'
        );
        
        $response = Route::dispatch($tokenRequest);
        
        if($response->getStatusCode() == 200){
            $response->getContent();
        }

        return $response;
    }
    
    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        
        return response()->json('Logged out successfully', 200);
    }
}
