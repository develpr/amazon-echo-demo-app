<?php

use Illuminate\Database\Seeder;


class AntiJokesTableSeeder extends Seeder
{
    public function run()
    {
        DB::insert('insert into anti_jokes (joke) values (?)', ['Why was the little boy crying?... Because he had a frog stapled to his face']);
    }
} 