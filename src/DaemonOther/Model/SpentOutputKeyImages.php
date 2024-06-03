<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther\Model;

use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;
use Square\Pjson\Json;
use Square\Pjson\JsonDataSerializable;

class SpentOutputKeyImages implements JsonDataSerializable
{
    use JsonSerializeBigInt;

    /**
     * Key image.
     */
    #[Json('id_hash')]
    public string $idHash;

    /**
     * @var string[] tx hashes of the txes (usually one) spending that key image.
     */
    #[Json('txs_hashes')]
    public array $txsHashes;

    /**
     * @param string[] $txsHashes
     */
    public function __construct(string $idHash, array $txsHashes)
    {
        $this->idHash = $idHash;
        $this->txsHashes = $txsHashes;
    }
}
