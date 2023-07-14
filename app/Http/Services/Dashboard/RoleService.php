<?php

namespace App\Http\Services\Dashboard;

use App\Models\Role;


class RoleService
{
    /**
     * @return mixed
     */
    public function allRoles(){
        return Role::get();
    }

}
