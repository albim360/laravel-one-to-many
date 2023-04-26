<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence;
            $customer = $faker->name;
            $description = $faker->paragraph;
            $url = $faker->url;
            $status = $faker->numberBetween(0, 2);
            $slug = Str::slug($url);

            DB::table('projects')->insert([
                'title' => $title,
                'customer' => $customer,
                'description' => $description,
                'url' => $url,
                'status' => $status,
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
