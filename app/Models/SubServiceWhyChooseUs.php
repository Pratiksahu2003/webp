<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubServiceWhyChooseUs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_service_why_choose_us';

    protected $fillable = [
        'sub_service_id', 'title', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function subService(): BelongsTo
    {
        return $this->belongsTo(SubService::class);
    }
}
