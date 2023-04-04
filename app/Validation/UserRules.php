<?php

namespace App\Validation;
use App\Models\Login as LoginModel;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data){
        $model = new LoginModel();
        $user = $model->where('username', $data['username'])->first();
        if (!$user)
            return false;
        return password_verify($data['password'], $user['password']);
    }

    public function validateSecurity(string $str, string $fields, array $data){
        $model = new LoginModel();
        $user = $model->where('username', $data['username'])->first();
        if (!$user)
            return false;
        return ($data['favorite'] == $user['favorite'] && $data['love'] == $user['love'] && $data['hate'] == $user['hate']);
    }
}