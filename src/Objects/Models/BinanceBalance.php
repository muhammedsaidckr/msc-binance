<?php

namespace Mscakir\MscBinance\Objects\Models;

use Money\Money;

class BinanceBalance
{
    /**
     * The asset this balance is for
     *
     * @var string $asset
     */
    public string $asset = "";

    /**
     * The quantity that is not locked in a trade
     *
     * @var Money $free
     */
    public Money $free;

    /**
     * The quantity that is currently locked in a trade
     *
     * @var Money $locked
     */
    public Money $locked;

    /**
     * The total balance of this asset ( $this->free + $this->locked )
     *
     * @var Money|null $total
     */
    public ?Money $total;

    public function __construct()
    {
    }

    /**
     * @return Money|null
     */
    public function getTotal() : Money|null
    {
        $this->total = Money::sum($this->free, $this->locked);
        return $this->total;
    }
}
