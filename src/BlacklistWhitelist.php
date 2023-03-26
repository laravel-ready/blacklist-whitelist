<?php

namespace LaravelReady\BlacklistWhitelist;

use LaravelReady\BlacklistWhitelist\Models\BlacklistWhitelist as Model;
use LaravelReady\BlacklistWhitelist\Enums\BlockType;


class BlacklistWhitelist
{
    public static function subject(string $subject, BlockType $type): Model
    {
        return Model::firstOrCreate([
            'subject' => $subject,
            'type' => $type,
        ]);
    }

    public static function isBlocked(string $subject): bool
    {
        return Model::where('subject', $subject)
            ->where('type', BlockType::Blacklist)
            ->exists();
    }

    public static function isAllowed(string $subject): bool
    {
        return Model::where('subject', $subject)
            ->where('type', BlockType::Whitelist)
            ->exists();
    }
}
