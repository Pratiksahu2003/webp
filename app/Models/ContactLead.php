<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'service',
        'budget',
        'message',
        'ip_address',
        'user_agent',
        'status',
        'admin_notes',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public const STATUSES = ['new', 'read', 'contacted', 'archived'];

    public const SERVICES = [
        'software-development' => 'Software Development',
        'web-development' => 'Web Development',
        'mobile-development' => 'Mobile App Development',
        'data-science' => 'Data Science & AI',
        'qa-testing' => 'QA & Software Testing',
        'ux-ui-design' => 'UX/UI Design',
        'consulting' => 'IT Consulting',
    ];

    public const BUDGETS = [
        'under-10k' => 'Under $10,000',
        '10k-25k' => '$10,000 - $25,000',
        '25k-50k' => '$25,000 - $50,000',
        '50k-100k' => '$50,000 - $100,000',
        'over-100k' => 'Over $100,000',
    ];

    public function scopeStatus($query, ?string $status)
    {
        if ($status) {
            $query->where('status', $status);
        }

        return $query;
    }

    public function getServiceLabelAttribute(): ?string
    {
        return $this->service ? (self::SERVICES[$this->service] ?? $this->service) : null;
    }

    public function getBudgetLabelAttribute(): ?string
    {
        return $this->budget ? (self::BUDGETS[$this->budget] ?? $this->budget) : null;
    }

    public function markAsRead(): void
    {
        if ($this->status === 'new') {
            $this->update([
                'status' => 'read',
                'read_at' => now(),
            ]);
        }
    }
}
