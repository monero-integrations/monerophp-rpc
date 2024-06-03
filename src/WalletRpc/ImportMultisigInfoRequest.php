<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Import multisig info from other participants.
 */
class ImportMultisigInfoRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] List of multisig info in hex format from other participants.
     */
    #[Json]
    public array $info;


    /**
     * @param string[] $info
     */
    public static function create(array $info): RpcRequest
    {
        $self = new self();
        $self->info = $info;
        return new RpcRequest('import_multisig_info', $self);
    }
}
