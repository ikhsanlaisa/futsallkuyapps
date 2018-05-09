<?php
use App\Lapangan;
use Illuminate\Database\Seeder;

class LapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Lapangan::create([
            'name' => 'IFI Futsal',
            'description' => '',
            'price' => 40000,
            'pricetype' => 'HH',
            'address' => 'Jl. Sukabirus No.7, Citeureup',
            'latlon' => '',
            'displayphoto' => ''
        ]);
        Lapangan::create([
            'name' => 'Bos Futsal',
            'description' => '',
            'price' => 30000,
            'pricetype' => 'HH',
            'address' => 'Jl. Cikoneng, Bojongsoang, Bandung, Jawa Barat 40288',
            'latlon' => '',
            'displayphoto' => ''
        ]);
        Lapangan::create([
            'name' => 'MU Futsal',
            'description' => '',
            'price' => 32000,
            'pricetype' => 'HH',
            'address' => 'Jl. Sadang No.19-27, Margahayu Tengah, Margahayu, Bandung, Jawa Barat 40225',
            'latlon' => '',
            'displayphoto' => ''
        ]);
        Lapangan::create([
            'name' => 'Centro Futsal',
            'description' => '',
            'price' => 34000,
            'pricetype' => 'HH',
            'address' => 'Jl. Margacinta No.48, Cijaura, Buahbatu, Kota Bandung, Jawa Barat 40286',
            'latlon' => '',
            'displayphoto' => ''
        ]);
        Lapangan::create([
            'name' => 'Bisoc Futsal',
            'description' => '',
            'price' => 40000,
            'pricetype' => 'HH',
            'address' => 'Jl. Batununggal Lestari No.1, Batununggal, Bandung Kidul, Kota Bandung, Jawa Barat 40266',
            'latlon' => '',
            'displayphoto' => ''
        ]);
        Lapangan::create([
            'name' => 'Rajawali Futsal',
            'description' => '',
            'price' => 20000,
            'pricetype' => 'HH',
            'address' => 'Citeureup, Dayeuhkolot, Bandung, West Java 40257',
            'latlon' => '',
            'displayphoto' => ''
        ]);
    }
}
