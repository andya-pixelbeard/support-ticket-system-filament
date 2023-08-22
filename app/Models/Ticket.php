<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{
    use HasFactory;

    const PRIORITY = [
        'Low' => 'Low',
        'Medium' => 'Medium',
        'High' => 'High',
    ];

    const STATUS = [
        'Open' => 'Open',
        'Closed' => 'Closed',
        'Archived' => 'Archived',
    ];

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'is_resolved',
        'title',
        'comment',
        'assigned_by',
        'assigned_to',
    ];

    /**
     * @return BelongsTo
     */
    public function assignedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    /**
     * @return BelongsTo
     */
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return BelongsToMany
     */
    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class);
    }
}
