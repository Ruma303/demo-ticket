<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = [
            [
                'subject' => 'Sviluppo',
                'priority'=> 'Medium',
                'message' => 'lorem'
            ],
            [
                'subject' => 'Bug',
                'priority'=> 'High',
                'message' => 'lorem'
            ],
            [
                'subject' => 'Informazioni',
                'priority'=> 'Low',
                'message' => 'lorem'
            ],

        ];

        foreach($tickets as $ticket){
            $newTicket = new Ticket();
            $newTicket->subject = $ticket['subject'];
            $newTicket->priority = $ticket['priority'];
            $newTicket->message = $ticket['message'];
            $newTicket->save();
        }
    }
}
