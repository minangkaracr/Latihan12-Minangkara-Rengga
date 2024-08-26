<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoryChatSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("history_chat")->insert([
            'send_chat' => "Siapa itu Lionel Messi?",
            'get_chat'=> "Lionel Messi adalah pemain sepakbola",
            'created_at'=> now()->format('Y-m-d H:i:s'),
            'updated_at'=> now()->format('Y-m-d H:i:s')
        ]);
    }
}
