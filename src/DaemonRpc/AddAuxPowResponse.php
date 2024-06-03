<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonRpc;

use MoneroIntegrations\MoneroRpc\DaemonRpc\Model\AuxPow;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

/**
 * Easily enable merge mining with Monero without requiring software that manually alters the extra field in the coinbase tx to include the merkle root of the aux blocks.
 */
class AddAuxPowResponse implements JsonDataSerializable
{
    use JsonSerializeBigInt;
    use DaemonStandardResponseFields;

    #[Json('blocktemplate_blob')]
    public string $blocktemplateBlob;

    #[Json('blockhashing_blob')]
    public string $blockhashingBlob;

    #[Json('merkle_root')]
    public string $merkleRoot;

    #[Json('merkle_tree_depth')]
    public int $merkleTreeDepth;

    /** @var AuxPow[] */
    #[Json('aux_pow', type: AuxPow::class)]
    public array $auxPow = [];
}
