<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Import outputs in hex format.
 */
class ImportOutputsRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * wallet outputs in hex format.
     */
    #[Json('outputs_data_hex')]
    public string $outputsDataHex;

    public static function create(string $outputsDataHex): RpcRequest
    {
        $self = new self();
        $self->outputsDataHex = $outputsDataHex;
        return new RpcRequest('import_outputs', $self);
    }
}
