<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;

/**
 * Set the log hash rate display mode.
 */
class SetLogHashRateRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * States if hash rate logs should be visible (`true`) or hidden (`false`)
     */
    #[Json]
    public bool $visible;

    public static function create(bool $visible): OtherRpcRequest
    {
        $self = new self();
        $self->visible = $visible;
        return $self;
    }
}
