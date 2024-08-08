<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        if(!$session->get('logged_in')) {
            return redirect()->to('/auth');
        }
        return view('dashboard');
    }
}