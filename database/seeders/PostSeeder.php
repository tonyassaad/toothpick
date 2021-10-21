<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->testDatabase();
    }

    public function testDatabase()
    { 
        Posts::factory()->count(10)->create(); 
        //$post = factory(App\Models\Posts::class, 4)->create();
    }
}
