<?php

namespace App\Http\Controllers\Auth;

use App\Categorie;
use App\Mail\ConfirmationEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Guard $auth)
    {
        if(Auth::user()->categorie_id != 1){
            return redirect()->route('home');
        }
        $datas = Categorie::get();
        return view('auth.register', compact('datas'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|max:255|unique:users',
            'sender_id' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'sender_id' => $data['sender_id'],
            'password' => bcrypt($data['password']),
            'categorie_id' => $data['categorie_id'],
            'statut' => 1
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Mail::to($user->email)->send(new ConfirmationEmail($user));

        return redirect()->route('login');
        //back()->with('success', 'Veuillez confirmez votre adresse email.');
    }

    public function confirmEmail($token){
        User::whereToken($token)->firstOrFail()->hasVerified();

        return redirect('login')->with('success', 'Votre adresse a été confirmé. Connectez-vous');
    }
}
