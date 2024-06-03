<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Turn this wallet into a multisig wallet, extra step for N-1/N wallets.
 */
class FinalizeMultisigResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
