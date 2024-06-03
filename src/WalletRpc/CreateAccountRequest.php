<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Create a new account with an optional label.
 */
class CreateAccountRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Label for the account.
     */
    #[Json(omit_empty: true)]
    public ?string $label;

    public static function create(?string $label = null): RpcRequest
    {
        $self = new self();
        $self->label = $label;
        return new RpcRequest('create_account', $self);
    }
}
