<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Enum;

enum UpdateCommand: string
{
    case CHECK = 'check';
    case DOWNLOAD = 'download';
}
