<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use App\Configuration;
use Ultraware\Roles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
    	$adminRole = Role::whereSlug('admin')->first();
        $legalEntityRole = Role::whereSlug('legal')->first();
        $employeeRole = Role::whereSlug('employee')->first();
        $privateRole = Role::whereSlug('private')->first();




        $user_admin = User::create([
        	'name' => 'Super admin',
        	'email' => 'damir@ofir.hr',
        	'password' => bcrypt('102030'),
        	'address' => 'I. Gundulića 5/2',
        	'company' => 'Ofir d.o.o.'
        ]);
        $user_admin->attachRole($adminRole);

        $config_user_admin = Configuration::create([
            'applicationName' => 'Admin App Test',
            'applicationAddress' => 'Admin App Address',
            'emailForReports' => 'info@Wine360.eu',
        ]);
        $config_user_admin->configuration()->associate($user_admin);
        $config_user_admin->save();




        $user_legalEntity = User::create([
        	'name' => 'Pravna osoba',
        	'email' => 'legal@ofir.hr',
        	'password' => bcrypt('102030'),
        	'address' => 'Adresa pravne osobe',
            'company' => 'Tvrtka pravne osobe',
        	'company_oib' => '123123123',
            'oib' => '12345678911'
        ]);
        $user_legalEntity->attachRole($legalEntityRole);

        $config_user_legalEntity = Configuration::create([
            'applicationName' => 'legal App Test',
            'applicationAddress' => 'legal App Address',
            'emailForReports' => 'legalReports@ofir.hr',
        ]);
        $config_user_legalEntity->configuration()->associate($user_legalEntity);
        $config_user_legalEntity->save();




        $user_private = User::create([
        	'name' => 'Privatni korisnik osoba',
        	'email' => 'private@ofir.hr',
        	'password' => bcrypt('102030'),
        	'address' => 'Adresa privatnog korisnika'
        ]);
        $user_private->attachRole($privateRole);

        $config_user_private = Configuration::create([
            'applicationName' => 'Private App Test',
            'applicationAddress' => 'Private App Address',
            'emailForReports' => 'privateReports@ofir.hr',
        ]);
        $config_user_private->configuration()->associate($user_private);
        $config_user_private->save();




        $user_employee = App\User::create([
            'name'=>'Djelatnik pravne osobe',
            'email'=>'employee@ofir.hr',
            'password'=>bcrypt('102030'),
            'address'=>'Adresa djelatnika'
        ]);
        $user_employee->attachRole($employeeRole);

        $user_employee->legalEntityUser()->associate($user_legalEntity);
        $user_employee->save();

        $config_user_employee = Configuration::create([
            'applicationName' => 'employee App Test',
            'applicationAddress' => 'employee App Address',
            'emailForReports' => $user_employee->legalEntityUser->configuration->emailForReports,
        ]);
        $config_user_employee->configuration()->associate($user_employee);
        $config_user_employee->save();




        $user_employee1 = App\User::create([
            'name'=>'Djelatnik pravne osobe 1',
            'email'=>'employee1@ofir.hr',
            'password'=>bcrypt('102030'),
            'address'=>'Adresa djelatnika 1'
        ]);
        $user_employee1->attachRole($employeeRole);

        $user_employee1->legalEntityUser()->associate($user_legalEntity);
        $user_employee1->save();

        $config_user_employee = Configuration::create([
            'applicationName' => 'employee App Test 1',
            'applicationAddress' => 'employee App Address 1',
            'emailForReports' => $user_employee1->legalEntityUser->configuration->emailForReports,
        ]);
        $config_user_employee->configuration()->associate($user_employee1);
        $config_user_employee->save();

        
    }
}
