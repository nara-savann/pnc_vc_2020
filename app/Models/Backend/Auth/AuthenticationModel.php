<?php namespace App\Models\Backend\Auth;

use CodeIgniter\Model;

class AuthenticationModel extends Model
{
    /**
     * @param $data
     * @return bool|\CodeIgniter\Database\BaseResult|\CodeIgniter\Database\Query|false
     */
    public function register($data)
    {
        $table = 'user';
        $row = $this->db->table($table)
            ->selectCount('email')
            ->where('email', $data['email'])
            ->get()
            ->getRow();
        /**
         * Record is not existing => Create new user
         */
        if ($row->email == 0) {
            return $this->db->table($table)
                ->insert($data);
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function login($data)
    {
        $table = 'user';
        $result = $this->db->table($table)
            ->where('email', $data['email'])
            ->get()
            ->getRow();
        if ($result != null) {
            $pwd = password_verify($data['password'], $result->password);
            if ($pwd)
                return $result->id;
            else
                return false;
        }
        return false;
    }

    /**
     * @param $data
     */
    public function sessionData($data)
    {
        $table = 'session';
        $this->db->table($table)
            ->insert($data);
    }

    /**
     * @return mixed
     */
    public function resetPassword($data)
    {
        $db = \Config\Database::connect();
        return $db->table('user')->replace($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function lookup($data)
    {
        $table = 'user';
        return $this->db->table($table)
            ->where('email', $data['email'])
            ->get()
            ->getRow();
    }
}