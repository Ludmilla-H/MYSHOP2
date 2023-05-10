<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;


    protected $fillable =['category_id', 'user_id' , 'name' , 'description' , 'price' , 'image'] ;

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }
    
    public function categorie(): BelongsTo{
        
        return $this->belongsTo(Categorie::class);
    }

}
