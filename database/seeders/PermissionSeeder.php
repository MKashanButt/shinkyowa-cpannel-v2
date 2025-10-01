<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Overall Permissions
        $permission = Permission::create([
            'name' => 'add_customer',
        ]);

        $permission->role()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'add_payment',
        ]);

        $permission->role()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'reserve_vehicle',
        ]);

        $permission->role()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'view_shipment',
        ]);

        $permission->role()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'view_documents',
        ]);

        $permission->role()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'view_inquiries',
        ]);

        $permission->role()->attach([1, 2, 3]);

        $permission = Permission::create([
            'name' => 'view_settings',
        ]);

        // Admin & Manager Only Permissions
        $permission->role()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'add_shipment',
        ]);

        $permission->role()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'can_edit_shipment',
        ]);

        $permission->role()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'can_delete_shipment',
        ]);

        $permission->role()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'can_edit_document',
        ]);

        $permission->role()->attach([1, 2]);

        $permission = Permission::create([
            'name' => 'can_delete_document',
        ]);

        $permission->role()->attach([1, 2]);

        // Admin Only Permissions
        $permission = Permission::create([
            'name' => 'view_notifications',
        ]);

        $permission->role()->attach([1, 2]);
    }
}
