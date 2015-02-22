<?php

/*
 * Faker/Factory sınıfını Faker olarak kullanmak(anmak) istediğimi belirtiyorum(aliasing) ama,
 * belirtmek zorunda da değilim ve sınıf içerisinde \Faker\Factory::create(); şeklinde de kullanabilirim.
 * http://php.net/manual/en/language.namespaces.importing.php
 */
use Faker\Factory as Faker;

class UserTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        /*
         * Query Builder[1] kullanarak users tablosunu boşaltıyorum.
         * 1- http://laravel.com/docs/5.0/queries#deletes
         */
        DB::table('users')->truncate();

        /*
         * Faker'ın dökümantasyonuna[1] veya Faker/Factory sınıfının create methoduna gözatarsak
         * Varsayılan olarak en_US olarak tanımlanmış bir $locale parametresi aldığını görüyoruz.
         * Faker sınıfında birçok ülke, dil için provider eklenmiş durumda. Türkiye, Türkçe'de bunlara dahil.
         * Parametre olarak tr_TR verip bir instance oluşturuyorum.
         *
         * Parametre en_US(languageCode_countryCode) şeklinde olmalıdır.
         * Bkz. ISO 639, ISO 3166
         *
         * 1- https://github.com/fzaninotto/Faker
         */
        $faker = Faker::create('tr_TR');

        /*
         * PHPKonf namespace(App olarak geliyor ama artisan aracıyla değiştirebiliyoruz[1].) altında
         * Laravel ile default olarak gelen ve kalıtım alarak Eloquent Model[2] görevi gören
         * User(User.php) sınıfını kullanarak bir kullanıcı oluşturuyorum[3].
         *
         * 1- http://laravel.com/docs/5.0/configuration#after-installation
         * 2- http://laravel.com/docs/5.0/eloquent#insert-update-delete
         * 3- http://laravel.com/api/5.0/Illuminate/Database/Eloquent/Model.html#method_create
         */
        \PHPKonf\User::create([
            'email'    => 'ini@phpkonf.org',
            'password' => Hash::make('123456'),
            'name'     => 'PHPKonf Admin'
        ]);

        /**
         * Foreach döngüsü içerisinde Faker yardımıyla random 99 kullanıcı oluşturuyorum.
         */
        foreach (range(1, 99) as $index)
        {
            \PHPKonf\User::create([
                'email'    => strtolower($faker->email),
                'password' => Hash::make('123456'),
                'name'     => $faker->firstName . ' ' . $faker->lastName,
            ]);
        }
    }

}
