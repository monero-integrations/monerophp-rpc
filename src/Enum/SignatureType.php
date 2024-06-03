<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Enum;

enum SignatureType: string
{
    case SPEND = 'spend';
    case VIEW = 'view';
}
