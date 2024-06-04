<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\auteurs;
use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // تحديد عدد السجلات المطلوبة
        $numberOfRecords = 200; // على سبيل المثال، هنا سننشئ 10 سجلات

        // استخدام Faker لإنشاء بيانات عشوائية
        $faker = Faker::create();

        // حلقة لإنشاء السجلات بشكل عشوائي
        for ($i = 0; $i < $numberOfRecords; $i++) {
            auteurs::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
            ]);
        }
    }
}
