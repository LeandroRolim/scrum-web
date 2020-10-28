<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Member extends Pivot
{
    /**
     * @return BelongsTo|Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return BelongsTo|User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
