<?php

use Phinx\Seed\AbstractSeed;

class ClassmatesTableSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'email' => $faker->email,
                'password' => password_hash($faker->password, PASSWORD_DEFAULT),
                'name' => $faker->name,
                'is_verified' => $faker->boolean(),

                'phone' => $faker->optional(0.9)->phoneNumber,
                'photo_url' => $faker->imageUrl(),
                'hobbies' => $faker->words(3, true),
                'passion' => $faker->optional()->words(1, true),
                'fav_quote' => $faker->optional()->sentence(6, true),
                'fav_quote_author' => $faker->optional()->name,

                'whatsapp' => $faker->optional(0.9)->phoneNumber,
                'facebook' => $faker->optional(0.7)->userName,
                'twitter' => $faker->optional(0.5)->userName,
                'linkedin' => $faker->optional(0.3)->url,
                'instagram' => $faker->optional(0.6)->userName,
                'snapchat' => $faker->optional(0.5)->userName,
                'website' => $faker->optional(0.4)->url,
                'blog' => $faker->optional(0.4)->url,

                'created_at' => $faker->dateTimeBetween("-2 years", "-1 year")->format('Y-m-d H:i:s'),
                'updated_at' =>  rand(0, 2) ? $faker->dateTimeThisYear->format('Y-m-d H:i:s') : null,
            ];
        }

        $this->insert('classmates', $data);
    }
}
