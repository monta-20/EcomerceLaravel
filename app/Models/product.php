<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    // Relationship to get the category of the product
   public function Category() {
       // A product belongs to a category; 'category_id' is the foreign key
    return $this->belongsTo(Category::class, 'category_id', 'id');
   }

   /**
    * Get all of the comments for the product
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    //Relationship between Review and Products
   public function reviews()
   {
       return $this->hasMany(Review::class, 'product_id', 'id');
   }

   /**
    * Get the user that owns the product
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function ligneCommande()
   {
       return $this->belongsTo(ligneCommande::class, 'product_id', 'id');
   }

}
