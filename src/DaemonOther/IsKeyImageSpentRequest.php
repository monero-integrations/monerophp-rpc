<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;

/**
 * Check if outputs have been spent using the key image associated with the output.
 */
class IsKeyImageSpentRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * @var string[] List of key image hex strings to check.
     */
    #[Json('key_images')]
    public array $keyImages;

    /**
     * @param string[] $keyImages
     */
    public static function create(array $keyImages): OtherRpcRequest
    {
        $self = new self();
        $self->keyImages = $keyImages;
        return $self;
    }
}
