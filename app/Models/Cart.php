<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =['user_id' , 'produit_id' , 'quantite' , 'price'] ;

    public function produit(): BelongsTo {
        
        return $this->belongsTo(Produit::class);
    }
}
