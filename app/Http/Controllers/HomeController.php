<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    public function languages()
    {
        return view('admin.template.languages');
    }
    public function countries()
    {
        return view('admin.template.countries');
    }
    public function cities()
    {
        return view('admin.template.cities');
    }
    public function users()
    {
        return view('admin.template.users.users');
    }
    public function roles_create()
    {
        return view('admin.template.roles.create');
    }
    public function roles_list()
    {
        return view('admin.template.roles.list');
    }
    public function users_new()
    {
        return view('admin.template.users.new');
    }
    public function account_edit()
    {
        return view('admin.template.account-edit');
    }
}
