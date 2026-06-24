<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubServiceFaq extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sub_service_id', 'question', 'answer', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function subService(): BelongsTo
    {
        return $this->belongsTo(SubService::class);
    }
}
