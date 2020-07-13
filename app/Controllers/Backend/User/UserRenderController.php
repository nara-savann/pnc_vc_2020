<?php


namespace App\Controllers\Backend\User;

use App\Controllers\BaseController;
use App\Models\Backend\User\UserModel;

class UserRenderController extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $data['user'] = $user->findAll();
        return view('backend/user/list', $data);
    }
    public function add()
    {
        return view('backend/user/add');
    }
}