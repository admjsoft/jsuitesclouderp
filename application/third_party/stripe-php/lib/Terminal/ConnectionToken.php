<?php

namespace Stripe\Terminal;

/**
 * Class ConnectionToken
 *
 * @property string $object
 * @property string $location
 * @property string $secret
 *
 * @package Stripe\Terminal
 */
class ConnectionToken extends \Stripe\ApiResource
{
    use \Stripe\ApiOperations\Create;
    public const OBJECT_NAME = 'terminal.connection_token';
}
