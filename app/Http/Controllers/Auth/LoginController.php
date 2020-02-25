<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    public function authenticated($request , $user){
        if($user->hasRole('admin')){
            return redirect()->route('admin.index') ;
        }
        
     
    } 
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }


    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
       

        $existingUser = User::where('email','=',$user->getEmail())->first();

        if($existingUser){
            Auth::login($existingUser, true);
            return redirect($this->redirectTo);
        }else{

            $user = User::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                
                'cover' => $user->getAvatar(),
            ]);
    
            Auth::login($user, true);
    
            return redirect($this->redirectTo);
        }
       
        
        
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('email','=',$user->getEmail())->first();

        if($existingUser){
            Auth::login($existingUser, true);
            return redirect($this->redirectTo);
        }else{
            $user = User::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'cover' => $user->getAvatar(),
            ]);
    
            Auth::login($user, true);
    
            return redirect($this->redirectTo);
        }
       
        
        
    }

    public function handleTwitterCallback()
    {
        // $user = Socialite::driver('twitter')->user();
        $user = Socialite::driver('twitter')->stateless()->user();

        $existingUser = User::where('email','=',$user->getEmail())->first();

        if($existingUser){
            Auth::login($existingUser, true);
            return redirect($this->redirectTo);
        }else{
            $user = User::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'cover' => $user->getAvatar(),
            ]);
    
            Auth::login($user, true);
    
            return redirect($this->redirectTo);
        }
       
        
        
    }
}
