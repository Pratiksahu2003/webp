<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageFeature extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'package_id', 'feature_title', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(ServicePackage::class, 'package_id');
    }
}
