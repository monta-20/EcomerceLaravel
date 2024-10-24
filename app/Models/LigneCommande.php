<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    /**
     * Get the user that owns the LigneCommande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commands()
    {
        return $this->belongsTo(Commande::class, 'command_id', 'id');
    }

    /**
     * Get the user associated with the LigneCommande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(product::class, 'product_id', 'id');
    }
}
