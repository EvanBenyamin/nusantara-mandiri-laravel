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
            'alasan' => '-',
            'status_kepegawaian' => '-',
            'pendapatan' => '-',
            'lama_angsuran' => '-',
            'kelengkapan_berkas' =>'-',
            'pinjaman' => '-',
            'alamat' => '-'
        ]);  
        Customer::create([
            'user_id' => '2',
            'nama' => 'Ade Irma',
            'alasan' => 'Rumah',
            'status_kepegawaian' => 'Operator',
            'pendapatan' => '4000000',
            'lama_angsuran' => '2',
            'kelengkapan_berkas' =>'3',
            'pinjaman' => '5000000',
            'alamat' => 'Jl. ABCD'
        ]);  
        Customer::create([
            'user_id' => '3',
            'nama' => 'Gita Herwati',
            'alasan' => 'Usaha',
            'status_kepegawaian' => 'Sales Asisten',
            'pendapatan' => '5500000',
            'lama_angsuran' => '3',
            'kelengkapan_berkas' =>'2',
            'pinjaman' => '6000000',
            'alamat' => 'Jl. BCDE'
        ]);  
    }
}