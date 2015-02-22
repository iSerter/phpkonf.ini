<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        /*
         * Daha önce oluşturduğum UserTableSeeder.php sınıfını
         * db:seed komutu verdiğimde tetiklemek istediğimi belirtiyorum.
         */
        $this->call('UserTableSeeder');
        /*
         * Veritabanının doldurulduğuna(seed) dair konsola mesaj yazdırıyorum.
         */
        $this->command->info('User table seeded!');
    }
}
