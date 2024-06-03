<?php

declare(strict_types=1);

namespace MoneroIntegrations\MoneroRpc;

use MoneroIntegrations\MoneroRpc\Enum\TransferPriority;
use MoneroIntegrations\MoneroRpc\Exception\AccountIndexOutOfBoundException;
use MoneroIntegrations\MoneroRpc\Exception\AddressIndexOutOfBoundException;
use MoneroIntegrations\MoneroRpc\Exception\AttributeNotFoundException;
use MoneroIntegrations\MoneroRpc\Exception\IndexOutOfRangeException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidAddressException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidDestinationException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidLanguageException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidOriginalPasswordException;
use MoneroIntegrations\MoneroRpc\Exception\InvalidPaymentIdException;
use MoneroIntegrations\MoneroRpc\Exception\MoneroRpcException;
use MoneroIntegrations\MoneroRpc\Exception\NoWalletFileException;
use MoneroIntegrations\MoneroRpc\Exception\OpenWalletException;
use MoneroIntegrations\MoneroRpc\Exception\TagNotFoundException;
use MoneroIntegrations\MoneroRpc\Exception\WalletExistsException;
use MoneroIntegrations\MoneroRpc\Model\Address;
use MoneroIntegrations\MoneroRpc\Model\Amount;
use MoneroIntegrations\MoneroRpc\WalletRpc\AddAddressBookRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\AddAddressBookResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\AutoRefreshRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\AutoRefreshResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ChangeWalletPasswordRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ChangeWalletPasswordResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\CheckReserveProofRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\CheckReserveProofResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\CheckSpendProofRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\CheckSpendProofResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\CheckTxKeyRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\CheckTxKeyResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\CheckTxProofRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\CheckTxProofResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\CloseWalletRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\CloseWalletResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\CreateAccountRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\CreateAccountResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\CreateAddressRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\CreateAddressResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\CreateWalletRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\CreateWalletResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\DeleteAddressBookRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\DeleteAddressBookResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\DescribeTransferRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\DescribeTransferResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\EditAddressBookRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\EditAddressBookResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\EstimateTxSizeAndWeightRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\EstimateTxSizeAndWeightResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ExchangeMultisigKeysRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ExchangeMultisigKeysResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ExportKeyImagesRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ExportKeyImagesResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ExportMultisigInfoRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ExportMultisigInfoResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ExportOutputsRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ExportOutputsResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\FinalizeMultisigRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\FinalizeMultisigResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\FreezeRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\FreezeResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\FrozenRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\FrozenResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GenerateFromKeysRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GenerateFromKeysResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAccountsRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAccountsResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAccountTagsRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAccountTagsResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAddressBookRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAddressBookResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAddressIndexRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAddressIndexResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAddressRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAddressResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAttributeRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetAttributeResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetBalanceRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetBalanceResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetBulkPaymentsRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetBulkPaymentsResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetHeightRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetHeightResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetLanguagesRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetLanguagesResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetPaymentsRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetPaymentsResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetReserveProofRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetReserveProofResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetSpendProofRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetSpendProofResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTransferByTxidRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTransferByTxidResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTransfersRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTransfersResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTxKeyRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTxKeyResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTxNotesRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTxNotesResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTxProofRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetTxProofResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetVersionRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\GetVersionResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ImportKeyImagesRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ImportKeyImagesResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ImportMultisigInfoRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ImportMultisigInfoResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ImportOutputsRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ImportOutputsResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\IncomingTransfersRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\IncomingTransfersResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\IsMultisigRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\IsMultisigResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\LabelAccountRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\LabelAccountResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\LabelAddressRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\LabelAddressResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\MakeIntegratedAddressRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\MakeIntegratedAddressResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\MakeMultisigRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\MakeMultisigResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\MakeUriRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\MakeUriResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\Destination;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\IncomingTransferType;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\QueryKeyType;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\SignedKeyImage;
use MoneroIntegrations\MoneroRpc\WalletRpc\Model\SubAddressIndex;
use MoneroIntegrations\MoneroRpc\WalletRpc\OpenWalletRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\OpenWalletResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ParseUriRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ParseUriResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\PrepareMultisigRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\PrepareMultisigResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\QueryKeyRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\QueryKeyResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\RefreshRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\RefreshResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\RelayTxRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\RelayTxResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\RescanBlockchainRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\RescanBlockchainResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\RescanSpentRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\RescanSpentResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\RestoreDeterministicWalletRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\RestoreDeterministicWalletResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SetAccountTagDescriptionRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SetAccountTagDescriptionResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SetAttributeRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SetAttributeResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SetDaemonRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SetDaemonResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SetTxNotesRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SetTxNotesResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SignMultisigRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SignMultisigResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SignRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SignResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SignTransferRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SignTransferResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SplitIntegratedAddressRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SplitIntegratedAddressResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\StartMiningRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\StartMiningResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\StopMiningRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\StopMiningResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\StopWalletRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\StopWalletResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\StoreRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\StoreResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SubmitMultisigRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SubmitMultisigResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SubmitTransferRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SubmitTransferResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SweepAllRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SweepAllResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SweepDustRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SweepDustResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\SweepSingleRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\SweepSingleResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\TagAccountsRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\TagAccountsResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ThawRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ThawResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\TransferRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\TransferResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\TransferSplitRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\TransferSplitResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\UntagAccountsRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\UntagAccountsResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\ValidateAddressRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\ValidateAddressResponse;
use MoneroIntegrations\MoneroRpc\WalletRpc\VerifyRequest;
use MoneroIntegrations\MoneroRpc\WalletRpc\VerifyResponse;

class WalletRpcClient extends JsonRpcClient
{
    /**
     * Connect the RPC server to a Monero daemon.
     *
     * @param ?string $address Defaults to "") The URL of the daemon to connect to.
     * @param bool $trusted If false, some RPC wallet methods will be disabled.
     * @param ?string $sslSupport Defaults to autodetect; Accepts: disabled, enabled, autodetect) Specifies whether the Daemon uses SSL encryption.
     * @param ?string $sslPrivateKeyPath The file path location of the SSL key.
     * @param ?string $sslCertificatePath The file path location of the SSL certificate.
     * @param ?string $sslCaFile The file path location of the certificate authority file.
     * @param ?string[] $sslAllowedFingerprints The SHA1 fingerprints accepted by the SSL certificate.
     * @param bool $sslAllowAnyCert If false, the certificate must be signed by a trusted certificate authority.
     * @param ?string $username
     * @param ?string $password
     * @throws MoneroRpcException
     */
    public function setDaemon(
        ?string $address = '',
        ?bool $trusted = false,
        ?string $sslSupport = 'autodetect',
        ?string $sslPrivateKeyPath = null,
        ?string $sslCertificatePath = null,
        ?string $sslCaFile = null,
        ?array $sslAllowedFingerprints = null,
        ?bool $sslAllowAnyCert = false,
        ?string $username = null,
        ?string $password = null,
    ): SetDaemonResponse {
        return $this->handleRequest(SetDaemonRequest::create($address, $trusted, $sslSupport, $sslPrivateKeyPath, $sslCertificatePath, $sslCaFile, $sslAllowedFingerprints, $sslAllowAnyCert, $username, $password), SetDaemonResponse::class);
    }


    /**
     * Return the wallet's balance.
     *
     * @param int $accountIndex Return balance for this account.
     * @param ?int[] $addressIndices Return balance detail for those subaddresses.
     * @param bool $allAccounts (
     * @param bool $strict ( all changes go to 0-th subaddress (in the current subaddress account)
     * @throws MoneroRpcException
     */
    public function getBalance(
        int $accountIndex = 0,
        ?array $addressIndices = null,
        ?bool $allAccounts = false,
        ?bool $strict = false,
    ): GetBalanceResponse {
        return $this->handleRequest(GetBalanceRequest::create($accountIndex, $addressIndices, $allAccounts, $strict), GetBalanceResponse::class);
    }


    /**
     * Return the wallet's addresses for an account. Optionally filter for specific set of subaddresses.
     *
     * @param int $accountIndex Return subaddresses for this account.
     * @param ?int[] $addressIndex List of subaddresses to return from an account.
     * @throws MoneroRpcException
     * @throws NoWalletFileException
     * @throws AccountIndexOutOfBoundException
     * @throws AddressIndexOutOfBoundException
     */
    public function getAddress(int $accountIndex = 0, ?array $addressIndex = null): GetAddressResponse
    {
        return $this->handleRequest(GetAddressRequest::create($accountIndex, $addressIndex), GetAddressResponse::class);
    }


    /**
     * Get account and address indexes from a specific (sub)address
     *
     * @param Address $address (sub)address to look for.
     * @throws MoneroRpcException
     */
    public function getAddressIndex(Address $address): GetAddressIndexResponse
    {
        return $this->handleRequest(GetAddressIndexRequest::create($address), GetAddressIndexResponse::class);
    }


    /**
     * Create a new address for an account. Optionally, label the new address.
     *
     * @param int $accountIndex Create a new address for this account.
     * @param ?string $label Label for the new address.
     * @param ?int $count Number of addresses to create (Defaults to 1).
     * @throws MoneroRpcException
     * @throws AccountIndexOutOfBoundException
     */
    public function createAddress(int $accountIndex = 0, ?string $label = null, ?int $count = 1): CreateAddressResponse
    {
        return $this->handleRequest(CreateAddressRequest::create($accountIndex, $label, $count), CreateAddressResponse::class);
    }


    /**
     * Label an address.
     *
     * @param SubAddressIndex $index JSON Object containing the major & minor address index:
     * @param string $label Label for the address.
     * @throws MoneroRpcException
     */
    public function labelAddress(SubAddressIndex $index, string $label): LabelAddressResponse
    {
        return $this->handleRequest(LabelAddressRequest::create($index, $label), LabelAddressResponse::class);
    }


    /**
     * Analyzes a string to determine whether it is a valid monero wallet address and returns the result and the address specifications.
     *
     * @param Address|string $address The address to validate.
     * @param bool $anyNetType If true, consider addresses belonging to any of the three Monero networks (mainnet, stagenet, and testnet) valid. Otherwise, only consider an address valid if it belongs to the network on which the rpc-wallet's current daemon is running (.
     * @param bool $allowOpenalias If true, consider OpenAlias-formatted addresses valid
     * @throws MoneroRpcException
     */
    public function validateAddress(
        Address|string $address,
        ?bool $anyNetType = false,
        ?bool $allowOpenalias = false,
    ): ValidateAddressResponse {
        return $this->handleRequest(ValidateAddressRequest::create($address, $anyNetType, $allowOpenalias), ValidateAddressResponse::class);
    }


    /**
     * Get all accounts for a wallet. Optionally filter accounts by tag.
     *
     * @param ?string $tag Tag for filtering accounts.
     * @param bool $regex allow regular expression filters if set to true
     * @param bool $strictBalances when `true`, balance only considers the blockchain, when `false` it considers both the blockchain and some recent actions, such as a recently created transaction which spent some outputs, which isn't yet mined.
     * @throws MoneroRpcException
     */
    public function getAccounts(
        ?string $tag = null,
        ?bool $regex = false,
        ?bool $strictBalances = null,
    ): GetAccountsResponse {
        return $this->handleRequest(GetAccountsRequest::create($tag, $regex, $strictBalances), GetAccountsResponse::class);
    }


    /**
     * Create a new account with an optional label.
     *
     * @param ?string $label Label for the account.
     * @throws MoneroRpcException
     */
    public function createAccount(?string $label = null): CreateAccountResponse
    {
        return $this->handleRequest(CreateAccountRequest::create($label), CreateAccountResponse::class);
    }


    /**
     * Label an account.
     *
     * @param int $accountIndex Apply label to account at this index.
     * @param string $label Label for the account.
     * @throws MoneroRpcException
     * @throws AccountIndexOutOfBoundException
     */
    public function labelAccount(int $accountIndex, string $label): LabelAccountResponse
    {
        return $this->handleRequest(LabelAccountRequest::create($accountIndex, $label), LabelAccountResponse::class);
    }


    /**
     * Get a list of user-defined account tags.
     *
     * @throws MoneroRpcException
     */
    public function getAccountTags(): GetAccountTagsResponse
    {
        return $this->handleRequest(GetAccountTagsRequest::create(), GetAccountTagsResponse::class);
    }


    /**
     * Apply a filtering tag to a list of accounts.
     *
     * @param string $tag Tag for the accounts.
     * @param int[]|int $accounts Tag this list of accounts.
     * @throws MoneroRpcException
     * @throws AccountIndexOutOfBoundException
     * @throws TagNotFoundException
     */
    public function tagAccounts(string $tag, array|int $accounts): TagAccountsResponse
    {
        if (is_int($accounts)) {
            $accounts = [$accounts];
        }

        return $this->handleRequest(TagAccountsRequest::create($tag, $accounts), TagAccountsResponse::class);
    }


    /**
     * Remove filtering tag from a list of accounts.
     *
     * @param int[]|int $accounts Remove tag from this account or list of accounts.
     * @throws MoneroRpcException
     */
    public function untagAccounts(array|int $accounts): UntagAccountsResponse
    {
        if (is_int($accounts)) {
            $accounts = [$accounts];
        }
        return $this->handleRequest(UntagAccountsRequest::create($accounts), UntagAccountsResponse::class);
    }


    /**
     * Set description for an account tag.
     *
     * @param string $tag Set a description for this tag.
     * @param string $description Description for the tag.
     * @throws MoneroRpcException
     */
    public function setAccountTagDescription(string $tag, string $description): SetAccountTagDescriptionResponse
    {
        return $this->handleRequest(SetAccountTagDescriptionRequest::create($tag, $description), SetAccountTagDescriptionResponse::class);
    }


    /**
     * Returns the wallet's current block height.
     *
     * @throws MoneroRpcException
     */
    public function getHeight(): GetHeightResponse
    {
        return $this->handleRequest(GetHeightRequest::create(), GetHeightResponse::class);
    }


    /**
     * Send monero to a number of recipients.
     *
     * @param Destination[]|Destination $destinations Recipient OR a list of Recipients to receive XMR
     * @param ?int $accountIndex Transfer from this account index.
     * @param ?int[] $subaddrIndices Transfer from this set of subaddresses. (Defaults to empty - all indices)
     * @param ?TransferPriority $priority Set a priority for the transaction.
     * @param ?int $mixin Number of outputs from the blockchain to mix with (0 means no mixing).
     * @param ?int $ringSize Number of outputs to mix in the transaction (this output + N decoys from the blockchain). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     * @param ?int $unlockTime Number of blocks before the monero can be spent (0 to not add a lock).
     * @param bool $getTxKey Return the transaction key after sending.
     * @param bool $doNotRelay If true, the newly created transaction will not be relayed to the monero network.
     * @param bool $getTxHex Return the transaction as hex string after sending
     * @param bool $getTxMetadata Return the metadata needed to relay the transaction.
     * @throws MoneroRpcException
     * @throws InvalidDestinationException
     * @throws InvalidAddressException
     */
    public function transfer(
        array|Destination $destinations,
        ?int              $accountIndex = 0,
        ?array            $subaddrIndices = [],
        ?TransferPriority $priority = null,
        ?int              $mixin = null,
        ?int              $ringSize = 16,
        ?int              $unlockTime = null,
        ?bool             $getTxKey = null,
        ?bool             $doNotRelay = false,
        ?bool             $getTxHex = false,
        ?bool             $getTxMetadata = false,
    ): TransferResponse {
        if ($destinations instanceof Destination) {
            $destinations = [$destinations];
        }
        return $this->handleRequest(TransferRequest::create($destinations, $accountIndex, $subaddrIndices, $priority, $mixin, $ringSize, $unlockTime, $getTxKey, $doNotRelay, $getTxHex, $getTxMetadata), TransferResponse::class);
    }


    /**
     * Same as transfer, but can split into more than one tx if necessary.
     *
     * @param Destination[] $destinations array of destinations to receive XMR:
     * @param ?int $accountIndex Transfer from this account index.
     * @param ?int[] $subaddrIndices Transfer from this set of subaddresses. (Defaults to empty - all indices)
     * @param ?int $ringSize Sets ringsize to n (mixin + 1). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     * @param ?int $unlockTime Number of blocks before the monero can be spent (0 to not add a lock).
     * @param ?string $paymentId defaults to a random ID) 16 characters hex encoded.
     * @param bool $getTxKeys Return the transaction keys after sending.
     * @param ?TransferPriority $priority Set a priority for the transactions.
     * @param bool $doNotRelay If true, the newly created transaction will not be relayed to the monero network. (
     * @param bool $getTxHex Return the transactions as hex string after sending
     * @param bool $getTxMetadata Return list of transaction metadata needed to relay the transfer later.
     * @throws MoneroRpcException
     */
    public function transferSplit(
        array $destinations,
        ?int $accountIndex = 0,
        ?array $subaddrIndices = [],
        ?int $ringSize = null,
        ?int $unlockTime = null,
        ?string $paymentId = null,
        ?bool $getTxKeys = null,
        ?TransferPriority $priority = null,
        ?bool $doNotRelay = false,
        ?bool $getTxHex = null,
        ?bool $getTxMetadata = null,
    ): TransferSplitResponse {
        return $this->handleRequest(TransferSplitRequest::create($destinations, $accountIndex, $subaddrIndices, $ringSize, $unlockTime, $paymentId, $getTxKeys, $priority, $doNotRelay, $getTxHex, $getTxMetadata), TransferSplitResponse::class);
    }


    /**
     * Sign a transaction created on a read-only wallet (in cold-signing process)
     *
     * @param string $unsignedTxset string. Set of unsigned tx returned by "transfer" or "transfer_split" methods.
     * @param bool $exportRaw If true, return the raw transaction data. (
     * @param bool $getTxKeys Return the transaction keys after signing.
     * @throws MoneroRpcException
     */
    public function signTransfer(
        string $unsignedTxset,
        ?bool $exportRaw = false,
        ?bool $getTxKeys = null,
    ): SignTransferResponse {
        return $this->handleRequest(SignTransferRequest::create($unsignedTxset, $exportRaw, $getTxKeys), SignTransferResponse::class);
    }


    /**
     * Submit a previously signed transaction on a read-only wallet (in cold-signing process).
     *
     * @param string $txDataHex Set of signed tx returned by "sign_transfer"
     * @see self::signTransfer()
     * @throws MoneroRpcException
     */
    public function submitTransfer(string $txDataHex): SubmitTransferResponse
    {
        return $this->handleRequest(SubmitTransferRequest::create($txDataHex), SubmitTransferResponse::class);
    }


    /**
     * Send all dust outputs back to the wallet's, to make them easier to spend (and mix).
     *
     * @param bool $getTxKeys Return the transaction keys after sending.
     * @param bool $doNotRelay If true, the newly created transaction will not be relayed to the monero network. (
     * @param bool $getTxHex Return the transactions as hex string after sending. (
     * @param bool $getTxMetadata Return list of transaction metadata needed to relay the transfer later. (
     * @throws MoneroRpcException
     */
    public function sweepDust(
        ?bool $getTxKeys = null,
        ?bool $doNotRelay = false,
        ?bool $getTxHex = false,
        ?bool $getTxMetadata = false,
    ): SweepDustResponse {
        return $this->handleRequest(SweepDustRequest::create($getTxKeys, $doNotRelay, $getTxHex, $getTxMetadata), SweepDustResponse::class);
    }


    /**
     * Send all unlocked balance to an address.
     *
     * @param Address $address Destination public address.
     * @param ?int $accountIndex Sweep transactions from this account.
     * @param ?int[] $subaddrIndices Sweep from this set of subaddresses in the account.
     * @param bool $subaddrIndicesAll use outputs in all subaddresses within an account (.
     * @param ?int $priority Priority for sending the sweep transfer, partially determines fee.
     * @param ?int $outputs specify the number of separate outputs of smaller denomination that will be created by sweep operation.
     * @param ?int $ringSize Sets ringsize to n (mixin + 1). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     * @param ?int $unlockTime Number of blocks before the monero can be spent (0 to not add a lock).
     * @param ?string $paymentId defaults to a random ID) 16 characters hex encoded.
     * @param bool $getTxKeys Return the transaction keys after sending.
     * @param ?int $belowAmount Include outputs below this amount.
     * @param bool $doNotRelay If true, do not relay this sweep transfer. (
     * @param bool $getTxHex return the transactions as hex encoded string. (
     * @param bool $getTxMetadata return the transaction metadata as a string. (
     * @throws MoneroRpcException
     */
    public function sweepAll(
        Address $address,
        ?int $accountIndex = null,
        ?array $subaddrIndices = null,
        ?bool $subaddrIndicesAll = false,
        TransferPriority|int|null $priority = null,
        ?int $outputs = null,
        ?int $ringSize = null,
        ?int $unlockTime = null,
        ?string $paymentId = null,
        ?bool $getTxKeys = null,
        ?int $belowAmount = null,
        ?bool $doNotRelay = false,
        ?bool $getTxHex = false,
        ?bool $getTxMetadata = false,
    ): SweepAllResponse {
        return $this->handleRequest(SweepAllRequest::create($address, $accountIndex, $subaddrIndices, $subaddrIndicesAll, $priority, $outputs, $ringSize, $unlockTime, $paymentId, $getTxKeys, $belowAmount, $doNotRelay, $getTxHex, $getTxMetadata), SweepAllResponse::class);
    }


    /**
     * Send all of a specific unlocked output to an address.
     *
     * @param Address $address Destination public address.
     * @param string $keyImage Key image of specific output to sweep.
     * @param ?int $priority Priority for sending the sweep transfer, partially determines fee.
     * @param ?int $outputs specify the number of separate outputs of smaller denomination that will be created by sweep operation.
     * @param ?int $ringSize Sets ringsize to n (mixin + 1). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     * @param ?int $unlockTime Number of blocks before the monero can be spent (0 to not add a lock).
     * @param ?string $paymentId defaults to a random ID) 16 characters hex encoded.
     * @param bool $getTxKey Return the transaction keys after sending.
     * @param bool $doNotRelay If true, do not relay this sweep transfer. (
     * @param bool $getTxHex return the transactions as hex encoded string. (
     * @param bool $getTxMetadata return the transaction metadata as a string. (
     * @throws MoneroRpcException
     */
    public function sweepSingle(
        Address $address,
        string $keyImage,
        TransferPriority|int|null $priority = null,
        ?int $outputs = null,
        ?int $ringSize = null,
        ?int $unlockTime = null,
        ?string $paymentId = null,
        ?bool $getTxKey = null,
        ?bool $doNotRelay = false,
        ?bool $getTxHex = false,
        ?bool $getTxMetadata = false,
    ): SweepSingleResponse {
        return $this->handleRequest(SweepSingleRequest::create($address, $keyImage, $priority, $outputs, $ringSize, $unlockTime, $paymentId, $getTxKey, $doNotRelay, $getTxHex, $getTxMetadata), SweepSingleResponse::class);
    }


    /**
     * Relay a transaction previously created with `"do_not_relay":true`.
     *
     * @param string $hex transaction metadata returned from a `transfer` method with `get_tx_metadata` set to `true`.
     * @throws MoneroRpcException
     */
    public function relayTx(string $hex): RelayTxResponse
    {
        return $this->handleRequest(RelayTxRequest::create($hex), RelayTxResponse::class);
    }


    /**
     * Save the wallet file.
     *
     * @throws MoneroRpcException
     */
    public function store(): StoreResponse
    {
        return $this->handleRequest(StoreRequest::create(), StoreResponse::class);
    }


    /**
     * Get a list of incoming payments using a given payment id.
     * WARNING: Verify that the payment has a sane `unlock_time` otherwise the funds might be inaccessible
     *
     * @param string $paymentId Payment ID used to find the payments (16 characters hex).
     * @throws MoneroRpcException
     */
    public function getPayments(string $paymentId): GetPaymentsResponse
    {
        return $this->handleRequest(GetPaymentsRequest::create($paymentId), GetPaymentsResponse::class);
    }


    /**
     * Get a list of incoming payments using a given payment id, or a list of payments ids, from a given height. This method is the preferred method over `get_payments` because it has the same functionality but is more extendable. Either is fine for looking up transactions by a single payment ID.<p style="color:red;"><b>WARNING</b> Verify that the payment has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
     *
     * @param string[] $paymentIds Payment IDs used to find the payments (16 characters hex).
     * @param int $minBlockHeight The block height at which to start looking for payments.
     * @throws MoneroRpcException
     */
    public function getBulkPayments(array $paymentIds, int $minBlockHeight): GetBulkPaymentsResponse
    {
        return $this->handleRequest(GetBulkPaymentsRequest::create($paymentIds, $minBlockHeight), GetBulkPaymentsResponse::class);
    }


    /**
     * Return a list of incoming transfers to the wallet.
     *
     * @param IncomingTransferType $transferType "all": all the transfers, "available": only transfers which are not yet spent, OR "unavailable": only transfers which are already spent.
     * @param ?int $accountIndex Return transfers for this account. (defaults to 0)
     * @param ?int[] $subaddrIndices Return transfers sent to these subaddresses.
     * @throws MoneroRpcException
     */
    public function incomingTransfers(
        IncomingTransferType $transferType,
        ?int                 $accountIndex = null,
        ?array               $subaddrIndices = null,
    ): IncomingTransfersResponse {
        return $this->handleRequest(IncomingTransfersRequest::create($transferType, $accountIndex, $subaddrIndices), IncomingTransfersResponse::class);
    }


    /**
     * Return the spend or view private key.
     *
     * @param QueryKeyType $keyType Which key to retrieve: "mnemonic" - the mnemonic seed (older wallets do not have one) OR "view_key" - the view key OR "spend_key".
     * @throws MoneroRpcException
     */
    public function queryKey(QueryKeyType $keyType): QueryKeyResponse
    {
        return $this->handleRequest(QueryKeyRequest::create($keyType), QueryKeyResponse::class);
    }


    /**
     * Make an integrated address from the wallet address and a payment id.
     *
     * @param ?string $standardAddress defaults to primary address) Destination public address.
     * @param ?string $paymentId defaults to a random ID) 16 characters hex encoded.
     * @throws MoneroRpcException
     * @throws InvalidPaymentIdException
     * @throws InvalidAddressException
     */
    public function makeIntegratedAddress(
        ?string $standardAddress = null,
        ?string $paymentId = null,
    ): MakeIntegratedAddressResponse {
        return $this->handleRequest(MakeIntegratedAddressRequest::create($standardAddress, $paymentId), MakeIntegratedAddressResponse::class);
    }


    /**
     * Retrieve the standard address and payment id corresponding to an integrated address.
     *
     * @param string $integratedAddress string
     * @throws MoneroRpcException
     */
    public function splitIntegratedAddress(string $integratedAddress): SplitIntegratedAddressResponse
    {
        return $this->handleRequest(SplitIntegratedAddressRequest::create($integratedAddress), SplitIntegratedAddressResponse::class);
    }


    /**
     * Store the current state of any open wallet and exit the monero-wallet-rpc process.
     *
     * @throws MoneroRpcException
     */
    public function stopWallet(): StopWalletResponse
    {
        return $this->handleRequest(StopWalletRequest::create(), StopWalletResponse::class);
    }


    /**
     * Rescan the blockchain from scratch, losing any information which can not be recovered from the blockchain itself.This includes destination addresses, tx secret keys, tx notes, etc.
     *
     * @throws MoneroRpcException
     */
    public function rescanBlockchain(): RescanBlockchainResponse
    {
        return $this->handleRequest(RescanBlockchainRequest::create(), RescanBlockchainResponse::class);
    }


    /**
     * Set arbitrary string notes for transactions.
     *
     * @param string[] $txids transaction ids
     * @param string[] $notes notes for the transactions
     * @throws MoneroRpcException
     */
    public function setTxNotes(array $txids, array $notes): SetTxNotesResponse
    {
        return $this->handleRequest(SetTxNotesRequest::create($txids, $notes), SetTxNotesResponse::class);
    }


    /**
     * Get string notes for transactions.
     *
     * @param string[] $txids transaction ids
     * @throws MoneroRpcException
     */
    public function getTxNotes(array $txids): GetTxNotesResponse
    {
        return $this->handleRequest(GetTxNotesRequest::create($txids), GetTxNotesResponse::class);
    }


    /**
     * Set arbitrary attribute.
     *
     * @param string $key attribute name
     * @param string $value attribute value
     * @throws MoneroRpcException
     */
    public function setAttribute(string $key, string $value): SetAttributeResponse
    {
        return $this->handleRequest(SetAttributeRequest::create($key, $value), SetAttributeResponse::class);
    }


    /**
     * Get attribute value by name.
     *
     * @param string $key attribute name
     * @throws MoneroRpcException
     * @throws AttributeNotFoundException
     */
    public function getAttribute(string $key): GetAttributeResponse
    {
        return $this->handleRequest(GetAttributeRequest::create($key), GetAttributeResponse::class);
    }


    /**
     * Get transaction secret key from transaction id.
     *
     * @param string $txid transaction id.
     * @throws MoneroRpcException
     */
    public function getTxKey(string $txid): GetTxKeyResponse
    {
        return $this->handleRequest(GetTxKeyRequest::create($txid), GetTxKeyResponse::class);
    }


    /**
     * Check a transaction in the blockchain with its secret key.
     *
     * @param string $txid transaction id.
     * @param string $txKey transaction secret key.
     * @param Address $address destination public address of the transaction.
     * @throws MoneroRpcException
     */
    public function checkTxKey(string $txid, string $txKey, Address $address): CheckTxKeyResponse
    {
        return $this->handleRequest(CheckTxKeyRequest::create($txid, $txKey, $address), CheckTxKeyResponse::class);
    }


    /**
     * Get transaction signature to prove it.
     *
     * @param string $txid transaction id.
     * @param Address $address destination public address of the transaction.
     * @param ?string $message add a message to the signature to further authenticate the prooving process.
     * @throws MoneroRpcException
     */
    public function getTxProof(string $txid, Address $address, ?string $message = null): GetTxProofResponse
    {
        return $this->handleRequest(GetTxProofRequest::create($txid, $address, $message), GetTxProofResponse::class);
    }


    /**
     * Prove a transaction by checking its signature.
     *
     * @param string $txid transaction id.
     * @param Address $address destination public address of the transaction.
     * @param string $signature transaction signature to confirm.
     * @param ?string $message Should be the same message used in `get_tx_proof`.
     * @throws MoneroRpcException
     */
    public function checkTxProof(
        string $txid,
        Address $address,
        string $signature,
        ?string $message = null,
    ): CheckTxProofResponse {
        return $this->handleRequest(CheckTxProofRequest::create($txid, $address, $signature, $message), CheckTxProofResponse::class);
    }


    /**
     * Generate a signature to prove a spend. Unlike proving a transaction, it does not requires the destination public address.
     *
     * @param string $txid transaction id.
     * @param ?string $message add a message to the signature to further authenticate the prooving process.
     * @throws MoneroRpcException
     */
    public function getSpendProof(string $txid, ?string $message = null): GetSpendProofResponse
    {
        return $this->handleRequest(GetSpendProofRequest::create($txid, $message), GetSpendProofResponse::class);
    }


    /**
     * Prove a spend using a signature. Unlike proving a transaction, it does not requires the destination public address.
     *
     * @param string $txid transaction id.
     * @param string $signature spend signature to confirm.
     * @param ?string $message Should be the same message used in `get_spend_proof`.
     * @throws MoneroRpcException
     */
    public function checkSpendProof(string $txid, string $signature, ?string $message = null): CheckSpendProofResponse
    {
        return $this->handleRequest(CheckSpendProofRequest::create($txid, $signature, $message), CheckSpendProofResponse::class);
    }


    /**
     * Generate a signature to prove of an available amount in a wallet.
     *
     * @param bool $all Proves all wallet balance to be disposable.
     * @param int $accountIndex Specify the account from which to prove reserve. (ignored if `all` is set to true)
     * @param Amount $amount Amount (in piconero) to prove the account has in reserve. (ignored if `all` is set to true)
     * @param ?string $message add a message to the signature to further authenticate the proving process. If a _message_ is added to `get_reserve_proof` (optional), this message will be required when using `check_reserve_proof`
     * @throws MoneroRpcException
     */
    public function getReserveProof(
        bool $all,
        int $accountIndex,
        Amount $amount,
        ?string $message = null,
    ): GetReserveProofResponse {
        return $this->handleRequest(GetReserveProofRequest::create($all, $accountIndex, $amount, $message), GetReserveProofResponse::class);
    }


    /**
     * Proves a wallet has a disposable reserve using a signature.
     *
     * @param Address $address Public address of the wallet.
     * @param string $signature reserve signature to confirm.
     * @param ?string $message If a _message_ was added to `get_reserve_proof` (optional), this message will be required when using `check_reserve_proof`
     * @throws MoneroRpcException
     */
    public function checkReserveProof(
        Address $address,
        string $signature,
        ?string $message = null,
    ): CheckReserveProofResponse {
        return $this->handleRequest(CheckReserveProofRequest::create($address, $signature, $message), CheckReserveProofResponse::class);
    }


    /**
     * Returns a list of transfers.
     * WARNING: Verify that the transfer has a sane `unlock_time` otherwise the funds might be inaccessible.
     *
     * @param bool $in Include incoming transfers.
     * @param bool $out Include outgoing transfers.
     * @param bool $pending Include pending transfers.
     * @param bool $failed Include failed transfers.
     * @param bool $pool Include transfers from the daemon's transaction pool.
     * @param bool $filterByHeight Filter transfers by block height.
     * @param ?int $minHeight Minimum block height to scan for transfers, if filtering by height is enabled.
     * @param ?int $maxHeight Maximum block height to scan for transfers, if filtering by height is enabled (defaults to max block height).
     * @param ?int $accountIndex Index of the account to query for transfers. (defaults to 0)
     * @param ?int[] $subaddrIndices List of subaddress indices to query for transfers. (Defaults to empty - all indices).
     * @param bool $allAccounts (.
     * @throws MoneroRpcException
     */
    public function getTransfers(
        bool $in = true,
        bool $out = true,
        bool $pending = true,
        bool $failed = true,
        bool $pool = true,
        ?bool $filterByHeight = null,
        ?int $minHeight = null,
        ?int $maxHeight = null,
        ?int $accountIndex = null,
        ?array $subaddrIndices = [],
        ?bool $allAccounts = false,
    ): GetTransfersResponse {
        return $this->handleRequest(GetTransfersRequest::create($in, $out, $pending, $failed, $pool, $filterByHeight, $minHeight, $maxHeight, $accountIndex, $subaddrIndices, $allAccounts), GetTransfersResponse::class);
    }


    /**
     * Show information about a transfer to/from this address.<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
     *
     * @param string $txid Transaction ID used to find the transfer.
     * @param ?int $accountIndex Index of the account to query for the transfer.
     * @throws MoneroRpcException
     */
    public function getTransferByTxid(string $txid, ?int $accountIndex = null): GetTransferByTxidResponse
    {
        return $this->handleRequest(GetTransferByTxidRequest::create($txid, $accountIndex), GetTransferByTxidResponse::class);
    }


    /**
     * Returns details for each transaction in an unsigned or multisig transaction set. Transaction sets are obtained as return values from one of the following RPC methods:* transfer* transfer_split* sweep_all* sweep_single* sweep_dustThese methods return unsigned transaction sets if the wallet is view-only (i.e. the wallet was created without the private spend key).<p style="color:red;"><b>WARNING</b> Verify that the transfer has a sane <code>unlock_time</code> otherwise the funds might be inaccessible.</p>
     *
     * @param ?string $unsignedTxset A hexadecimal string representing a set of unsigned transactions (empty for multisig transactions; non-multisig signed transactions are not supported).
     * @param ?string $multisigTxset A hexadecimal string representing the set of signing keys used in a multisig transaction (empty for unsigned transactions; non-multisig signed transactions are not supported).
     * @throws MoneroRpcException
     */
    public function describeTransfer(
        ?string $unsignedTxset = null,
        ?string $multisigTxset = null,
    ): DescribeTransferResponse {
        return $this->handleRequest(DescribeTransferRequest::create($unsignedTxset, $multisigTxset), DescribeTransferResponse::class);
    }


    /**
     * Sign a string.
     *
     * @param string $data Anything you need to sign.
     * @throws MoneroRpcException
     */
    public function sign(string $data): SignResponse
    {
        return $this->handleRequest(SignRequest::create($data), SignResponse::class);
    }


    /**
     * Verify a signature on a string.
     *
     * @param string $data What should have been signed.
     * @param Address $address Public address of the wallet used to `sign` the data.
     * @param string $signature signature generated by `sign` method.
     * @throws MoneroRpcException
     */
    public function verify(string $data, Address $address, string $signature): VerifyResponse
    {
        return $this->handleRequest(VerifyRequest::create($data, $address, $signature), VerifyResponse::class);
    }


    /**
     * Export outputs in hex format.
     *
     * @param bool $all If true, export all outputs. Otherwise, export outputs since the last export. (
     * @throws MoneroRpcException
     */
    public function exportOutputs(?bool $all = false): ExportOutputsResponse
    {
        return $this->handleRequest(ExportOutputsRequest::create($all), ExportOutputsResponse::class);
    }


    /**
     * Import outputs in hex format.
     *
     * @param string $outputsDataHex wallet outputs in hex format.
     * @throws MoneroRpcException
     */
    public function importOutputs(string $outputsDataHex): ImportOutputsResponse
    {
        return $this->handleRequest(ImportOutputsRequest::create($outputsDataHex), ImportOutputsResponse::class);
    }


    /**
     * Export a signed set of key images.
     *
     * @param bool $all If true, export all key images. Otherwise, export key images since the last export. (
     * @throws MoneroRpcException
     */
    public function exportKeyImages(?bool $all = false): ExportKeyImagesResponse
    {
        return $this->handleRequest(ExportKeyImagesRequest::create($all), ExportKeyImagesResponse::class);
    }


    /**
     * Import signed key images list and verify their spent status.
     *
     * @param SignedKeyImage[] $signedKeyImages List of signed key images:
     * @param ?int $offset (optional)
     * @throws MoneroRpcException
     */
    public function importKeyImages(array $signedKeyImages, ?int $offset = null): ImportKeyImagesResponse
    {
        return $this->handleRequest(ImportKeyImagesRequest::create($signedKeyImages, $offset), ImportKeyImagesResponse::class);
    }


    /**
     * Create a payment URI using the official URI spec.
     *
     * @param Address $address Wallet address
     * @param ?Amount $amount (optional) the integer amount to receive, in **piconero**
     * @param ?string $paymentId defaults to a random ID) 16 characters hex encoded.
     * @param ?string $recipientName (optional) name of the payment recipient
     * @param ?string $txDescription (optional) Description of the reason for the tx
     * @throws MoneroRpcException
     */
    public function makeUri(
        Address $address,
        ?Amount $amount = null,
        ?string $paymentId = null,
        ?string $recipientName = null,
        ?string $txDescription = null,
    ): MakeUriResponse {
        return $this->handleRequest(MakeUriRequest::create($address, $amount, $paymentId, $recipientName, $txDescription), MakeUriResponse::class);
    }


    /**
     * Parse a payment URI to get payment information.
     *
     * @param string $uri This contains all the payment input information as a properly formatted payment URI
     * @throws MoneroRpcException
     */
    public function parseUri(string $uri): ParseUriResponse
    {
        return $this->handleRequest(ParseUriRequest::create($uri), ParseUriResponse::class);
    }


    /**
     * Retrieves entries from the address book.
     *
     * @param ?int[] $entries indices of the requested address book entries
     * @throws MoneroRpcException
     * @throws IndexOutOfRangeException
     */
    public function getAddressBook(?array $entries = null): GetAddressBookResponse
    {
        return $this->handleRequest(GetAddressBookRequest::create($entries), GetAddressBookResponse::class);
    }


    /**
     * Add an entry to the address book.
     *
     * @param Address $address
     * @param ?string $description defaults to "";
     * @throws MoneroRpcException
     */
    public function addAddressBook(
        Address $address,
        ?string $description = null,
    ): AddAddressBookResponse {
        return $this->handleRequest(AddAddressBookRequest::create($address, $description), AddAddressBookResponse::class);
    }


    /**
     * Edit an existing address book entry.Alias: *None*
     *
     * @param int $index Index of the address book entry to edit.
     * @param bool $setAddress If true, set the address for this entry to the value of "address".
     * @param ?Address $address The 95-character public address to set.
     * @param bool $setDescription If true, set the description for this entry to the value of "description".
     * @param ?string $description Human-readable description for this entry.
     * @throws MoneroRpcException
     */
    public function editAddressBook(
        int $index,
        bool $setAddress,
        bool $setDescription,
        ?Address $address = null,
        ?string $description = null,
    ): EditAddressBookResponse {
        return $this->handleRequest(EditAddressBookRequest::create($index, $setAddress, $address, $setDescription, $description), EditAddressBookResponse::class);
    }


    /**
     * Delete an entry from the address book.
     *
     * @param int $index The index of the address book entry.
     * @throws MoneroRpcException
     */
    public function deleteAddressBook(int $index): DeleteAddressBookResponse
    {
        return $this->handleRequest(DeleteAddressBookRequest::create($index), DeleteAddressBookResponse::class);
    }


    /**
     * Refresh a wallet after openning.
     *
     * @param ?int $startHeight The block height from which to start refreshing. Passing no value or a value less than the last block scanned by the wallet refreshes from the last block scanned.
     * @throws MoneroRpcException
     */
    public function refresh(?int $startHeight = null): RefreshResponse
    {
        return $this->handleRequest(RefreshRequest::create($startHeight), RefreshResponse::class);
    }


    /**
     * Set whether and how often to automatically refresh the current wallet.
     *
     * @param bool $enable Enable or disable automatic refreshing (Defaults to true).
     * @param ?int $period The period of the wallet refresh cycle (i.e. time between refreshes) in seconds.
     * @throws MoneroRpcException
     */
    public function autoRefresh(?bool $enable = true, ?int $period = null): AutoRefreshResponse
    {
        return $this->handleRequest(AutoRefreshRequest::create($enable, $period), AutoRefreshResponse::class);
    }


    /**
     * Rescan the blockchain for spent outputs.
     *
     * @throws MoneroRpcException
     */
    public function rescanSpent(): RescanSpentResponse
    {
        return $this->handleRequest(RescanSpentRequest::create(), RescanSpentResponse::class);
    }


    /**
     * Start mining in the Monero daemon.
     *
     * @param int $threadsCount Number of threads created for mining.
     * @param bool $doBackgroundMining Allow to start the miner in @smart-mining mode.
     * @param bool $ignoreBattery Ignore battery status (for @smart-mining only)
     * @throws MoneroRpcException
     */
    public function startMining(int $threadsCount, bool $doBackgroundMining, bool $ignoreBattery): StartMiningResponse
    {
        return $this->handleRequest(StartMiningRequest::create($threadsCount, $doBackgroundMining, $ignoreBattery), StartMiningResponse::class);
    }


    /**
     * Stop mining in the Monero daemon.
     *
     * @throws MoneroRpcException
     */
    public function stopMining(): StopMiningResponse
    {
        return $this->handleRequest(StopMiningRequest::create(), StopMiningResponse::class);
    }


    /**
     * Get a list of available languages for your wallet's seed.
     *
     * @throws MoneroRpcException
     */
    public function getLanguages(): GetLanguagesResponse
    {
        return $this->handleRequest(GetLanguagesRequest::create(), GetLanguagesResponse::class);
    }


    /**
     * Create a new wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.
     *
     * @param string $filename Wallet file name.
     * @param string $language Language for your wallets' seed.
     * @param ?string $password password to protect the wallet.
     * @throws MoneroRpcException
     * @throws WalletExistsException
     * @throws InvalidLanguageException
     */
    public function createWallet(string $filename, string $language, ?string $password = null): CreateWalletResponse
    {
        return $this->handleRequest(CreateWalletRequest::create($filename, $language, $password), CreateWalletResponse::class);
    }


    /**
     * Restores a wallet from a given wallet address, view key, and optional spend key.
     *
     * @param string $filename The wallet's file name on the RPC server.
     * @param Address $address The wallet's primary address.
     * @param string $viewkey The wallet's private view key.
     * @param string $password The wallet's password.
     * @param ?int $restoreHeight defaults to 0) The block height to restore the wallet from.
     * @param ?string $spendkey omit to create a view-only wallet) The wallet's private spend key.
     * @param bool $autosaveCurrent (Defaults to true) If true, save the current wallet before generating the new wallet.
     * @throws MoneroRpcException
     */
    public function generateFromKeys(
        string $filename,
        Address $address,
        string $viewkey,
        string $password,
        ?int $restoreHeight = null,
        ?string $spendkey = null,
        ?bool $autosaveCurrent = true,
    ): GenerateFromKeysResponse {
        return $this->handleRequest(GenerateFromKeysRequest::create($filename, $address, $viewkey, $password, $restoreHeight, $spendkey, $autosaveCurrent), GenerateFromKeysResponse::class);
    }


    /**
     * Open a wallet. You need to have set the argument "--wallet-dir" when launching monero-wallet-rpc to make this work.
     *
     * @param string $filename wallet name stored in --wallet-dir.
     * @param ?string $password only needed if the wallet has a password defined.
     * @throws MoneroRpcException
     * @throws OpenWalletException
     */
    public function openWallet(string $filename, ?string $password = null): OpenWalletResponse
    {
        return $this->handleRequest(OpenWalletRequest::create($filename, $password), OpenWalletResponse::class);
    }


    /**
     * Create and open a wallet on the RPC server from an existing mnemonic phrase and close the currently open wallet.
     *
     * @param string $filename Name of the wallet.
     * @param string $password Password of the wallet.
     * @param string $seed Mnemonic phrase of the wallet to restore.
     * @param ?int $restoreHeight Block height to restore the wallet from (Defaults to 0).
     * @param ?string $language Language of the mnemonic phrase in case the old language is invalid.
     * @param ?string $seedOffset Offset used to derive a new seed from the given mnemonic to recover a secret wallet from the mnemonic phrase.
     * @param bool $autosaveCurrent Whether to save the currently open RPC wallet before closing it (Defaults to true).
     * @throws MoneroRpcException
     */
    public function restoreDeterministicWallet(
        string $filename,
        string $password,
        string $seed,
        ?int $restoreHeight = 0,
        ?string $language = null,
        ?string $seedOffset = null,
        ?bool $autosaveCurrent = true,
    ): RestoreDeterministicWalletResponse {
        return $this->handleRequest(RestoreDeterministicWalletRequest::create($filename, $password, $seed, $restoreHeight, $language, $seedOffset, $autosaveCurrent), RestoreDeterministicWalletResponse::class);
    }


    /**
     * Close the currently opened wallet, after trying to save it.
     *
     * @throws MoneroRpcException
     * @throws NoWalletFileException
     */
    public function closeWallet(): CloseWalletResponse
    {
        return $this->handleRequest(CloseWalletRequest::create(), CloseWalletResponse::class);
    }


    /**
     * Change a wallet password.
     *
     * @param ?string $oldPassword Current wallet password, if defined.
     * @param ?string $newPassword New wallet password, if not blank.
     * @throws MoneroRpcException
     * @throws InvalidOriginalPasswordException
     */
    public function changeWalletPassword(
        ?string $oldPassword = null,
        ?string $newPassword = null,
    ): ChangeWalletPasswordResponse {
        return $this->handleRequest(ChangeWalletPasswordRequest::create($oldPassword, $newPassword), ChangeWalletPasswordResponse::class);
    }


    /**
     * Check if a wallet is a multisig one.
     *
     * @throws MoneroRpcException
     */
    public function isMultisig(): IsMultisigResponse
    {
        return $this->handleRequest(IsMultisigRequest::create(), IsMultisigResponse::class);
    }


    /**
     * Prepare a wallet for multisig by generating a multisig string to share with peers.
     *
     * @throws MoneroRpcException
     */
    public function prepareMultisig(): PrepareMultisigResponse
    {
        return $this->handleRequest(PrepareMultisigRequest::create(), PrepareMultisigResponse::class);
    }


    /**
     * Make a wallet multisig by importing peers multisig string.
     *
     * @param string[] $multisigInfo List of multisig string from peers.
     * @param int $threshold Amount of signatures needed to sign a transfer. Must be less or equal than the amount of signature in `multisig_info`.
     * @param ?string $password Wallet password
     * @throws MoneroRpcException
     */
    public function makeMultisig(array $multisigInfo, int $threshold, ?string $password = null): MakeMultisigResponse
    {
        return $this->handleRequest(MakeMultisigRequest::create($multisigInfo, $threshold, $password), MakeMultisigResponse::class);
    }


    /**
     * Export multisig info for other participants.
     *
     * @throws MoneroRpcException
     */
    public function exportMultisigInfo(): ExportMultisigInfoResponse
    {
        return $this->handleRequest(ExportMultisigInfoRequest::create(), ExportMultisigInfoResponse::class);
    }


    /**
     * Import multisig info from other participants.
     *
     * @param string[] $info List of multisig info in hex format from other participants.
     * @throws MoneroRpcException
     */
    public function importMultisigInfo(array $info): ImportMultisigInfoResponse
    {
        return $this->handleRequest(ImportMultisigInfoRequest::create($info), ImportMultisigInfoResponse::class);
    }


    /**
     * Turn this wallet into a multisig wallet, extra step for N-1/N wallets.
     *
     * @param string[] $multisigInfo List of multisig string from peers.
     * @param ?string $password Wallet password
     * @throws MoneroRpcException
     */
    public function finalizeMultisig(array $multisigInfo, ?string $password = null): FinalizeMultisigResponse
    {
        return $this->handleRequest(FinalizeMultisigRequest::create($multisigInfo, $password), FinalizeMultisigResponse::class);
    }


    /**
     * Sign a transaction in multisig.
     *
     * @param string $txDataHex Multisig transaction in hex format, as returned by `transfer` under `multisig_txset`.
     * @throws MoneroRpcException
     */
    public function signMultisig(string $txDataHex): SignMultisigResponse
    {
        return $this->handleRequest(SignMultisigRequest::create($txDataHex), SignMultisigResponse::class);
    }


    /**
     * Submit a signed multisig transaction.
     *
     * @param string $txDataHex Multisig transaction in hex format, as returned by `sign_multisig` under `tx_data_hex`.
     * @throws MoneroRpcException
     */
    public function submitMultisig(string $txDataHex): SubmitMultisigResponse
    {
        return $this->handleRequest(SubmitMultisigRequest::create($txDataHex), SubmitMultisigResponse::class);
    }


    /**
     * Get RPC version Major & Minor integer-format, where Major is the first 16 bits and Minor the last 16 bits.
     *
     * @throws MoneroRpcException
     */
    public function getVersion(): GetVersionResponse
    {
        return $this->handleRequest(GetVersionRequest::create(), GetVersionResponse::class);
    }


    /**
     * Freeze a single output by key image so it will not be used
     *
     * @param string $keyImage
     * @throws MoneroRpcException
     */
    public function freeze(string $keyImage): FreezeResponse
    {
        return $this->handleRequest(FreezeRequest::create($keyImage), FreezeResponse::class);
    }


    /**
     * Checks whether a given output is currently frozen by key image
     *
     * @param string $keyImage
     * @throws MoneroRpcException
     */
    public function frozen(string $keyImage): FrozenResponse
    {
        return $this->handleRequest(FrozenRequest::create($keyImage), FrozenResponse::class);
    }


    /**
     * Thaw a single output by key image so it may be used again
     *
     * @param string $keyImage
     * @throws MoneroRpcException
     */
    public function thaw(string $keyImage): ThawResponse
    {
        return $this->handleRequest(ThawRequest::create($keyImage), ThawResponse::class);
    }


    /**
     * Performs extra multisig keys exchange rounds.
     * Needed for arbitrary M/N multisig wallets
     *
     * @param string $password
     * @param string $multisigInfo
     * @param bool $forceUpdateUseWithCaution only require the minimum number of signers to complete this round (including local signer) ( minimum = num_signers - (round num - 1).
     * @throws MoneroRpcException
     */
    public function exchangeMultisigKeys(
        string $password,
        string $multisigInfo,
        ?bool $forceUpdateUseWithCaution = false,
    ): ExchangeMultisigKeysResponse {
        return $this->handleRequest(ExchangeMultisigKeysRequest::create($password, $multisigInfo, $forceUpdateUseWithCaution), ExchangeMultisigKeysResponse::class);
    }


    /**
     * @param int $nInputs
     * @param int $nOutputs
     * @param int $ringSize Sets ringsize to n (mixin + 1). (Unless dealing with pre rct outputs, this field is ignored on mainnet).
     * @param bool $rct Is this a Ring Confidential Transaction (post blockheight 1220516)
     * @throws MoneroRpcException
     */
    public function estimateTxSizeAndWeight(
        int $nInputs,
        int $nOutputs,
        int $ringSize,
        bool $rct,
    ): EstimateTxSizeAndWeightResponse {
        return $this->handleRequest(EstimateTxSizeAndWeightRequest::create($nInputs, $nOutputs, $ringSize, $rct), EstimateTxSizeAndWeightResponse::class);
    }
}
