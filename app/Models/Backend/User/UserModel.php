<?php
namespace App\Models\Backend\User;

use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'pnc_vc_user';

    protected $allowedFields = ['first_name', 'last_name'];
}