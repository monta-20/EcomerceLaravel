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

}
