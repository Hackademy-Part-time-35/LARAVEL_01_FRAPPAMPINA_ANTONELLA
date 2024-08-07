<?php

namespace Database\Seeders;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(30)->create();
        Category::factory(5)->create();
        Article::factory(100)->create();

        User::factory()->create([
        'name' => 'Antonella',
        'email' => 'antonella@example.it',
        'password'=>'123nm',
        ]);
        Category::create(['name'=>'Viaggi']);
        Category::create(['name'=>'Sport']);
        Category::create(['name'=>'Esteri']);
        Category::create(['name'=>'Economia']);
        $this->call(ArticleSeeder::class);
    }
}
