<?php

namespace Mscakir\MscBinance\Objects\Models;

use Money\Money;
use DateTime;
use Mscakir\MscBinance\Enums\AccountType;

class BinanceAccountInfo
{
    /**
     * Fee percentage to pay when making trades
     *
     * @var Money $makerCommission
     */
    public Money $makerCommission;

    /**
     * Fee percentage to pay when taking trades
     *
     * @var Money $takerCommission
     */
    public Money $takerCommission;

    /**
     * Fee percentage to pay when buying
     *
     * @var Money $buyerCommission
     */
    public Money $buyerCommission;

    /**
     * Fee percentage to pay when selling
     *
     * @var Money $sellerCommission
     */
    public Money $sellerCommission;

    /**
     * Boolean indicating whether this account can trade
     *
     * @var bool $canTrade
     */
    public bool $canTrade;

    /**
     * Boolean indicating whether this account can withdraw
     *
     * @var bool $canWithdraw
     */
    public bool $canWithdraw;

    /**
     * Boolean indicating whether this account can deposit
     *
     * @var bool $canDeposit
     */
    public bool $canDeposit;

    /**
     * Account is brokered
     *
     * @var bool $brokered
     */
    public bool $brokered;

    public DateTime $updateTime;

    /**
     * The type of account
     *
     * @var AccountType $accountType
     */
    public AccountType $accountType;

    /**
     * Permission types
     *
     * @var array $permissions
     */
    public array $permissions;

    /**
     * Lis of assets with their current balances
     *
     * @var array $balances
     */
    public array $balances;
}
