<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;

/**
 * Set the daemon log level.By default, log level is set to `0`.
 */
class SetLogLevelRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * daemon log level to set from `0` (less verbose) to `4` (most verbose)
     */
    #[Json]
    public int $level;

    public static function create(int $level): OtherRpcRequest
    {
        $self = new self();
        $self->level = $level;
        return $self;
    }
}
