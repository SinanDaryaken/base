<?php

namespace Nonoco\Base\Models;

use Nonoco\Base\Traits\AdminActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nonoco\Base\Traits\AdminAttributes;
use Nonoco\Base\Traits\AutoIncrement;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Class Admin
 * @package Nonoco\Base\Models
 * @property-read string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $deleted_at
 *
 * @property-read Attribute $full_name
 */
class Admin extends Authenticatable
{
    use SoftDeletes, AutoIncrement, AdminActivity, AdminAttributes;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * @var string[]
     */
    protected $hidden = ['password'];

    /**
     * @var string[]
     */
    protected $cast = ['full_name'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'super',
        'first_name',
        'last_name',
        'email',
        'password',
    ];
}
