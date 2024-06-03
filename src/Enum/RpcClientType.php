<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Enum;

enum RpcClientType
{
    case WALLET;
    case DAEMON;
}
