<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketEmail;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'user_id', 'email', 'code', 'status'];

    // Relations
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Méthode pour envoyer un ticket par email
    public function sendTicketEmail()
    {
        Mail::to($this->email)->send(new TicketEmail($this));
    }
}
