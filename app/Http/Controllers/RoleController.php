<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    function addRole()
    {
        $roles = [
            ["name" => "Administrator"],
            ["name" => "Editor"],
            ["name" => "Author"],
            ["name" => "Contributor"],
            ["name" => "Subscriber"],
        ];

        Role::insert($roles);
        return "Roles are created successfully!";
    }

}
