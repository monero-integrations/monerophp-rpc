<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc\Model;

use MoneroIntegrations\MoneroRpc\Model\Address;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class TxSetSummary implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    #[Json('amount_in')]
    public int $amountIn;

    #[Json('amount_out')]
    public int $amountOut;

    /**
     * @var Destination[]
     */
    #[Json(type: Destination::class)]
    public array $recipients = [];

    #[Json('change_amount')]
    public int $changeAmount;

    #[Json('change_address')]
    public Address $changeAddress;

    #[Json]
    public int $fee;
}
