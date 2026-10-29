<?php
namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function proses()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['ID'],
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with(
            'error',
            'Username atau password salah.'
        );
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
