<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Model\Address;
use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Analyzes a string to determine whether it is a valid monero wallet address and returns the result and the address specifications.
 */
class ValidateAddressRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * The address to validate.
     */
    #[Json]
    public Address|string $address;

    /**
     * If true, consider addresses belonging to any of the three Monero networks (mainnet, stagenet, and testnet) valid. Otherwise, only consider an address valid if it belongs to the network on which the rpc-wallet's current daemon is running (.
     * When omitted the default value is false
     */
    #[Json('any_net_type', omit_empty: true)]
    public ?bool $anyNetType;

    /**
     * (Optional); If true, consider [OpenAlias-formatted addresses]({{ site.baseurl }}/resources/moneropedia/openalias.html) valid (Defaults to false).
     */
    #[Json('allow_openalias', omit_empty: true)]
    public ?bool $allowOpenalias;

    public static function create(Address|string $address, ?bool $anyNetType = false, ?bool $allowOpenalias = false): RpcRequest
    {
        $self = new self();
        $self->address = $address;
        $self->anyNetType = $anyNetType;
        $self->allowOpenalias = $allowOpenalias;
        return new RpcRequest('validate_address', $self);
    }
}
