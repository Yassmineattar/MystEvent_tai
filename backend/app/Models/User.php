<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type', // Détermine si l'utilisateur est un organisateur ou un participant
    ];

    /**
     * Les attributs cachés pour les tableaux.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui devraient être castés.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation : Un utilisateur de type organisateur peut créer plusieurs événements.
     */
    public function events()
    {
        return $this->hasMany(Event::class, 'organizerId');
    }

    /**
     * Relation : Un utilisateur peut avoir plusieurs tickets.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }

    /**
     * Relation : Un utilisateur peut participer à plusieurs événements (Relation Many-to-Many).
     */
    public function participations()
    {
        return $this->belongsToMany(Event::class, 'event_user')
                ->withPivot('status') // Si tu veux accéder au statut dans la relation
                ->withTimestamps();
    }

    
}
