<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineStore extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function sellers(): BelongsToMany
    {
        return $this->belongsToMany(Seller::class);
    }
}
