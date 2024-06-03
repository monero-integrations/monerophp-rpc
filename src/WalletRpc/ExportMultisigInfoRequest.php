<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Request\RpcRequest;

/**
 * Export multisig info for other participants.
 */
class ExportMultisigInfoRequest
{
    public static function create(): RpcRequest
    {
        return new RpcRequest('export_multisig_info');
    }
}
