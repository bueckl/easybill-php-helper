<?php

namespace EasyBillPhpHelper;

use EasyBillPhpHelper\ValueObj\EasyBillCompanyPosition;
use EasyBillPhpHelper\ValueObj\EasyBillCustomer;
use EasyBillPhpHelper\ValueObj\EasyBillDocument;
use EasyBillPhpHelper\ValueObj\EasyBillDocumentFile;
use EasyBillPhpHelper\ValueObj\EasyBillDocumentPayment;

/**
 * Class EasyBillService
 *
 * @package EasyBillPhpHelper
 * @link    https://soap.easybill.de/soap.easybill.php?wsdl
 */
class EasyBillService
{
    /**
     * @var \SoapClient
     */
    protected $client;

    function __construct(\SoapClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return \SoapClient
     */
    public function getClient()
    {
        return $this->client;
    }

    public static function getSoapClient($apiKey)
    {
        ini_set('soap.wsdl_cache_enabled', '1');
        $client = new \SoapClient("https://soap.easybill.de/soap.easybill.php?wsdl", array('trace' => 1, 'exceptions' => 1));
        $header = new \SoapHeader('http://www.easybill.de/webservice', 'UserAuthKey', $apiKey);
        $client->__setSoapHeaders($header);
        return $client;
    }

    /**
     * @param $string
     *
     * @return EasyBillCustomer[]
     * @throws \SoapFault if fail
     */
    public function searchCustomers($string)
    {
        $result = $this->client->searchCustomers($string);
        if (!($result instanceof \stdClass)) throw new \SoapFault('0', 'searchCustomers() result is wrong');
        if (!property_exists($result, 'SearchCustomer')) return array();
        if (is_array($result->SearchCustomer)) return $result->SearchCustomer;
        else return array(new EasyBillCustomer((array)$result->SearchCustomer));
    }

    /**
     * @param $string
     *
     * @return EasyBillCompanyPosition[]
     * @throws \SoapFault if fail
     */
    public function searchCompanyPositions($string)
    {
        $result = $this->client->searchCompanyPositions($string);
        if (!($result instanceof \stdClass)) throw new \SoapFault('0', 'searchCompanyPositions() result is wrong');
        if (!property_exists($result, 'SearchPosition')) return array();
        if (is_array($result->SearchPosition)) return EasyBillCompanyPosition::createFromArray($result->SearchPosition);
        else return array(new EasyBillCompanyPosition((array)$result->SearchPosition));
    }


    public function searchDocumentsByCustomer($customerID)
    {
        //TODO:
        $result = $this->client->getDocumentsByCustomer($customerID);

        return $result;
    }

    /**
     * @param EasyBillCompanyPosition $position
     *
     * @return EasyBillCompanyPosition
     * @throws \SoapFault if fail
     */
    public function addCompanyPosition(EasyBillCompanyPosition $position)
    {
        return new EasyBillCompanyPosition((array)$this->client->setCompanyPosition($position));
    }

    /**
     * @param EasyBillCompanyPosition $position
     *
     * @return EasyBillCompanyPosition
     * @throws \SoapFault if fail
     */
    public function updateCompanyPosition(EasyBillCompanyPosition $position)
    {
        return $this->addCompanyPosition($position);
    }

    /**
     * @param $positionID
     *
     * @return EasyBillCompanyPosition
     * @throws \SoapFault if not found
     */
    public function getCompanyPosition($positionID)
    {
        return new EasyBillCompanyPosition((array)$this->client->getCompanyPosition($positionID));
    }

    /**
     * @param EasyBillCustomer $customer
     *
     * @return EasyBillCustomer
     * @throws \SoapFault if not found
     */
    public function addCustomer(EasyBillCustomer $customer)
    {
        return new EasyBillCustomer((array)$this->client->setCustomer($customer));
    }

    /**
     * @param EasyBillCustomer $customer
     *
     * @return EasyBillCustomer
     * @throws \SoapFault if not found
     */
    public function updateCustomer(EasyBillCustomer $customer)
    {
        return $this->addCustomer($customer);
    }

    /**
     * @param $customerID
     *
     * @return EasyBillCustomer
     * @throws \SoapFault if not found
     */
    public function getCustomer($customerID)
    {
        return new EasyBillCustomer((array)$this->client->getCustomer($customerID));
    }

    /**
     * @param $customerNumber
     *
     * @return EasyBillCustomer
     * @throws \SoapFault if not found
     */
    public function getCustomerByCustomerNumber($customerNumber)
    {
        return new EasyBillCustomer((array)$this->client->getCustomerByCustomerNumber($customerNumber));
    }


    /**
     * @param EasyBillDocument $document
     *
     * @return EasyBillDocumentFile
     * @throws \SoapFault if not found
     */
    public function createDocument(EasyBillDocument $document)
    {
        return new EasyBillDocumentFile((array)$this->client->createDocument($document));
    }

    /**
     * @param $documentID
     *
     * @return EasyBillDocumentFile
     * @throws \SoapFault if not found
     */
    public function getDocumentFile($documentID)
    {
        return new EasyBillDocumentFile((array)$this->client->getDocument($documentID));
    }

    /**
     * @param EasyBillDocumentPayment $payment
     *
     * @return bool
     * @throws \SoapFault if not found
     */
    public function addPayment(EasyBillDocumentPayment $payment)
    {
        return $this->client->setDocumentAddPayment($payment);
    }
}