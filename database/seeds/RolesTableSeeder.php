<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ["admin","lawyer", "user"];
        foreach($roles as $roleName) {
            $r = Role::where('name',$roleName)->first();
            if ($r) continue;
            $r = new Role();
            $r->name = $roleName;
            $r->save();
        }
        $existedRoles = Role::all();
        foreach($existedRoles as  $existedRole) {
            if (!in_array($existedRole->name, $roles)) {
                $existedRole->delete();
            }
        }
    }
}
