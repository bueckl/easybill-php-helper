<?php

require __DIR__ . '/EasyBillClient.class.php';

/**
 * https://soap.easybill.de/soap.easybill.php?wsdl
 * https://soap.easybill.de/wsdl/soap.customer.xsd
 * https://soap.easybill.de/wsdl/soap.document.xsd
 * https://soap.easybill.de/wsdl/soap.companyposition.xsd
 */
class EasyBill
{
    private static $client = null;

    /**
     * @param $apiKey
     * @return EasyBillClient|null
     */
    public static function getClient($apiKey)
    {
        if (is_null(self::$client)) {
            try {
                ini_set('soap.wsdl_cache_enabled', '0');
                $client = @new SoapClient("https://soap.easybill.de/soap.easybill.php?wsdl", array('trace' => 1, 'exceptions' => 1));
                $header = @new SoapHeader('http://www.easybill.de/webservice', 'UserAuthKey', $apiKey);
                $client->__setSoapHeaders($header);
                self::$client = new EasyBillClient($client);
            } catch (Exception $e) {
                return null;
            }
        }
        return self::$client;
    }

    /**
     * @param EasyBillCompanyPosition $companyPosition
     * @param int $count
     * @return EasyBillDocumentPosition
     */
    public static function getDocumentPosition($companyPosition, $count = 1)
    {
        $documentPosition = new EasyBillDocumentPosition();
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
