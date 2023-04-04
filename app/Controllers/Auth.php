<?php

namespace App\Controllers;
use App\Models\Login as LoginModel;

class Auth extends BaseController{
    public function index(){
        $data = [];
        helper(['form']);
        if(session()->get('isLoggedIn')){
            return redirect()->to('/');
        }
        if($this->request->getPost()) {
            $rules = [
                'username' => 'required|min_length[2]|max_length[256]',
                'password' => 'required|min_length[8]|max_length[32]|validateUser[username,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Username or password don\'t match'
                ]
            ];

            if(!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            }else {
                $model = new LoginModel();

                $user = $model->where('username', $this->request->getPost('username'))->first();
                $this->setUserSession($user);
                session()->setFlashData('success', 'Login Success!');
                return redirect()->to('/');
            }
        }
        return view('login', $data);
    }
    
    private function setUserSession($user) {
        $data = [
            'username' => $user['username'],
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    public function register(){
        $data = [];
        helper(['form']);
        if(session()->get('isLoggedIn')){
            return redirect()->to('/');
        }
        if($this->request->getPost()) {
            $rules = [
                'username' => 'required|min_length[2]|max_length[256]|is_unique[login.username]',
                'password' => 'required|min_length[8]|max_length[32]',
                'password_confirm' => 'matches[password]',
                'favorite' => 'required',
                'love'     => 'required',
                'hate'     => 'required',
            ];
            if(!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else {
                $model = new LoginModel();

                $data = [
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'favorite' => $this->request->getPost('favorite'),
                    'love'     => $this->request->getPost('love'),
                    'hate'     => $this->request->getPost('hate'),
                ];
                $model->save($data);
                session()->setFlashData('success', 'Registration Success!');
                return redirect()->to('/login');
            }
        }
        return view('register', $data);
    }

    public function forgor(){
        $data = [];
        helper(['form']);
        if(session()->get('isLoggedIn')){
            return redirect()->to('/');
        }
        if($this->request->getPost()) {
            $rules = [
                'username' => 'required|min_length[2]|max_length[256]',
                'favorite' => 'required',
                'love' => 'required',
                'hate' => 'required',
            ];
            $errors = [
                'favorite', 'love', 'hate' => [
                    'validateSecurity' => 'Data don\'t match'
                ]
            ];

            if(!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            }else {
                $data['username'] = $this->request->getPost('username');
                return view('change-password', $data);
            }
        }
        return view('forgor', $data);
    }
    
    public function changePassword(){
        $data = [];
        helper(['form']);
        $rules = [
            'password' => 'required|min_length[8]|max_length[32]',
            'password_confirm' => 'matches[password]',
        ];
        if(!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        }else {
            $model = new LoginModel();
            $user = $model->where('username', $this->request->getPost('username'))->first();

            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
            ];

            $model->update($user['id'], $data);
            session()->setFlashData('success', 'Password Changed!');
            return redirect()->to('/login');
        }
        return view('change-password', $data);
    }
    
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
