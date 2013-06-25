<?php

namespace EasyBillPhpHelper\ValueObj;

/**
 * Class EasyBillCompanyPosition
 *
 * @package EasyBillPhpHelper\ValueObj
 * @link https://soap.easybill.de/wsdl/soap.companyposition.xsd
 *
 * @property string positionID
 * @property string positionType
 * @property string itemNumber
 * @property string itemDescription
 * @property string itemNote
 * @property string unit
 * @property string ustPercent
 * @property string costPrice
 * @property string salePrice
 * @property string salePrice2
 * @property string salePrice3
 * @property string salePrice4
 * @property string salePrice5
 * @property string stock
 * @property string stockCount
 * @property string importID
 */
class EasyBillCompanyPosition extends ValueObj
{
    const POSITION_TYPE_SERVICE = 'SERVICE';
    const POSITION_TYPE_PRODUCT = 'PRODUCT';

    const STOCK_YES = 'YES';
    const STOCK_NO = 'NO';
}