<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Enum;

enum SpentStatus: int
{
    case UNSPENT = 0;
    case SPENT_IN_CHAIN = 1;
    case SPENT_IN_POOL = 2;
}
