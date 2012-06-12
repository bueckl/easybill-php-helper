<?php

/**
 * https://soap.easybill.de/wsdl/soap.document.xsd
 */
class EasyBillDocument
{
    public $customerID;
    public $currency;
    public $textPrefix;
    public $text;
    /** @var EasyBillDocumentPosition|EasyBillDocumentPosition[] */
    public $documentPosition;
    public $signDocument;
    public $sendasemail;
    public $sendaspost;
    public $documentID;
    public $documentNumber;
    public $templateName;
}
