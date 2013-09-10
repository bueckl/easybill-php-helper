<?php

namespace EasyBillPhpHelper\ValueObj;

/**
 * Class EasyBillDocumentPosition
 *
 * @package EasyBillPhpHelper\ValueObj
 *
 * @property mixed $companyPositionID
 * @property mixed $positionType
 * @property mixed $itemNumber
 * @property mixed $itemDescription
 * @property mixed $count
 * @property mixed $unit
 * @property mixed $singlePriceNetto
 * @property mixed $ustPercent
 * @property mixed $discount
 * @property mixed $discountType
 */
class EasyBillDocumentPosition extends ValueObj
{
    const POSITION_TYPE_TEXT = 'TEXT';
    const POSITION_TYPE_POSITION = 'POSITION';

    /**
     * @param EasyBillCompanyPosition $companyPosition
     * @param int                     $count
     *
     * @return EasyBillDocumentPosition
     */
    public static function createFromCompanyPosition(EasyBillCompanyPosition $companyPosition, $count = 1)
    {
        $documentPosition = new self();
        $documentPosition->companyPositionID = $companyPosition->positionID;
        $documentPosition->positionType = EasyBillDocumentPosition::POSITION_TYPE_POSITION;
        $documentPosition->itemNumber = $companyPosition->itemNumber;
        $documentPosition->itemDescription = $companyPosition->itemDescription;
        $documentPosition->count = $count;
        $documentPosition->unit = $companyPosition->unit;
        $documentPosition->singlePriceNetto = $companyPosition->salePrice;
        $documentPosition->ustPercent = $companyPosition->ustPercent;
        return $documentPosition;
    }
}