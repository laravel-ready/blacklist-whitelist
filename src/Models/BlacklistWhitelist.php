<?php

namespace LaravelReady\BlacklistWhitelist\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LaravelReady\BlacklistWhitelist\Enums\BlockType;

class BlacklistWhitelist extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->table = Str::plural(Config::get('blacklist-whitelist.table_name', 'blacklist_whitelist'));

        parent::__construct($attributes);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    protected $table = 'blacklist_whitelist';

    protected $fillable = [
        'subject',
        'type',
    ];

    protected $casts = [
        'type' => BlockType::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Config::get('blacklist-whitelist.user_model', 'App\Models\User'));
    }
}
