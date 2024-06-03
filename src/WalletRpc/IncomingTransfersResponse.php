<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\IncomingTransfer;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Return a list of incoming transfers to the wallet.
 */
class IncomingTransfersResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var IncomingTransfer[] */
    #[Json(type: IncomingTransfer::class)]
    public array $transfers = [];
}
