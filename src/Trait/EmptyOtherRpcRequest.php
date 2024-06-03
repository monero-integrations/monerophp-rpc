<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Trait;

use MoneroIntegrations\MoneroRpc\Request\OtherRpcRequest;

trait EmptyOtherRpcRequest
{
    public static function create(): OtherRpcRequest
    {
        return new self();
    }

    public function toJson(int $flags = 0, int $depth = 512): string
    {
        return "";
    }
}
