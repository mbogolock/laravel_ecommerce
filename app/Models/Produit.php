<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_produit',
        'cat_id',
        'description_produit',
        'prix_produit',
        'image_produit',
    ];
}
