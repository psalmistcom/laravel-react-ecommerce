<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::create(['name' => RolesEnum::USER->value]);
        $vendorRole = Role::create(['name' => RolesEnum::VENDOR->value]);
        $adminRole = Role::create(['name' => RolesEnum::ADMIN->value]);

        $approveVendors = Permission::create([
            'name' => PermissionsEnum::ApproveVendors->value
        ]);
        $sellProducts = Permission::create([
            'name' => PermissionsEnum::SellProducts->value
        ]);
        $buyProducts = Permission::create([
            'name' => PermissionsEnum::BuyProducts->value
        ]);

        $userRole->syncPermissions([$buyProducts]);
        $vendorRole->syncPermissions([$buyProducts, $sellProducts]);
        $adminRole->syncPermissions([
            $buyProducts,
            $sellProducts,
            $approveVendors
        ]);
    }
}
