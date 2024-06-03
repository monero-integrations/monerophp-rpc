<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Set description for an account tag.
 */
class SetAccountTagDescriptionRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Set a description for this tag.
     */
    #[Json]
    public string $tag;

    /**
     * Description for the tag.
     */
    #[Json]
    public string $description;

    public static function create(string $tag, string $description): RpcRequest
    {
        $self = new self();
        $self->tag = $tag;
        $self->description = $description;
        return new RpcRequest('set_account_tag_description', $self);
    }
}
