<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relationship to get products belonging to the category
    public function products() {
    // One category has many products; 'category_id' is the foreign key in products table
       return $this->hasMany(product::class, 'category_id', 'id');
    }

}
