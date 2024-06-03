<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Change a wallet password.
 */
class ChangeWalletPasswordResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
}
