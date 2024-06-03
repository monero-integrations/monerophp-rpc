<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Sign a transaction in multisig.
 */
class SignMultisigRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Multisig transaction in hex format, as returned by `transfer` under `multisig_txset`.
     */
    #[Json('tx_data_hex')]
    public string $txDataHex;

    public static function create(string $txDataHex): RpcRequest
    {
        $self = new self();
        $self->txDataHex = $txDataHex;
        return new RpcRequest('sign_multisig', $self);
    }
}
