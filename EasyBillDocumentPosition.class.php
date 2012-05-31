<?php

class EasyBillDocumentPosition
{
    const POSITION_TYPE_SERVICE = 'SERVICE';
    const POSITION_TYPE_PRODUCT = 'PRODUCT';

    public $companyPositionID;
    public $positionType;
    public $itemNumber;
    public $itemDescription;
    public $count;
    public $unit;
    public $singlePriceNetto;
    public $ustPercent;
    public $discount;
    public $discountType;
}
