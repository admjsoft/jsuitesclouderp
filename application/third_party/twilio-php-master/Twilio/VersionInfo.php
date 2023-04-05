<?php

namespace Twilio;

class VersionInfo
{
    public const MAJOR = 5;
    public const MINOR = 23;
    public const PATCH = 1;

    public static function string()
    {
        return implode('.', array(self::MAJOR, self::MINOR, self::PATCH));
    }
}
