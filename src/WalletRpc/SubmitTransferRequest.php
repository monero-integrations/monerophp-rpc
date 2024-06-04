<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Submit a previously signed transaction on a read-only wallet (in cold-signing process).
 */
class SubmitTransferRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Set of signed tx returned by "sign_transfer"
     */
    #[Json('tx_data_hex')]
    public string $txDataHex;

    public static function create(string $txDataHex): RpcRequest
    {
        $self = new self();
        $self->txDataHex = $txDataHex;
        return new RpcRequest('submit_transfer', $self);
    }
}
