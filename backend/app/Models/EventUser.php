<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventUser extends Pivot
{
    use HasFactory;

    // Si tu veux accéder à l'attribut 'status' dans la table pivot
    protected $fillable = ['status'];

    // Méthode pour récupérer l'event associé à cette participation
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Méthode pour récupérer l'utilisateur associé à cette participation
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

