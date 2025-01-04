<?php

namespace App\Models; //Représenter les entités de la base de données et interagir avec elles de manière simple grâce à Eloquen:L'ORM 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clue extends Model
{
    use HasFactory;
    // Relation
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Méthode pour modifier le contenu de l'indice
    public function editClueContent($content)
    {
        $this->content = $content;
        $this->save();
    }
}
