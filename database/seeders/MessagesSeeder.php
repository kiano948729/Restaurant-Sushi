<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Message::insert([
            ['name'=>'Jan Jansen','email'=>'jan@email.nl','message'=>'Hallo, ik wil graag een reservering maken voor 8 personen. Is dit mogelijk?','read'=>false],
            ['name'=>'Sarah de Vries','email'=>'sarah@email.nl','message'=>'Het eten was uitstekend! Bedankt voor de geweldige service.','read'=>true],
        ]);
    }
}
