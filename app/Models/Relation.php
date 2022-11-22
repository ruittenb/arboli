<?php

namespace App\Models;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Relation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'partner1_id',
        'partner2_id',
        'type',
        'married_name1',
        'married_name2',
        'place_start',
        'date_start',
        'date_end',
        'remark',
    ];

    public function partner1(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'partner1_id');
    }

    public function partner2(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'partner2_id');
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(
            Person::class,
            'person_x_relation',
            'relation_id',
            'person_id',
        );
    }
}
