<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';

    protected $fillable = [
        'uuid',
        'title',
        'description',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
