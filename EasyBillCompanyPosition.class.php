<?php


class EasyBillCompanyPosition
{
    const POSITION_TYPE_SERVICE = 'SERVICE';
    const POSITION_TYPE_PRODUCT = 'PRODUCT';

    const STOCK_YES = 'YES';
    const STOCK_NO = 'NO';

    public $positionID;
    public $positionType;
    public $itemNumber;
    public $itemDescription;
    public $itemNote;
    public $unit;
    public $ustPercent;
    public $costPrice;
    public $salePrice;
    public $salePrice2;
    public $salePrice3;
    public $salePrice4;
    public $salePrice5;
    public $stock;
    public $stockCount;
    public $importID;
}
