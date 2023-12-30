<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        echo 'Staring admin dashboard...<br/>';
    }
    public function index()
    {
        return 'Admin dashboard';
    }
}
