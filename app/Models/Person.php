<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'calling_name',
        'christian_names',
        'middle_name',
        'last_name',
        'sex',
        'gender',
        'place_birth',
        'date_birth',
        'place_baptized',
        'date_baptized',
        'place_death',
        'date_death',
        'cause_death',
        'place_buried',
        'date_buried',
        'father_id',
        'mother_id',
        'photo',
        'remark',
    ];

    public function father(): BelongsTo
    {
        return $this->belongsTo(self::class, 'father_id');
    }

    public function mother(): BelongsTo
    {
        return $this->belongsTo(self::class, 'mother_id');
    }
}
