<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Enum;

enum ResponseStatus: string
{
    case OK = 'OK';
    case BUSY = 'BUSY';
    case FAILED = 'Failed';
    case NOT_MINING = 'NOT MINING';
    case PAYMENT_REQUIRED = 'PAYMENT REQUIRED';
}
