<?php

namespace Database\Seeders;

use App\Models\Roles\Ability;
use App\Models\Roles\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $ability=[
       'show_sections'=>'Show Sections',
       'delet_sections'=>'Delet Sections',
       'edit_sections'=>'Edit Sections',
       'add_sections'=>'Add Sections',
       'show_courses'=>'Show Courses',
        'delet_courses'=>'Delet Courses',
        'edit_courses'=>'Edit Courses',
       'print_exsel_student'=>'print Exsel Student',
       'add_courses'=>'Add Courses',
       'show_users'=>'Show Users',
       'add_users'=>'Add Users',
       'edit_users'=>'Edit Users',
       'delet_users'=>'Delet Users',
       'edit_role_user'=>'Edit Role Users',

       'show_role'=>'Show Role',
       'add_role'=>'Add Role',
       'edit_role'=>'Edit Role',
       'delet_role'=>'Delete Role',
       'project_student'=>'Project Student',
       'coach'=>'All Coach',
    ];
    public function run()
    {




        Roles::create(['name'=>'Super Admin']);

        /**=================================================*/

        /**=================================================*/

        foreach ($this->ability as $code => $name){

            Ability::create([
               'name'=>$name,
                'code'=>$code,
            ]);
        }


        /**=================================================*/
       $role= Roles::where('id',1)->select('id')->first();
        $role->abilites()->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]);


        /**=================================================*/

        \App\Models\User::create([
            'name_ar' => 'زكريا عباس',
            'name_en' => 'zakeria Abass',
            'email' => 'zkryabas174@gmail.com',
            'password'=>Hash::make(123456789),
            'type'=>1,
           'role_id'=>1
        ]);

    }
}
