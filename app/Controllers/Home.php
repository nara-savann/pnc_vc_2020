<?php namespace App\Controllers;

use App\Models\Backend\Auth\AuthenticationModel;

class Home extends BaseController
{
    /**
     * @return string
     */
    public function index()
    {
        $s = session();
        if ($s->get('uid') != '' and $s->get('key') != '' and $s->get('value')) {
            return view('welcome_message');
        }
        return view('Backend/Auth/login');
    }
}
