<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Barang;


class barangseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
    	for($i = 1; $i <= 2100; $i++){
    		Barang::create([
            'nama' =>  $faker->words(3,true),
            'jumlah'=> $faker->numberBetween(10,48),
            'harga' => $faker->numberBetween(1000,30000),
            'tanggalKadaluarsa'=> now(),
    		]);
 
    }
}
}