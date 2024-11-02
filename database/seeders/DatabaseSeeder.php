<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Role;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::factory()->create(['title' => 'admin']);
        Role::factory()->create(['title' => 'teacher']);
        Role::factory()->create(['title' => 'student']);

        User::factory()->create([
            'email' => 'admin@gmail.com',
            'role_id' => '1',
        ]);

        User::factory()->create([
            'role_id' => '1',
        ]);

        User::factory()->create([
            'email' => 'teacher@gmail.com',
            'role_id' => '2',
        ]);

        User::factory()->count(5)->create([
            'role_id' => '2',
        ]);

        User::factory()->create([
            'email' => 'student@gmail.com',
            'role_id' => '3',
        ]);

        User::factory()->count(50)->create([
            'role_id' => '3',
        ]);

        $arr = ['PHP', 'Laravel', 'React', 'Vue', 'Node', 'JavaScript'];

        foreach ($arr as $c) {
            Course::factory()->create([
                'title' => $c,
            ]);
        }

        Chapter::factory()->count(100)->create()->each(function ($ch) {
            $ch->course_id = array_rand(Course::pluck('id')->toArray());
            $ch->user_id = array_rand(User::pluck('id')->toArray());
            $ch->save();
        });
    }
}
