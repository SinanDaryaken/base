<?php

namespace Nonoco\Base\Traits;

use Nonoco\Base\Models\AdminActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait AdminActivity
{
    /**
     * @return void
     */
    public static function bootAdminActivity(): void
    {
        if (strpos(request()->getPathInfo(), '/admin') > -1) {
            static::saved(function ($model) {
                if ($model->wasRecentlyCreated) {
                    static::storeLog($model, 'CREATED');
                } else {
                    if (!$model->getChanges()) {
                        return;
                    }

                    static::storeLog($model, 'UPDATED');
                }
            });

            static::deleted(function (Model $model) {
                static::storeLog($model, 'DELETED');
            });
        }
    }

    /**
     * @param Model $model
     * @return string
     */
    public static function getTagName(Model $model): string
    {
        return !empty($model->tagName) ? $model->tagName : Str::title(Str::snake(class_basename($model), ' '));
    }

    /**
     * @return string|null
     */
    public static function getAdminID(): ?string
    {
        return Auth::guard('admin')->check() ? Auth::guard('admin')->id() : null;
    }

    /**
     * @param $model
     * @param $action
     * @return void
     */
    public static function storeLog($model, $action): void
    {
        $newValues = null;
        $oldValues = null;
        if ($action === 'CREATED') {
            $newValues = $model->getAttributes();
        } elseif ($action === 'UPDATED') {
            $newValues = $model->getChanges();
        }
        if ($action !== 'CREATED') {
            $oldValues = $model->getOriginal();
        }

        AdminActivityLog::create([
            'admin_id' => static::getAdminID(),
            'model' => static::getTagName($model),
            'action' => $action,
            'old_data' => !empty($oldValues) ? json_encode($oldValues) : null,
            'new_data' => !empty($newValues) ? json_encode($newValues) : null,
        ]);
    }
}
