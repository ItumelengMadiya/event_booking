<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Add categories with descriptions
        $categories = [
            [
                'name' => 'Workshop',
                'description' => 'Hands-on training sessions for skill development.',
            ],
            [
                'name' => 'Conference',
                'description' => 'Large formal meetings with multiple speakers.',
            ],
            [
                'name' => 'Concert',
                'description' => 'Live musical performances by artists or bands.',
            ],
            [
                'name' => 'Webinar',
                'description' => 'Online seminars with presentations and discussions.',
            ],
            [
                'name' => 'Seminar',
                'description' => 'Educational events with focused topics and speakers.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
