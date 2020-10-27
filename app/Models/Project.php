<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    /**
     * @return BelongsTo|User
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany|Collection
     */
    public function members()
    {
        return $this->belongsToMany(User::class, Member::class);
    }
}
