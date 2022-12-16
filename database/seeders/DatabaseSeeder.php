<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slidder;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=>'adminnya saya',
            'username'=>'admin123',
            'email'=>'admin123@gmail.com',
            'password'=>bcrypt('admin123'),
            'is_admin'=>true
        ]);

        User::create([
            'name'=>'usernya saya',
            'username'=>'user123',
            'email'=>'user123@gmail.com',
            'password'=>bcrypt('user123'),
            'is_admin'=>false
        ]);

        Product::create([
            'sku'=>'6-120-SSD-350000',
            'name'=>'Sandisk SSD Plus 240GB Sata 3 - Sandisk SSD 120 GB',
            'id_category'=>'1',
            'id_brand'=>'1',
            'stok'=>'19',
            'capacity'=>'120',
            'price'=>'350000',
            'weight'=>'200',
            'img'=>'San238611.png',
            'description'=>'&lt;div&gt;Garansi Resmi 3 Tahun&lt;br&gt;&lt;br&gt;Fitur:&lt;br&gt;- perpanjang daya laptop atau PC desktop anda&lt;br&gt;- melakukan boot-up, shutdown,dan respon aplikasi dengan lebih cepat&lt;br&gt;- desain padat yang tahan lama&lt;br&gt;- cocok untuk beban kerja PC biasanya&lt;br&gt;- kemudahan pemasangan&lt;br&gt;- drive yang lebih efisien (jadi baterai laptop Anda bisa bertahan lama hanya dengan sekali pengisian.)&lt;br&gt;&lt;br&gt;Spesifikasi:&lt;br&gt;Kecepatan Baca: hingga 530 MB/s**&lt;br&gt;Kecepatan Tulis: hingga 310 MB/s**&lt;br&gt;Antarmuka: SATA Revision 3.0 (6 Gb/s)&lt;/div&gt;'
        ]);

        Brand::create([
            'name'=>'samsung',
            'img'=>'sam934072.png'
        ]);

        Category::create([
            'name'=>'SSD'
        ]);

        Slidder::create([
            'id_product' => '1',
            'status' => '1',
            'title' => 'Produk Terbaru dan Terlaris',
            'description' => '&lt;div&gt;Aya buruan pesan sekarang juga sebelum kehabisan&lt;/div&gt;'
        ]);

        UserDetail::create([
            'id_user' => '2',
            'nick_name' => 'nanana',
            'full_name' => 'nana sekali',
            'phone' => '8521635822',
            'street' => 'lima dua',
            'rt' => '2',
            'rw' => '3',
            'dusun' => 'Nagreg',
            'desa' => 'Suka Air',
            'kecamatan' => 'Janji Kita',
            'kabupaten' => 'Semanggi',
            'provinsi' => 'Jawa Utara',
            'postal_code' => '82433',
            'img' => 'ufsesg.jpg'
        ]);

        Wishlist::create([
            'id_product' => '1',
            'id_user' => '2'
        ]);


    }
}
