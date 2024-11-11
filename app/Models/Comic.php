<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comic extends Model
{
    /** @use HasFactory<\Database\Factories\ComicFactory> */
    use HasFactory;
    protected $fillable = ['isbn','title','description','publisher',
    'release_date','pages','image'];
    public function escritors(): BelongsToMany{
        //checar la relacion que este bien escrita
        return $this->belongsToMany(Escritor::class);
    }
}
