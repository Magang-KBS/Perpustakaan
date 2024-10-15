<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class PetugasSeeder extends Seeder
{
    public function run(): void{
        DB::table(table:'petugas')->insert(values:[
            'nama_petugas' => 'Felicius Andreas Manehat',
            'username' => 'feliciusandreas001',
            'password' => Hash::make(value:'petugas001'),
            'email_petugas' => 'feliciusandreas01@mail.com',
        ]);
    }
}
