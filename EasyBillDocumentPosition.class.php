<?php

class EasyBillDocumentPosition
{
    const POSITION_TYPE_TEXT = 'TEXT';
    const POSITION_TYPE_POSITION = 'POSITION';

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
