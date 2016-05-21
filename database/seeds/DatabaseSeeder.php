<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateTables(array(
            'users',
            'password_resets',
            'tickets',
            'ticket_votes',
            'ticket_comments'
        ));

        $this->call(UserTableSeeder::class);

        Model::reguard();
    }

    private function truncateTables(array $tables)
    {
        //se borran las claves foraneas para poder limpiar las tablas
        $this->checkForeignKeys(false);

        foreach ($tables as $table) {
            \DB::table($table)->truncate();
        }
        //las activamos para cargar correctamente los seeders
        $this->checkForeignKeys(true);
    }

    private function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';
        \DB::statement("SET FOREIGN_KEY_CHECKS = $check;");
    }
}
