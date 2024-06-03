<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Open a wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.
 */
class OpenWalletResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
