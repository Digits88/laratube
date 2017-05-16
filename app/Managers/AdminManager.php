<?php

namespace App\Managers;


use App\Classes\BaseAdmin;
use App\Admin;

class AdminManager extends BaseAdmin{

    public function __construct(Admin $admin){
        $this->admin = $admin;
    }
}