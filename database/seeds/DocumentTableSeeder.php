<?php

use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::first();

        factory(App\Document::class)->times(10)->create(['user_id' => $user->id]);
    }
}
