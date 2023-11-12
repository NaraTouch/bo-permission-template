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

    /*
    group will use as status data
    1. app : this module will show for user on none group section on side bar
    2. sys : this module will show for user on system setting group section on side bar
    2. repo : this module will show for user on report group section on side bar
    */
    public function up(): void
    {
        Schema::create('sys_modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('group')->default('app')->comment('app=(none group), sys=(system setting group), repo=(report group)');
            $table->tinyInteger('position')->default(1)->comment('sort');
            $table->string('icon')->default(self::defaultIcon())->comment('Menu Icon');
            $table->string('prefix')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('sys_modules')->insert([
            [
                'name' => 'Manage Module', 
                'group' => 'sys', 
                'position' => '10',
                'icon' => 'codesandbox',
                'prefix' => null,
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Manage Admin', 
                'group' => 'sys', 
                'position' => '11',
                'icon' => 'toggle-left',
                'prefix' => 'admin.members',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Role', 
                'group' => 'sys', 
                'position' => '12',
                'icon' => 'airplay',
                'prefix' => 'admin.role',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Profile', 
                'group' => 'app', 
                'position' => '13',
                'icon' => 'user',
                'prefix' => 'admin.profile',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dashboard', 
                'group' => 'app', 
                'position' => '1',
                'icon' => 'pie-chart',
                'prefix' => 'admin.dashboard',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Log Out', 
                'group' => 'sys', 
                'position' => '10',
                'icon' => 'lock',
                'prefix' => 'admin.logout',
                'description' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }

    private static function defaultIcon()
    {
        return 'pie-chart';
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_modules');
    }
};
