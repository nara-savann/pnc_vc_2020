<?php namespace App\Controllers\Backend\Auth;

use App\Controllers\BaseController;
use App\Models\Backend\Auth\AuthenticationModel;

class Authentication extends BaseController
{
    /**
     * @var AuthenticationModel
     */
    private AuthenticationModel $AuthModel;

    public function __construct()
    {
        parent::__construct();
        helper('form');
        helper('text');
        $this->AuthModel = new AuthenticationModel();
    }

    /**
     * Register account
     * @return string
     */
    public function register()
    {
        $method = $this->request->getMethod();
        $value = $this->request->getVar();
        if ($method == 'post') {
            $isValid = $this->validate([
                'first_name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'email' => 'required|valid_email|is_unique[user.email, id, 0]',
                'pass' => 'required|min_length[8]|max_length[45]',
                're_pass' => 'required|matches[pass]|min_length[8]|max_length[45]',
                'agree-term' => 'required',
            ]);
            if ($isValid) {
                $data = [
                    'firstName' => $value['first_name'],
                    'lastName' => $value['last_name'],
                    'email' => $value['email'],
                    'password' => password_hash($value['pass'], PASSWORD_DEFAULT)
                ];
                $result = $this->AuthModel->register($data);
                if ($result != false) {
                    return view('Backend/Auth/login', ['validation' => 'Sign up success!']);
                }
                return view('Backend/Auth/register', ['validation' => $this->validator]);
            }
            return view('Backend/Auth/register', ['validation' => $this->validator]);
        } else
            $s = session();
        if ($s->get('uid') != '' and $s->get('key') != '' and $s->get('value') != '') {
            return view('welcome_message');
        }
        return view('Backend/Auth/register');
    }

    /**
     * Authenticate login account
     * @return string
     */
    public function login()
    {
        $method = $this->request->getMethod();
        $value = $this->request->getVar();
        if ($method == 'post') {
            $isValid = $this->validate([
                'email' => 'required|valid_email',
                'your_pass' => 'required',
            ]);

            if ($isValid) {
                $data = [
                    'email' => $value['email'],
                    'password' => $value['your_pass'],
                ];
                $result = $this->AuthModel->login($data);
                if ($result != false) {
                    $key = random_string('alnum', 32);
                    $value = random_string('alnum', 128);
                    $sess = [
                        'uid' => $result,
                        'key' => $key,
                        'value' => $value,
                    ];
                    $this->AuthModel->sessionData($sess);
                    session()->set($sess);
                    return view('welcome_message');
                } else
                    $this->validate('signin');
                return view('Backend/Auth/login', ['validation' => $this->validator]);
            }
            return view('Backend/Auth/login', ['validation' => $this->validator]);
        } else {
            $s = session();
            if ($s->get('uid') != '' and $s->get('key') != '' and $s->get('value') != '') {
                return view('welcome_message');
            }
            return view('Backend/Auth/login');
        }
    }
}