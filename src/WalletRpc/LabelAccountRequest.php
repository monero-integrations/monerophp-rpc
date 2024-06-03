<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Label an account.
 */
class LabelAccountRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Apply label to account at this index.
     */
    #[Json('account_index')]
    public int $accountIndex;

    /**
     * Label for the account.
     */
    #[Json]
    public string $label;

    public static function create(int $accountIndex, string $label): RpcRequest
    {
        $self = new self();
        $self->accountIndex = $accountIndex;
        $self->label = $label;
        return new RpcRequest('label_account', $self);
    }
}
