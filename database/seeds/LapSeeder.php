<?php
use App\tb_lapangan;
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
        tb_lapangan::create([
            'name' => 'IFI Futsal',
            'description' => '',
            'price' => '40000',
            'alamat' => 'Jl. Sukabirus No.7, Citeureup',
            'latlon' => '',
            'foto' => ''
        ]);
        tb_lapangan::create([
            'name' => 'Bos Futsal',
            'description' => '',
            'price' => '20000',
            'alamat' => 'Jl. Cikoneng, Bojongsoang, Bandung, Jawa Barat 40288',
            'latlon' => '',
            'foto' => ''
        ]);
        tb_lapangan::create([
            'name' => 'MU Futsal',
            'description' => '',
            'price' => '25000',
            'alamat' => 'Jl. Sadang No.19-27, Margahayu Tengah, Margahayu, Bandung, Jawa Barat 40225',
            'latlon' => '',
            'foto' => ''
        ]);
        tb_lapangan::create([
            'name' => 'Centro Futsal',
            'description' => '',
            'price' => '40000',
            'alamat' => 'Jl. Margacinta No.48, Cijaura, Buahbatu, Kota Bandung, Jawa Barat 40286',
            'latlon' => '',
            'foto' => ''
        ]);
        tb_lapangan::create([
            'name' => 'Bisoc Futsal',
            'description' => '',
            'price' => '40000',
            'alamat' => 'Jl. Batununggal Lestari No.1, Batununggal, Bandung Kidul, Kota Bandung, Jawa Barat 40266',
            'latlon' => '',
            'foto' => ''
        ]);
        tb_lapangan::create([
            'name' => 'Rajawali Futsal',
            'description' => '',
            'price' => '40000',
            'alamat' => 'Citeureup, Dayeuhkolot, Bandung, West Java 40257',
            'latlon' => '',
            'foto' => ''
        ]);
    }
}
