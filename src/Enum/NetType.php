<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Enum;

enum NetType: string
{
    case MAINNET = 'mainnet';
    case TESTNET = 'testnet';
    case STAGENET = 'stagenet';
    case REGTEST = 'fakechain';
}
