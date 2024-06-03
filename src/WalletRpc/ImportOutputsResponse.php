<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\WalletRpc;

use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\JsonDataSerializable;

/**
 * Import outputs in hex format.
 */
class ImportOutputsResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * number of outputs imported.
     */
    #[Json('num_imported')]
    public int $numImported;
}
