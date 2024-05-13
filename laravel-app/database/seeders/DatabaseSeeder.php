<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Submission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username'=>'benja',
            'customer_id'=>'1',
            'email' => 'benja@gmail.com',
            'password' => bcrypt('benjaplus'),
            'is_admin' => '1'
        ]);

        User::create([
            'username'=>'ade-irma',
            'customer_id'=>'2',
            'email' => 'adeirma@gmail.com',
            'password' => ('12345'),
            'is_admin' => '0'
        ]);

        User::create([
            'username'=>'gita-herwati',
            'customer_id'=>'3',
            'email' => 'gitaherewati@gmail.com',
            'password' => ('12345'),
            'is_admin' => '0'
        ]);

        Customer::create([
            'user_id' => '1',
            'nama' => 'Benjamin',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'jl.Kebenaran',
            'alasan' => '-',
            'telepon' => '81317893996',
            'id_kepegawaian' => '7',
            'pendapatan' => '-',
            'lama_angsuran' => '-',
            'pinjaman' => '-',
            'kelengkapan_berkas' =>'-',
        
        ]);  
        Customer::create([
            'user_id' => '2',
            'nama' => 'Ade Irma',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'jl.Irmanatasawari II blok P.3',
            'alasan' => 'Rumah',
            'telepon' => '856123781232',
            'id_kepegawaian' => '4',
            'pendapatan' => '4000000',
            'lama_angsuran' => '4',
            'pinjaman' => '8000000',
            'kelengkapan_berkas' =>'2',
            
        ]);  
        Customer::create([
            'user_id' => '3',
            'nama' => 'Gita Herwati',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'jl.Herwatimulya No.7',
            'alasan' => 'Usaha',
            'telepon' => '8571209232',
            'id_kepegawaian' => '3',
            'pendapatan' => '5500000',
            'lama_angsuran' => '2',
            'pinjaman' => '4000000',
            'kelengkapan_berkas' =>'3',
        
        ]);  
    }
}