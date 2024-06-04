<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\ParameterInterface;
use MoneroIntegrations\MoneroRpc\Request\RpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Turn this wallet into a multisig wallet, extra step for N-1/N wallets.
 */
class FinalizeMultisigRequest implements ParameterInterface, JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * @var string[] List of multisig string from peers.
     */
    #[Json('multisig_info')]
    public array $multisigInfo;

    /**
     * Wallet password
     */
    #[Json(omit_empty: true)]
    public ?string $password;

    /**
     * @param string[] $multisigInfo
     */
    public static function create(array $multisigInfo, ?string $password = null): RpcRequest
    {
        $self = new self();
        $self->multisigInfo = $multisigInfo;
        $self->password = $password;
        return new RpcRequest('finalize_multisig', $self);
    }
}
