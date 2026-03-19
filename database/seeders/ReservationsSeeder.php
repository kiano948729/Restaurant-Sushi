<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Reservation::insert([
            ['name'=>'Jan Jansen','email'=>'jan@email.nl','phone'=>'+31612345678','date'=>'2026-03-05','time'=>'19:00','guests'=>4,'status'=>'pending'],
            ['name'=>'Sarah de Vries','email'=>'sarah@email.nl','phone'=>'+31698765432','date'=>'2026-03-06','time'=>'18:30','guests'=>2,'status'=>'accepted'],
        ]);
    }
}
