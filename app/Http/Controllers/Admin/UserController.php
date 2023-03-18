<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $title;

    public function __construct()
    {
        $this->title = 'Покупатели';
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', [
            'users' => $users,
            'title' => $this->title,

        ]);
    }
}
