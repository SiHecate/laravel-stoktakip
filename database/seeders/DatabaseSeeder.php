<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Service\RoleService;
use App\Models\User;

class DatabaseSeeder extends Seeder
{

    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();



        $AdminUser = User::Where('name', 'admin')->first();

        if (!$AdminUser) {
            \App\Models\User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]);
        } else {
            $this->roleService->roleAttachAdmin();

        }

 }
}
