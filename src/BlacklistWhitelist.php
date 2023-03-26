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

    public static function isBlocked(string $subject): bool|null
    {
        $subject = Model::where('subject', $subject)->first();

        if ($subject) {
            return $subject->type->equals(BlockType::Blacklist);
        }

        return null;
    }

    public static function isAllowed(string $subject): bool|null
    {
        $subject = Model::where('subject', $subject)->first();

        if ($subject) {
            return $subject->type->equals(BlockType::Whitelist);
        }

        return null;
    }
}
