<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Tag extends Model
{
    protected $guarded = [];

    /**
     * The berita that belong to the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function berita(): BelongsToMany
    {
        return $this->belongsToMany(Berita::class, 'berita_tag');
    }
}
