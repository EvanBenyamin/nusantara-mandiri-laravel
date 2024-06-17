<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Loan;
use App\Models\User;
use App\Models\Customer;
use App\Models\Employment;
use App\Models\Submission;
use App\Models\Installment;
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
//USER
        User::create([
            'username'=>'benja',
            'customer_id'=>'1',
            'email' => 'benja@gmail.com',
            'password' => bcrypt('benjaplus'),
            'is_admin' => '1'
        ]);

        User::create([
            'username'=>'asep',
            'customer_id'=>'2',
            'email' => 'asep@gmail.com',
            'password' => ('12345'),
            'is_admin' => '0'
        ]);

        User::create([
            'username'=>'wahyu',
            'customer_id'=>'3',
            'email' => 'wahyu@gmail.com',
            'password' => ('12345'),
            'is_admin' => '0'
        ]);

//CUSTOMER
        Customer::create([
            'user_id' => '1',
            'nama' => 'Benjamin',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'jl.Kebenaran',
            'alasan' => '-',
            'telepon' => '81317893996',
            'employment_id' => '7',
            'pendapatan' => '-',
            'lama_angsuran' => '-',
            'pinjaman' => '0',
            'kelengkapan_berkas' =>'-',
        
        ]);  
        Customer::create([
            'user_id' => '2',
            'nama' => 'asep',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'jl.Irmanatasawari II blok P.3',
            'alasan' => 'Rumah',
            'telepon' => '856123781232',
            'employment_id' => '4',
            'pendapatan' => '4000000',
            'lama_angsuran' => '4',
            'pinjaman' => '8000000',
            'kelengkapan_berkas' =>'Surat Tanah, Kartu Keluarga',
            'skor' => '6.743534281232'
            
        ]);  
        Customer::create([
            'user_id' => '3',
            'nama' => 'wahyu',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'jl.Herwatimulya No.7',
            'alasan' => 'Usaha',
            'telepon' => '8571209232',
            'employment_id' => '3',
            'pendapatan' => '5500000',
            'lama_angsuran' => '2',
            'pinjaman' => '4000000',
            'kelengkapan_berkas' =>'BPKB, Ijazah',
            'skor' => '6.543534281232'
        ]);  
//SUBMISSION
        Submission::create([
            'nama' => 'Benjamin',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl.Kebenaran',
            'email' => 'benja@gmail.com',
            'keperluan_meminjam' => '-',
            'telepon' => '-',
            'status_kepegawaian' => '-',
            'pendapatan' => '-',
            'lama_angsuran' => '-',
            'jumlah_pinjaman' => '0',
            'kelengkapan_berkas' => '-',
            'skor' => '10'
        ]);
        Submission::create([
            'nama' => 'Ade Irma',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl.Kesetiaan',
            'email' => 'adeirma@gmail.com',
            'keperluan_meminjam' => 'Pendidikan',
            'telepon' => '812931284',
            'status_kepegawaian' => '5',
            'pendapatan' => '5000000 - 6000000',
            'lama_angsuran' => '5',
            'jumlah_pinjaman' => '4000000',
            'kelengkapan_berkas' => 'BPKB, Buku Nikah',
            'skor' => '6.542243287246'
        ]);
        Submission::create([
            'nama' => 'Gita Herwati',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl.Kelemahlembutan',
            'email' => 'gita@gmail.com',
            'keperluan_meminjam' => 'Rekreasi',
            'telepon' => '8572382612',
            'status_kepegawaian' => '6',
            'pendapatan' => '5000000 - 6000000',
            'lama_angsuran' => '4',
            'jumlah_pinjaman' => '3000000',
            'kelengkapan_berkas' => 'KTP, Kartu Keluarga',
            'skor' => '6.742243287246'
        ]);
        Submission::create([
            'nama' => 'Siti Sayekti',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl.Goldlane XII No. 7 Kabupaten LandofDawn',
            'email' => 'layla@gmail.com',
            'keperluan_meminjam' => 'Rekreasi',
            'telepon' => '86328374923',
            'status_kepegawaian' => '5',
            'pendapatan' => '4000000 - 5000000',
            'lama_angsuran' => '4',
            'jumlah_pinjaman' => '5000000',
            'kelengkapan_berkas' => 'Ijazah, Asuransi',
            'skor' => '6.642243287246'
        ]);

//LOAN
        Loan::create([
            'user_id' => '1',
            'pinjaman' => '0',
            'jumlah_angsuran' => '0',
            'biaya_angsuran' => '0',
            'jatuh_tempo' => '2024-05-18'
        ]);
        Loan::create([
            'user_id' => '2',
            'pinjaman' => '8000000',
            'jumlah_angsuran' => '4',
            'biaya_angsuran' => '2400000',
            'jatuh_tempo' => '2024-05-18'
        ]);
        Loan::create([
            'user_id' => '3',
            'pinjaman' => '4000000',
            'jumlah_angsuran' => '2',
            'biaya_angsuran' => '2120000',
            'jatuh_tempo' => '2024-05-18'
        ]);

        Installment::create([
            'user_id' => 2, 
            'angsuran_ke' => 1, 
            'pembayaran' => 240000
        ]);


//EMPLOYMENT
        Employment::create([
            'id' => '2',
            'status_kepegawaian'=> 'Kontrak'
        ]);
        Employment::create([
            'id' => '3',
            'status_kepegawaian'=> 'Satpam'
        ]);
        Employment::create([
            'id' => '4',
            'status_kepegawaian'=> 'Pegawai'
        ]);
        Employment::create([
            'id' => '5',
            'status_kepegawaian'=> 'Operator'
        ]);
        Employment::create([
            'id' => '6',
            'status_kepegawaian'=> 'Sales Asisten'
        ]);
        Employment::create([
            'id' => '7',
            'status_kepegawaian'=> 'Staff'
        ]);
        Employment::create([
            'id' => '8',
            'status_kepegawaian'=> 'Kepala Regu'
        ]);
        Employment::create([
            'id' => '9',
            'status_kepegawaian'=> 'Manajer'
        ]);
    }
}