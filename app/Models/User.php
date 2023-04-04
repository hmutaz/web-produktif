<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table    = 'users';
    protected $id       = 'id';

    protected $allowedFields = ['id', 'nama', 'alamat'];

    public function getUser($id = false){
        if ($id === false){
            return $this->findAll();
        }
        else{
            return $this->where('id', $id)->first();
        }
    }
    public function saveUser($data){
        return $this->insert($data);
    }
    public function updateUser($id, $data){
        return $this->update($id, $data);
    }
    public function deleteUser($id){
        return $this->delete($id);
    }
}