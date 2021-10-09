<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne(related:'App\Models\Models\Category',foreignKey:'id',localKey:'category_id');
    }
}
