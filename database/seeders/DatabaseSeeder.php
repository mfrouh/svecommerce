<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Setting::create(['name'=>'your website name','description'=>'your website description','logo'=>'storage/logo/1.png']);
        Admin::create(['name'=>'mohamed frouh','email'=>'mohamedfrouh@yahoo.com','password'=>bcrypt('12345678')]);
    }
}
