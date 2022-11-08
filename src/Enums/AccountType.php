<?php

namespace Mscakir\MscBinance\Enums;

enum AccountType: string
{
    case Spot = "SPOT";
    case Margin = "MARGIN";
    case Futures = "FUTURES";
    case Leveraged = "LEVERAGED";
    case TradeGroup002 = "TRD_GRP_002";
    case TradeGroup003 = "TRD_GRP_003";
    case TradeGroup004 = "TRD_GRP_004";
    case TradeGroup005 = "TRD_GRP_005";
    case TradeGroup006 = "TRD_GRP_006";
    case TradeGroup007 = "TRD_GRP_007";
    case TradeGroup008 = "TRD_GRP_008";
    case TradeGroup009 = "TRD_GRP_009";
}
