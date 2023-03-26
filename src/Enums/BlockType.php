<?php

namespace LaravelReady\BlacklistWhitelist\Enums;

enum BlockType: string
{
    case Blacklist = 'blacklist';
    case Whitelist = 'whitelist';
}
