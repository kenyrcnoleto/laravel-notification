<?php

namespace App\Models;

use App\Traits\Models\{HasPermissions, HasSearch};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\{SoftDeletes};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasPermissions;
    use SoftDeletes;
    use AuditableTrait;
    use HasSearch;

    protected $fillable = [
        'name',
        'email',
        'password',
        'restored_at',
        'restored_by',
        'deleted_by',
        'notification_channels',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'notification_channels' => 'array',
    ];

    public function routeNotificationForSms()
    {
        return $this->phone;
    }

    public function routeNotificationForWhatsApp()
    {
        return $this->phone;
    }

    public function routeNotificationForTelegram()
    {
        return $this->phone;
    }

    public function restoredBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'restored_by');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
