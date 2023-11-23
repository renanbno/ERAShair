<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            Agenda::create([
                'profissional_id' => $i,
                'cliente_id' => $i,
                'servico_id'=> $i,
                'data_hora'=>  "2024-04-04-14:45:20",
                'tipo_pagamento' => 'tipo'. $i,
                'valor' => '20.00',
               

            ]);
        }
       
    }
}