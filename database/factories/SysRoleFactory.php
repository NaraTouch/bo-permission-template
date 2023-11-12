<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class SysRoleFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => "admin",
            'description' => null,
            'status' => 1,
            'permissions' => self::permissions(), // 123456789
            'permission_type' => 'all',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public static function permissions()
    {
        return '[{"id":1,"icon":"codesandbox","name":"Manage Module","group":"sys","prefix":null,"methods":[{"id":1,"name":"View Method","is_menu":0,"position":1,"sys_name":"method.view","sys_module_id":1},{"id":2,"name":"Add Method","is_menu":0,"position":2,"sys_name":"method.add","sys_module_id":1},{"id":3,"name":"Edit Method","is_menu":0,"position":3,"sys_name":"method.edit","sys_module_id":1},{"id":4,"name":"View Module","is_menu":1,"position":1,"sys_name":"module.view","sys_module_id":1},{"id":5,"name":"Add Module","is_menu":0,"position":2,"sys_name":"module.add","sys_module_id":1},{"id":6,"name":"Edit Module","is_menu":0,"position":3,"sys_name":"module.edit","sys_module_id":1}],"position":10},{"id":2,"icon":"airplay","name":"Role","group":"sys","prefix":null,"methods":[{"id":7,"name":"View Role","is_menu":1,"position":null,"sys_name":"role.view","sys_module_id":2},{"id":8,"name":"Add Role","is_menu":0,"position":null,"sys_name":"role.add","sys_module_id":2},{"id":9,"name":"Edit Role","is_menu":0,"position":null,"sys_name":"role.edit","sys_module_id":2},{"id":10,"name":"Disabled Role","is_menu":0,"position":null,"sys_name":"role.delete","sys_module_id":2}],"position":11},{"id":3,"icon":"toggle-left","name":"Manage Admin","group":"sys","prefix":"admin.members","methods":[{"id":11,"name":"View Admin","is_menu":1,"position":1,"sys_name":"admin.member.view","sys_module_id":3},{"id":12,"name":"Add Admin","is_menu":0,"position":null,"sys_name":"admin.member.add","sys_module_id":3},{"id":13,"name":"Edit Admin","is_menu":0,"position":null,"sys_name":"admin.member.edit","sys_module_id":3},{"id":14,"name":"Delete Admin","is_menu":0,"position":null,"sys_name":"admin.member.delete","sys_module_id":3}],"position":9},{"id":4,"icon":"user","name":"Profile","group":"app","prefix":"admin.profile","methods":[{"id":15,"name":"Profile View","is_menu":1,"position":1,"sys_name":"profile.view","sys_module_id":4},{"id":16,"name":"Edit Profile","is_menu":1,"position":2,"sys_name":"profile.user.add","sys_module_id":4},{"id":17,"name":"Change-Password","is_menu":1,"position":3,"sys_name":"password.view","sys_module_id":4}],"position":9},{"id":5,"icon":"pie-chart","name":"Dashboard","group":"app","prefix":"admin.dashboard","methods":[{"id":18,"name":"Dashboard","is_menu":0,"position":1,"sys_name":"admin.dashboard","sys_module_id":5}],"position":1},{"id":6,"icon":"lock","name":"Log Out","group":"sys","prefix":"admin.logout","methods":[{"id":19,"name":"Log Out","is_menu":0,"position":1,"sys_name":"admin.logout","sys_module_id":6}],"position":12}]';
    }
}
