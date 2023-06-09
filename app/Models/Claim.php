<?php

namespace App\Models;

use App\Enums\{
    ClaimStatusEnum, ClaimTypeEnum
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'date',
        'amount',
        'status',
        'submitted_at',
        'approved_at',
        'rejected_at',
    ];

    protected $casts = [
        'type' => ClaimTypeEnum::class,
        'description' => 'string',
        'date' => 'date:Y-m-d',
        'amount' => 'integer',
        'status' => ClaimStatusEnum::class,
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];
    
    protected $appends = [
        'display_type',
        'display_date',
        'display_status',
        'display_submitted_at'
    ];

    public function getDisplayTypeAttribute()
    {
        return $this->type->description();
    }

    public function getDisplayDateAttribute()
    {
        return $this->date->format('d/m/Y');
    }

    public function getDisplayStatusAttribute()
    {
        if($this->status == ClaimStatusEnum::DRAFT && is_null($this->submitted_at))
            return 'Draft';
            
        return $this->status->description();
    }

    public function getDisplaySubmittedAtAttribute()
    {
        return is_null($this->submitted_at) ? '-' : $this->submitted_at->format('d/m/Y h:m A');
    }

    public function submitted(): void
    {
        $this->update(['submitted_at' => now()]);
    }

    public function approved(): void
    {
        $this->update([
            'status' => ClaimStatusEnum::APPROVED,
            'approved_at' => now()
        ]);
    }

    public function rejected(): void
    {
        $this->update([
            'status' => ClaimStatusEnum::REJECTED,
            'rejected_at' => now()
        ]);
    }
}
