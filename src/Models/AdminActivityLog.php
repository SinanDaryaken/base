<?php

namespace App\Models;

use App\Traits\AutoIncrement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AdminActivityLog
 * @package App\Models
 * @property-read string $id
 * @property string $admin_id
 * @property string $model
 * @property string $action
 * @property array $old_data
 * @property array $new_data
 * @property-read Carbon $created_at
 */
class AdminActivityLog extends Model
{
    use AutoIncrement;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * Predefined
     */
    const UPDATED_AT = null;
    /**
     * @var string[]
     */
    public $timestamps = ['created_at'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'admin_id',
        'model',
        'action',
        'old_data',
        'new_data'
    ];

    /**
     * @return BelongsTo
     */
    public function admins(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
