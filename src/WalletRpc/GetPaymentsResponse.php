<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\Payment;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Get a list of incoming payments using a given payment id.<p style="color:red;"><b>WARNING</b> Verify that the payment has a sane <code>unlock_time</code> otherwise the funds might be inaccessible</p>
 */
class GetPaymentsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /** @var Payment[] */
    #[Json(type: Payment::class)]
    public array $payments = [];
}
