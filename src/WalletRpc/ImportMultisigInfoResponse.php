<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Import multisig info from other participants.
 */
class ImportMultisigInfoResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Number of outputs signed with those multisig info.
     */
    #[Json('n_outputs')]
    public int $nOutputs;
}
