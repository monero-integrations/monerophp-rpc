<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc\Enum;

use MoneroIntegrations\MoneroRpc\Exception\AccountIndexOutOfBoundException;
use MoneroIntegrations\MoneroRpc\Exception\AddressIndexOutOfBoundException;
use MoneroIntegrations\MoneroRpc\Exception\AddressNotInWalletException;
use MoneroIntegrations\MoneroRpc\Exception\AttributeNotFoundException;
use MoneroIntegrations\MoneroRpc\Exception\AuthenticationException;
use MoneroIntegrations\MoneroRpc\Exception\BlockNotAcceptedException;
use MoneroIntegrations\MoneroRpc\Exception\HttpApiException;
use MoneroIntegrations\MoneroRpc\Exception\IndexOutOfRangeException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidAddressException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidBlockHashException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidBlockHeightException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidBlockHeightRangeException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidBlockTemplateBlobException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidDestinationException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidLanguageException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidOriginalPasswordException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidPaymentIdException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidReservedSizeException;
use MoneroIntegrations\MoneroRpc\Exception\MoneroRpcException;
use MoneroIntegrations\MoneroRpc\Exception\NoWalletFileException;
use MoneroIntegrations\MoneroRpc\Exception\OpenWalletException;
use MoneroIntegrations\MoneroRpc\Exception\TagNotFoundException;
use MoneroIntegrations\MoneroRpc\Exception\WalletExistsException;

enum ErrorCode: string
{
    case AccountIndexOutOfBound = 'Account index out of bound';
    case AddressIndexOutOfBound = 'address index is out of bound';
    case AddressNotInWallet = "Address doesn't belong to the wallet";
    case InvalidBlockHeight = "Invalid block height supplied";
    case InvalidReservedSize = "Too big reserved size, maximum 255";
    case InvalidAddress = "Failed to parse wallet address";
    case InvalidBlockHash = "Invalid block hash";
    case InvalidBlockHeightRange = "Invalid start/end heights.";
    case InvalidBlockTemplateBlob = "Wrong block blob";
    case BlockNotAccepted = "Block not accepted";

    case AuthenticationFailure = "Authentication failed";
    case WalletAlreadyExists = "Cannot create wallet. Already exists.";
    case InvalidLanguage = "Unknown language supplied";
    case NoWalletFile = "No wallet file";
    case OpenWalletFailure = "Failed to open wallet";
    case AttributeNotFound = "Attribute not found.";
    case TagUnregisteredError = "Tag is unregistered.";
    case IndexOutOfRangeError = "Index out of range";
    case InvalidPaymentId = "Invalid payment ID";
    case InvalidOriginalPassword = "Invalid original password.";
    case TransactionHasNoDestination = "Transaction has no destination";

    public static function getErrorCodeFromString(string $error): self
    {
        // First try to just find an exact match for the error message
        $errorCode = self::tryFrom($error);

        if ($errorCode !== null) {
            return $errorCode;
        }

        $errorMessages = [
            // Internal error: can't get block by hash. Hash = 0000000000000000000000000000000000000000000000000000000000000000.
            "Internal error: can't get block by hash. Hash =" =>  self::InvalidBlockHash,
            // Requested block height: 10 greater than current top block height: 0
            'greater than current top block height' => self::InvalidBlockHeight,
            // Tag invalidTag is unregistered
            ' is unregistered' => self::TagUnregisteredError,
            // Index out of range: 6
            'Index out of range' => self::IndexOutOfRangeError,
            '401 Unauthorized' => self::AuthenticationFailure,
            'Unknown language:' => self::InvalidLanguage,
            'account index is out of bound' => self::AccountIndexOutOfBound,
            'Invalid address' => self::InvalidAddress,
            'WALLET_RPC_ERROR_CODE_WRONG_ADDRESS' => self::InvalidAddress,
        ];

        // If an exact match was not found try to find a partial match
        $errorCode = current(array_filter(
            $errorMessages,
            static fn (string $errorMessage) => str_contains($error, $errorMessage),
            ARRAY_FILTER_USE_KEY
        ));

        if ($errorCode === false) {
            throw new HttpApiException($error);
        }

        return $errorCode;
    }

    public function toException(int|string ...$placeHolders): MoneroRpcException
    {
        $message = $this->value;

        if ($placeHolders !== []) {
            $message = sprintf($message, ...$placeHolders);
        }

        $exception = match ($this) {
            self::AccountIndexOutOfBound => new AccountIndexOutOfBoundException($message),
            self::AddressIndexOutOfBound => new AddressIndexOutOfBoundException($message),
            self::AddressNotInWallet => new AddressNotInWalletException($message),
            self::InvalidBlockHeight => new InvalidBlockHeightException($message),
            self::InvalidReservedSize => new InvalidReservedSizeException($message),
            self::InvalidAddress => new InvalidAddressException($message),
            self::InvalidBlockHash => new InvalidBlockHashException($message),
            self::InvalidBlockHeightRange => new InvalidBlockHeightRangeException($message),
            self::InvalidBlockTemplateBlob => new InvalidBlockTemplateBlobException($message),
            self::BlockNotAccepted => new BlockNotAcceptedException($message),
            self::AuthenticationFailure => new AuthenticationException($message),
            self::WalletAlreadyExists => new WalletExistsException($message),
            self::InvalidLanguage => new InvalidLanguageException($message),
            self::NoWalletFile => new NoWalletFileException($message),
            self::OpenWalletFailure => new OpenWalletException($message),
            self::AttributeNotFound => new AttributeNotFoundException($message),
            self::TagUnregisteredError => new TagNotFoundException($message),
            self::IndexOutOfRangeError => new IndexOutOfRangeException($message),
            self::InvalidPaymentId => new InvalidPaymentIdException($message),
            self::InvalidOriginalPassword => new InvalidOriginalPasswordException($message),
            self::TransactionHasNoDestination => new InvalidDestinationException($message),
        };

        return $exception;
    }
}
