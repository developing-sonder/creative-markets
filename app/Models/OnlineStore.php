<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OnlineStore extends Model
{
    use HasFactory;

    public function sellers(): BelongsToMany
    {
        return $this->belongsToMany(Seller::class);
    }
}
