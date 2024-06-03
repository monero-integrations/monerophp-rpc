<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\CollectionTrait;

/**
 * Submit a mined block to the network.
 * @implements \IteratorAggregate<string>
 */
class SubmitBlockRequest implements ParameterInterface, \IteratorAggregate
{
    use CollectionTrait;

    /**
     * @param string[] $values
     */
    public static function create(array $values): RpcRequest
    {
        $self = new self();
        $self->values = $values;
        return new RpcRequest('submit_block', $self);
    }
}
