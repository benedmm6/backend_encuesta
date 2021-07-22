<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Superadmin']);
        $role2 = Role::create(['name'=>'Admin']);
        $role3 = Role::create(['name'=>'Usuario']);

        $permiso1= Permission::create(['name'=>'dash',
                                      'description'=>'Ver panel de administracion'])->syncRoles([$role1,$role2]);

        $permiso2=Permission::create(['name'=>'admin.tramites.index',
                                        'description'=>'Ver listado de tramites'])->syncRoles([$role1,$role2]);
        $permiso3=Permission::create(['name'=>'admin.tramites.create',
                                        'description'=>'Crear tramites'])->syncRoles([$role1,$role2]);
        $permiso4=Permission::create(['name'=>'admin.tramites.edit',
                                        'description'=>'Editar tramites'])->syncRoles([$role1,$role2]);
        $permiso5=Permission::create(['name'=>'admin.tramites.destroy',
                                        'description'=>'Eliminar tramites'])->syncRoles([$role1,$role2]);

        $permiso6=Permission::create(['name'=>'admin.municipios.index',
                                        'description'=>'Ver listado de municipios'])->syncRoles([$role1,$role2]);
        $permiso7=Permission::create(['name'=>'admin.municipios.create',
                                        'description'=>'Registrar municipios'])->syncRoles([$role1,$role2]);
        $permiso8=Permission::create(['name'=>'admin.municipios.edit',
                                        'description'=>'Editar municipios'])->syncRoles([$role1,$role2]);
        $permiso9=Permission::create(['name'=>'admin.municipios.destroy',
                                        'description'=>'Eliminar municipios'])->syncRoles([$role1,$role2]);

        $permiso10=Permission::create(['name'=>'admin.categorias.index',
                                        'description'=>'Ver categorias'])->syncRoles([$role1,$role2]);
        $permiso11=Permission::create(['name'=>'admin.categorias.create',
                                        'description'=>'Crear categoria'])->syncRoles([$role1,$role2]);
        $permiso12=Permission::create(['name'=>'admin.categorias.edit',
                                        'description'=>'Editar categoria'])->syncRoles([$role1,$role2]);
        $permiso13=Permission::create(['name'=>'admin.categorias.destroy',
                                        'description'=>'Eliminar categoria'])->syncRoles([$role1,$role2]);

        $permiso14=Permission::create(['name'=>'admin.encuestas.index',
                                        'description'=>'ver encuestas'])->syncRoles([$role1,$role2]);
        $permiso15=Permission::create(['name'=>'admin.encuestas.create',
                                        'description'=>'Crear encuestas'])->syncRoles([$role1,$role2]);
        $permiso16=Permission::create(['name'=>'admin.encuestas.edit',
                                        'description'=>'Editar encuesta'])->syncRoles([$role1,$role2]);
        $permiso17=Permission::create(['name'=>'admin.encuestas.destroy',
                                        'description'=>'Eliminar encuesta'])->syncRoles([$role1,$role2]);

        $permiso18=Permission::create(['name'=>'admin.usuarios.index',
                                        'description'=>'Ver listado de usuarios'])->assignRole($role1);
        $permiso19=Permission::create(['name'=>'admin.usuarios.create',
                                        'description'=>'Crear Usuario'])->assignRole($role1);
        $permiso20=Permission::create(['name'=>'admin.usuarios.edit',
                                        'description'=>'Editar usuario'])->assignRole($role1);
        $permiso21=Permission::create(['name'=>'admin.usuarios.destroy',
                                        'description'=>'Eliminar usuario'])->assignRole($role1);

        $permiso22=Permission::create(['name'=>'admin.roles.index',
                                        'description'=>'Ver listado de roles'])->assignRole($role1);
        $permiso23=Permission::create(['name'=>'admin.roles.create',
                                        'description'=>'Crear rol'])->assignRole($role1);
        $permiso24=Permission::create(['name'=>'admin.role.edit',
                                        'description'=>'Editar rol'])->assignRole($role1);
        $permiso25=Permission::create(['name'=>'admin.role.destroy',
                                        'description'=>'Eliminar rol'])->assignRole($role1);
                                        
        $permiso26=Permission::create(['name'=>'admin.permisos.index',
                                        'description'=>'Ver listado de permisos'])->assignRole($role1);
        $permiso27=Permission::create(['name'=>'admin.permisos.create',
                                        'description'=>'Crear permiso'])->assignRole($role1);
        $permiso28=Permission::create(['name'=>'admin.permisos.edit',
                                        'description'=>'Editar permisos'])->assignRole($role1);
        $permiso29=Permission::create(['name'=>'admin.permisos.destroy',
                                        'description'=>'Eliminar permiso'])->assignRole($role1);

        $root= User::Create(['name'=>'root',
                             'email'=>'root@admin.com',
                              'password'=>bcrypt('root1234')])->assignRole($role1);
    }
}
