<?php

namespace LaravelReady\BlacklistWhitelist;

use LaravelReady\BlacklistWhitelist\Models\BlacklistWhitelist as Model;
use LaravelReady\BlacklistWhitelist\Enums\BlockType;


class BlacklistWhitelist
{
    public static function subject(string $domain, BlockType $type): Model
    {
        return Model::firstOrCreate([
            'subject' => $domain,
            'type' => $type,
        ]);
    }
}
