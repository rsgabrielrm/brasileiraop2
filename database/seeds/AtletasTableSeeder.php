<?php

use Illuminate\Database\Seeder;

class AtletasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atletas')->insert([
            'nome' => 'Marcelo Pitol',
            'clube' => 'Grêmio Esportivo Brasil',
            'idade' => 35,
            'salario' => 3000.00
        ]);
        DB::table('atletas')->insert([
            'nome' => 'Yuri Souza Almeida',
            'clube' => 'Esporte Clube Juventude',
            'idade' => 23,
            'salario' => 2500.00
        ]);
        DB::table('atletas')->insert([
            'nome' => 'Anderson Pico',
            'clube' => 'Esporte Clube São Paulo - RS',
            'idade' => 30,
            'salario' => 1600.00
        ]);
        DB::table('atletas')->insert([
            'nome' => 'Juan Matheus',
            'clube' => 'Esporte Clube Londrina - RS',
            'idade' => 18,
            'salario' => 3800.00
        ]);
    }
}
