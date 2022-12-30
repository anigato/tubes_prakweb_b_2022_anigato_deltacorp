<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
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
            'category_id'=>'1',
            'brand_id'=>'1',
            'stok'=>'19',
            'capacity'=>'120',
            'price'=>'350000',
            'weight'=>'200',
            'img'=>'San238611.png',
            'description'=>'&lt;div&gt;Garansi Resmi 3 Tahun&lt;br&gt;&lt;br&gt;Fitur:&lt;br&gt;- perpanjang daya laptop atau PC desktop anda&lt;br&gt;- melakukan boot-up, shutdown,dan respon aplikasi dengan lebih cepat&lt;br&gt;- desain padat yang tahan lama&lt;br&gt;- cocok untuk beban kerja PC biasanya&lt;br&gt;- kemudahan pemasangan&lt;br&gt;- drive yang lebih efisien (jadi baterai laptop Anda bisa bertahan lama hanya dengan sekali pengisian.)&lt;br&gt;&lt;br&gt;Spesifikasi:&lt;br&gt;Kecepatan Baca: hingga 530 MB/s**&lt;br&gt;Kecepatan Tulis: hingga 310 MB/s**&lt;br&gt;Antarmuka: SATA Revision 3.0 (6 Gb/s)&lt;/div&gt;'
        ]);
        Product::create([
            'sku'=>'6-240-SSD-550000',
            'name'=>'Sandisk SSD Plus 240GB Sata 3 - Sandisk SSD 240 GB',
            'category_id'=>'1',
            'brand_id'=>'2',
            'stok'=>'19',
            'capacity'=>'240',
            'price'=>'550000',
            'weight'=>'200',
            'img'=>'San286837.png',
            'description'=>'&lt;div&gt;Garansi Resmi 3 Tahun&lt;br&gt;&lt;br&gt;Fitur:&lt;br&gt;- perpanjang daya laptop atau PC desktop anda&lt;br&gt;- melakukan boot-up, shutdown,dan respon aplikasi dengan lebih cepat&lt;br&gt;- desain padat yang tahan lama&lt;br&gt;- cocok untuk beban kerja PC biasanya&lt;br&gt;- kemudahan pemasangan&lt;br&gt;- drive yang lebih efisien (jadi baterai laptop Anda bisa bertahan lama hanya dengan sekali pengisian.)&lt;br&gt;&lt;br&gt;Spesifikasi:&lt;br&gt;Kecepatan Baca: hingga 530 MB/s**&lt;br&gt;Kecepatan Tulis: hingga 310 MB/s**&lt;br&gt;Antarmuka: SATA Revision 3.0 (6 Gb/s)&lt;/div&gt;'
        ]);
        Product::create([
            'sku'=>'6-480-SSD-900000',
            'name'=>'Sandisk SSD Plus 240GB Sata 3 - Sandisk SSD 480 GB',
            'category_id'=>'2',
            'brand_id'=>'2',
            'stok'=>'19',
            'capacity'=>'480',
            'price'=>'900000',
            'weight'=>'300',
            'img'=>'San122699.png',
            'description'=>'&lt;div&gt;Garansi Resmi 3 Tahun&lt;br&gt;&lt;br&gt;Fitur:&lt;br&gt;- perpanjang daya laptop atau PC desktop anda&lt;br&gt;- melakukan boot-up, shutdown,dan respon aplikasi dengan lebih cepat&lt;br&gt;- desain padat yang tahan lama&lt;br&gt;- cocok untuk beban kerja PC biasanya&lt;br&gt;- kemudahan pemasangan&lt;br&gt;- drive yang lebih efisien (jadi baterai laptop Anda bisa bertahan lama hanya dengan sekali pengisian.)&lt;br&gt;&lt;br&gt;Spesifikasi:&lt;br&gt;Kecepatan Baca: hingga 530 MB/s**&lt;br&gt;Kecepatan Tulis: hingga 310 MB/s**&lt;br&gt;Antarmuka: SATA Revision 3.0 (6 Gb/s)&lt;/div&gt;'
        ]);
        Product::create([
            'sku'=>'6-1-SSD-2300000',
            'name'=>'Sandisk SSD Plus 240GB Sata 3 - Sandisk SSD 1 TB 2',
            'category_id'=>'2',
            'brand_id'=>'1',
            'stok'=>'19',
            'capacity'=>'1',
            'price'=>'2300000',
            'weight'=>'200',
            'img'=>'San382820.png',
            'description'=>'&lt;div&gt;Garansi Resmi 3 Tahun&lt;br&gt;&lt;br&gt;Fitur:&lt;br&gt;- perpanjang daya laptop atau PC desktop anda&lt;br&gt;- melakukan boot-up, shutdown,dan respon aplikasi dengan lebih cepat&lt;br&gt;- desain padat yang tahan lama&lt;br&gt;- cocok untuk beban kerja PC biasanya&lt;br&gt;- kemudahan pemasangan&lt;br&gt;- drive yang lebih efisien (jadi baterai laptop Anda bisa bertahan lama hanya dengan sekali pengisian.)&lt;br&gt;&lt;br&gt;Spesifikasi:&lt;br&gt;Kecepatan Baca: hingga 530 MB/s**&lt;br&gt;Kecepatan Tulis: hingga 310 MB/s**&lt;br&gt;Antarmuka: SATA Revision 3.0 (6 Gb/s)&lt;/div&gt;'
        ]);

        Product::create([
            'sku'=>'11-120-SSD-250000',
            'name'=>'Adata SSD SU650 Ultimate 120GB Sata 3',
            'category_id'=>'1',
            'brand_id'=>'1',
            'stok'=>'19',
            'capacity'=>'120',
            'price'=>'200000',
            'weight'=>'200',
            'img'=>'Ada654263.png',
            'description'=>'balalalla'
        ]);

        Brand::create([
            'name'=>'samsung',
            'img'=>'sam934072.png'
        ]);
        Brand::create([
            'name'=>'adata',
            'img'=>'ada752461.png'
        ]);

        Category::create([
            'name'=>'SSD'
        ]);
        Category::create([
            'name'=>'HDD'
        ]);

        Slidder::create([
            'product_id' => '1',
            'status' => '1',
            'title' => 'Produk Terbaru dan Terlaris',
            'description' => '&lt;div&gt;Aya buruan pesan sekarang juga sebelum kehabisan&lt;/div&gt;'
        ]);
        Slidder::create([
            'product_id' => '5',
            'status' => '1',
            'title' => 'Produk Terbaik',
            'description' => '&lt;div&gt;Aya buruan pesan sekarang juga sebelum kehabisan&lt;/div&gt;'
        ]);

        UserDetail::create([
            'user_id' => '2',
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
            'product_id' => '1',
            'user_id' => '2'
        ]);
        Wishlist::create([
            'product_id' => '3',
            'user_id' => '2'
        ]);

        Order::create([
            'kode_pemesanan' => 'INVN6D51B24052021',
            'user_id' => 2,
            'order_time' => now(),
            'status' => 1,
            'total_qty' => 2,
            'total_price' => 800000,
            'payment_method' => 'bri'
        ]);
        Order::create([
            'kode_pemesanan' => 'assawe',
            'user_id' => 3,
            'order_time' => now(),
            'status' => 1,
            'total_qty' => 2,
            'total_price' => 350000,
            'payment_method' => 'ovo'
        ]);

        OrderDetail::create([
            'product_id' => 1,
            'order_id' => 1,
            'qty' => 2,
            'subtotal_price' => 700000
        ]);
        OrderDetail::create([
            'product_id' => 2,
            'order_id' => 1,
            'qty' => 1,
            'subtotal_price' => 100000
        ]);
        OrderDetail::create([
            'product_id' => 1,
            'order_id' => 2,
            'qty' => 1,
            'subtotal_price' => 350000
        ]);
    }
}
