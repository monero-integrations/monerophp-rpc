<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\DaemonOther;

use MoneroIntegrations\MoneroRpc\Enum\UpdateCommand;
use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;
use Square\Pjson\Json;
use MoneroIntegrations\MoneroRpc\Trait\JsonSerializeBigInt;

/**
 * Update daemon.
 */
class UpdateRequest extends OtherRpcRequest
{
    use JsonSerializeBigInt;

    /**
     * command to use, either `check` or `download`
     */
    #[Json]
    public UpdateCommand $command;

    /**
     * Optional, path where to download the update.
     */
    #[Json(omit_empty: true)]
    public ?string $path;

    public static function create(UpdateCommand $command, ?string $path = null): OtherRpcRequest
    {
        $self = new self();
        $self->command = $command;
        $self->path = $path;
        return $self;
    }
}
