<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReplies extends Model
{
    protected $fillable=[
        'ticket_id',
        'reply_by',
        'message',
        'image',
         
    ];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
