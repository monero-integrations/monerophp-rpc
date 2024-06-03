<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Tests\unit\JsonSerializeBigInt\Classes;

use MoneroIntegrations\MoneroRpc\Model\Amount;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;

class ClassWithBigInt
{
    use JsonSerializeBigInt;

    /** @var Amount[] */
    #[Json(type: Amount::class)]
    public array $amountList = [];

    /** @var Amount[] */
    #[Json('blabla', type: Amount::class)]
    public array $amountList2 = [];

    #[Json]
    public Amount $amount;

    #[Json('amount_custom_name')]
    public Amount $amountCustomName;
}
