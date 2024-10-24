<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    /**
     * Get all of the comments for the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lignecommandes()
    {
        return $this->hasMany(LigneCommande::class, 'command_id', 'id');
    }

    /**
     * Get the user that owns the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client() 
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}
