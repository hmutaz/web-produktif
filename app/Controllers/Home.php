<?php

namespace App\Controllers;
use App\Models\User as UserModel;

class Home extends BaseController{
    public function index(){
        return view('index');
    }
    public function dashboard(){
        $model = new UserModel();
        $data = [
            'user' => $model->getUser(),
        ];
        return view('dashboard', $data);
    }

    public function create(){
        return view('add');
    }
    public function save(){
        $model = new UserModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $model->saveUser($data);
        return redirect()->to('/');
    }
    public function edit($id){
        $model = new UserModel();
        $data = [
            'user' => $model->getUser($id),
        ];
        return view('edit', $data);
    }
    public function update($id){
        $model = new UserModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $model->updateUser($id, $data);
        return redirect()->to('/');
    }
    public function delete($id){
        $model = new UserModel();
        $model->deleteUser($id);
        return redirect()->to('/');
    }
}
