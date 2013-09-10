<?php

namespace EasyBillPhpHelper\ValueObj;

/**
 * Class EasyBillDocument
 *
 * @package EasyBillPhpHelper\ValueObj
 * @link    https://soap.easybill.de/wsdl/soap.document.xsd
 *
 * @property mixed customerID
 * @property mixed currency
 * @property mixed textPrefix
 * @property mixed text
 * @property mixed documentPosition
 * @property mixed signDocument
 * @property mixed sendasemail
 * @property mixed sendaspost
 * @property mixed documentID
 * @property mixed documentNumber
 * @property mixed templateName
 */
class EasyBillDocument extends ValueObj
{

    const CURRENCY_EUR = 'EUR';

    /**
     * @param array $data
     */
    function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            if ($key == 'documentPosition') {
                $this->$key = array();
                if (is_array($value)) {
                    foreach ($value as $row) $this->documentPosition[] = new EasyBillDocumentPosition((array)$row);
                } else $this->documentPosition[] = new EasyBillDocumentPosition((array)$value);
            } else $this->$key = $value;
        }
    }


    public function addPosition(EasyBillDocumentPosition $position)
    {
        $this->documentPosition[] = $position;
    }
}