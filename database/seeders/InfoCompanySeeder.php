<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_companies')->insert([
            [
                'name' => 'Phozogy Media',
                'admin_id' => 1,
                'url_image' => 'admin/Tgwn0EO39gNu498xIrKprWJYccX27SfaUBM5uZDh.jpg',
                'description' => '"Phozogy Media" (phương tiện truyền thông) là một khái niệm chung để chỉ các công cụ và kênh thông tin được sử dụng để truyền tải thông tin, tin tức, giải trí và nhiều nội dung khác đến công chúng rộng rãi. Media đóng vai trò quan trọng trong việc truyền đạt thông tin và giao tiếp xã hội.',
                'address' => '154 Vân Dương, phường Thủy Lương, thị xã Hương Thủy, tỉnh Thừa Thiên Huế',
                'email' => 'nguyenvanhuuphuoc17t1@gmail.com',
                'phone' => '0357789210',
                'link_facebook' => 'https://www.facebook.com/nvhp0910',
            ],
        ]);
    }
}
