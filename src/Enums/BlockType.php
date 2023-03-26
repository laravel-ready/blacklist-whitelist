<?php

namespace LaravelReady\BlacklistWhitelist\Enums;

enum BlockType: string
{
    case Blacklist = 'blacklist';
    case Whitelist = 'whitelist';

    public function equals(BlockType $type): bool
    {
        return $this->value === $type->value;
    }
}
