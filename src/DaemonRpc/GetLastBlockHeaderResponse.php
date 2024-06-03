<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\DaemonRpc\Model\BlockHeader;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Block header information for the most recent block is easily retrieved with this method. No inputs are needed.
 */
class GetLastBlockHeaderResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonRpcAccessResponseFields;

    /**
     * A structure containing block header information.
     */
    #[Json('block_header')]
    public BlockHeader $blockHeader;
}
