<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Prepare a wallet for multisig by generating a multisig string to share with peers.
 */
class PrepareMultisigRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('prepare_multisig');
    }
}
