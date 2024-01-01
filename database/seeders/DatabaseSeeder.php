<?php

namespace Database\Seeders;

use App\Enums\InstructorRequestStatus;
use App\Models\Mangement;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Admin::factory(1)->create();
        Mangement::factory(1)->create() ;
        User::factory(1)->create();
    }
}
