<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendMailJob;

use function Laravel\Prompts\password;

class LoginRegisterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest')-> except([
            'logout', 'dashboard'
        ]);
    }


    public function register(){
        return view('auth.register');
    }


    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'photo' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('picture')) {
            // ada file upload
        } else{
            // tidak ada file upload
        }

        if($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filenameSimpan);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $path
        ]);


        $data_send = [
            'name' =>$request->name,
            'email'=>$request->email,
            'subject' =>"Registrasi Sukses untuk melihat Website Portofolio Arelia :)",
            'body'=>"Selamat Berjelajah !"
        ];

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();


        dispatch(new SendMailJob($data_send));
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered and logged in');
    }

    public function login(){
        return view ('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
            ->withSuccess('You have successfully logged in');
        }

        return back()->withErrors([
            'email' => 'Yourprovided credentials do not match in our record.',
            ]) -> onlyInput('email');
    }


    public function dashboard(){
        if(Auth::check()){
            return view('auth.dashboard');
        }

        return redirect()->route('login')
        ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
        ->withSuccess('You have logged out successfully');;
    }

}
