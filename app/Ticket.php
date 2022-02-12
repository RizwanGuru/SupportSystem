<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable=[
        'user_id',
        'client_id',
        'subject',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ticketreplies()
    {
        return $this->hasMany(TicketReplies::class);
    }
}
