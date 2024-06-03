<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc\Model;

use MoneroIntegrations\MoneroRpc\Model\Amount;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class Histogram implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Output amount in piconero
     */
    #[Json]
    public Amount $amount;

    #[Json('total_instances')]
    public int $totalInstances;

    #[Json('unlocked_instances')]
    public int $unlockedInstances;

    #[Json('recent_instances')]
    public int $recentInstances;

    public function __construct(Amount $amount, int $totalInstances, int $unlockedInstances, int $recentInstances)
    {
        $this->amount = $amount;
        $this->totalInstances = $totalInstances;
        $this->unlockedInstances = $unlockedInstances;
        $this->recentInstances = $recentInstances;
    }
}
