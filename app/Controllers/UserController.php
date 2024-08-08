<?php
// app/Controllers/UserController.php
namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function create()
    {
        // Load view untuk form registrasi (opsional)
        return view('user/create');
    }

    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'matches[password]'
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembali ke form dengan pesan error
            return view('user/create', ['validation' => $this->validator]);
        }

        // Ambil data dari request
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        // Simpan data pengguna
        $userModel = new UserModel();
        $userModel->saveUser($data);

        // Redirect ke halaman yang diinginkan, misalnya login
        return redirect()->to('/login')->with('success', 'User registered successfully');
    }
}