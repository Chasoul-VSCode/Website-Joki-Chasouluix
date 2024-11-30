<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email', 
        'package_type',
        'pages_count',
        'project_description',
        'technologies',
        'deadline',
        'additional_notes',
        'total_price',
        'status',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'package_type' => 'string',
        'pages_count' => 'integer',
        'project_description' => 'string',
        'technologies' => 'array',
        'deadline' => 'date',
        'additional_notes' => 'string',
        'total_price' => 'decimal:2',
        'status' => 'string',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the list of valid status values
     */
    public static function getStatusOptions(): array
    {
        return ['Check', 'Proses', 'Selesai', 'Batal'];
    }

    /**
     * Get the formatted status value
     */
    public function getFormattedStatus(): string
    {
        return ucfirst($this->status);
    }

    /**
     * Count orders by status
     */
    public static function countByStatus(string $status): int
    {
        return self::where('status', $status)->count();
    }
}
