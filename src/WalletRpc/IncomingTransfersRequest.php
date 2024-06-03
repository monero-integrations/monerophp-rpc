<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\IncomingTransferType;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Return a list of incoming transfers to the wallet.
 */
class IncomingTransfersRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * "all": all the transfers, "available": only transfers which are not yet spent, OR "unavailable": only transfers which are already spent.
     */
    #[Json('transfer_type')]
    public IncomingTransferType $transferType;

    /**
     * Return transfers for this account.
     * When omitted the default value is 0
     */
    #[Json('account_index', omit_empty: true)]
    public ?int $accountIndex;

    /**
     * @var ?int[] Return transfers sent to these subaddresses.
     */
    #[Json('subaddr_indices', omit_empty: true)]
    public ?array $subaddrIndices;

    /**
     * @param ?int[] $subaddrIndices
     */
    public static function create(
        IncomingTransferType $transferType,
        ?int                 $accountIndex = null,
        ?array               $subaddrIndices = null,
    ): RpcRequest {
        $self = new self();
        $self->transferType = $transferType;
        $self->accountIndex = $accountIndex;
        $self->subaddrIndices = $subaddrIndices;
        return new RpcRequest('incoming_transfers', $self);
    }
}
