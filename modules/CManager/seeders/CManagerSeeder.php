<?php

namespace Modules\CManager\seeders;

use Illuminate\Database\Seeder;
use Modules\CManager\src\Models\CManager;

class CManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c_manager = new CManager();
        $c_manager->name = 'Manager';
        $c_manager->email = 'manager@gmail.com';
        $c_manager->password = bcrypt(123456);
        $c_manager->group_id = 1;
        $c_manager->save();
    }
}
