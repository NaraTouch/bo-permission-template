<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sys_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('sys_module_id');
            $table->string('sys_name')->unique();
            $table->tinyInteger('is_menu')->default(1)->comment('0=hidden,1=show');
            $table->tinyInteger('position')->default(1)->comment('sort');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('sys_methods')->insert([
            [
                'name' => 'View Method', 
                'sys_module_id' => 1,
                'sys_name' => 'method.view',
                'is_menu' => 0,
                'position' => 1,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Add Method', 
                'sys_module_id' => 1,
                'sys_name' => 'method.add',
                'is_menu' => 0,
                'position' => 2,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Edit Method', 
                'sys_module_id' => 1,
                'sys_name' => 'method.edit',
                'is_menu' => 0,
                'position' => 3,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'View Module', 
                'sys_module_id' => 1,
                'sys_name' => 'module.view',
                'is_menu' => 1,
                'position' => 1,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Add Module', 
                'sys_module_id' => 1,
                'sys_name' => 'module.add',
                'is_menu' => 0,
                'position' => 2,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Edit Module', 
                'sys_module_id' => 1,
                'sys_name' => 'module.edit',
                'is_menu' => 0,
                'position' => 3,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'View Admin', 
                'sys_module_id' => 2,
                'sys_name' => 'admin.member.view',
                'is_menu' => 1,
                'position' => 1,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'View Role', 
                'sys_module_id' => 3,
                'sys_name' => 'role.view',
                'is_menu' => 1,
                'position' => 1,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Add Role', 
                'sys_module_id' => 3,
                'sys_name' => 'role.add',
                'is_menu' => 0,
                'position' => 2,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Edit Role', 
                'sys_module_id' => 3,
                'sys_name' => 'role.edit',
                'is_menu' => 0,
                'position' => 3,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Disabled Role', 
                'sys_module_id' => 3,
                'sys_name' => 'role.delete',
                'is_menu' => 0,
                'position' => 4,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Add Admin', 
                'sys_module_id' => 2,
                'sys_name' => 'admin.member.add',
                'is_menu' => 0,
                'position' => 2,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Edit Admin', 
                'sys_module_id' => 2,
                'sys_name' => 'admin.member.edit',
                'is_menu' => 0,
                'position' => 3,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Delete Admin', 
                'sys_module_id' => 2,
                'sys_name' => 'admin.member.delete',
                'is_menu' => 0,
                'position' => 4,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Profile View', 
                'sys_module_id' => 4,
                'sys_name' => 'profile.view',
                'is_menu' => 1,
                'position' => 1,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Edit Profile', 
                'sys_module_id' => 4,
                'sys_name' => 'profile.user.add',
                'is_menu' => 0,
                'position' => 2,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Change-Password', 
                'sys_module_id' => 4,
                'sys_name' => 'password.view',
                'is_menu' => 1,
                'position' => 3,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dashboard', 
                'sys_module_id' => 5,
                'sys_name' => 'admin.dashboard',
                'is_menu' => 1,
                'position' => 1,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Log Out', 
                'sys_module_id' => 6,
                'sys_name' => 'admin.logout',
                'is_menu' => 0,
                'position' => 1,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_methods');
    }
};
