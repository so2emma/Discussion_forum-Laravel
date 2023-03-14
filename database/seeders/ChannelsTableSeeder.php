<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Channel::create([
            "name" => "Laravel 10",
            "slug" => Str::slug("Laravel 10")
        ]);

        Channel::create([
            "name" => "React Js",
            "slug" => Str::slug("React Js")
        ]);

        Channel::create([
            "name" => "Python Framework",
            "slug" => Str::slug("Python Framework")
        ]);

        Channel::create([
            "name" => "Node js",
            "slug" => Str::slug("Node js")
        ]);
    }
}
