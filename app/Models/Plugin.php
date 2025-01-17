<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Plugin extends NexusModel
{
    protected $fillable = ['display_name', 'package_name', 'remote_url', 'installed_version', 'status', 'description', 'status_result'];

    const STATUS_NOT_INSTALLED = -1;
    const STATUS_NORMAL = 0;

    const STATUS_PRE_INSTALL = 1;
    const STATUS_INSTALLING = 2;
    const STATUS_INSTALL_FAILED = 3;

    const STATUS_PRE_UPDATE = 11;
    const STATUS_UPDATING = 12;
    const STATUS_UPDATE_FAILED = 13;

    const STATUS_PRE_DELETE = 101;
    const STATUS_DELETING = 102;
    const STATUS_DELETE_FAILED = 103;

    public function statusText(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => __('plugin.status.' . $attributes['status'])
        );
    }
}
