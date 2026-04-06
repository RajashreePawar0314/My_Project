<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function showRegister() {
        return view('register');
    }
    public function showAdminLogin() {
    return view('admin_login');
}
public function adminLogout(Request $request)
{
    $request->session()->flush();     // clear session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/admin_login');
}

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    return redirect()->route('login')->with('success','Registration Successful');
}
/*public function login(Request $request)
{
    $user = User::where('email', $request->email)->first();

    if($user && Hash::check($request->password, $user->password))
    {
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);

        return redirect('/dashboard');
    }
    else
    {
        return back()->with('error','Invalid Email or Password');
    }
}*/
public function login(Request $request)
{
    $email = $request->email;
    $password = $request->password;


    // User login
    $user = User::where('email',$email)->first();

    if($user && Hash::check($password,$user->password))
    {
        Session::put('user_id',$user->id);
        Session::put('user_name',$user->name);
        return redirect('/cart');
    }

    return back()->with('error','Invalid Email or Password');
}

//admin login
public function adminLogin(Request $request)
{
    $email = $request->email;
    $password = $request->password;

    if($email == "admin@gmail.com" && $password == "admin123")
    {
        session()->put('admin','admin');
        return redirect('/admin_dashboard');
    }

    return back()->with('error','Invalid Admin Credentials');
}
public function logout()
{
    Session::flush();
    return redirect('/login');
}
}