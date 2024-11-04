<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function DangNhap()
    {
        return view('client.auth.login');
    }
    public function postDangNhap(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role_id == 1) {
                // return redirect()->route('')->with('success', 'Đăng nhập thành công với quyền Admin');
                echo '123 admin';
            } elseif ($user->role_id == 2) {
                return redirect()->route('home')->with('success', 'Đăng nhập thành công với quyền User');
            }
        } else {
            return redirect()->route('dang-nhap')->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác.',
            ])->withInput();
        }
    }

    public function DangKy()
    {
        return view('client.auth.register');
    }
    public function postDangKy(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'lastName' => 'required|string|max:50',
            'firstName' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $name = $request->lastName . ' ' . $request->firstName;
        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'phone' => $request->phone ?? null,
            'address' => $request->address ?? null,
            'avatar' => $request->avatar ?? null,
            'birth' => $request->birth ?? null,
            'gender' => $request->gender ?? null,
            'password' => Hash::make($request->password),
            'status' => 1,
            'remember_token' => $request->session()->token(),
            'role_id' => 2,
        ]);
        return redirect()->route('dang-nhap')->with('success', 'Đăng ký thành công');
    }
    public function logouts(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dang-nhap')->with('success', 'Đã đăng xuất thành công');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        // $users = Socialite::driver('google')->user();
        // dd($users);
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(uniqid()),
                    'role_id' => 2,
                ]);
            }

            Auth::login($user);

            if ($user->role_id == 1) {
                // return redirect()->route('admin')->with('success', 'Đăng nhập bằng Google thành công (Admin)');
                echo (123);
            } elseif ($user->role_id == 2) {
                return redirect()->route('home')->with('success', 'Đăng nhập bằng Google thành công (User)');
            }
        } catch (\Exception $e) {
            return redirect()->route('dang-nhap')->with('error', 'Đăng nhập bằng Google thất bại');
        }
    }

}
