<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Escritor extends Model
{
    /** @use HasFactory<\Database\Factories\EscritorFactory> */
    use HasFactory;
    protected $fillable = ['name','last_name'];

    public function comics(): BelongsToMany{
        return $this->belongsToMany(Comic::class);
    }
}
