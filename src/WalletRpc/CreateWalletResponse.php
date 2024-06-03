<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Create a new wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.
 */
class CreateWalletResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
