<?php

class EasyBillClient
{
    private $client;

    function __construct(SoapClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $positionNumber
     * @return EasyBillCompanyPosition|null
     */
    public function getCompanyPositionByPositionNumber($positionNumber)
    {
        $companyPosition = null;
        $search = $this->searchCompanyPositions($positionNumber);
        if ($result = $search->SearchPosition) {
            if (!is_array($result)) $result = array($result);
            foreach ($result as $blob)
                if (strtolower($blob->itemNumber) == strtolower($positionNumber))
                    $companyPosition = $blob;
        }
        return $companyPosition;
    }

    /**
     * Add and update a customer
     * @abstract
     * @param EasyBillCustomer $customer
     * @return EasyBillCustomer
     */
    public function setCustomer($customer)
    {
        return $this->client->setCustomer($customer);
    }


    /**
     * @abstract
     * @param int $companyPositionID
     * @return EasyBillCompanyPosition
     */
    public function getCompanyPosition($companyPositionID)
    {
        return $this->client->getCompanyPosition($companyPositionID);
    }

    /**
     * @abstract
     * @param EasyBillCompanyPosition $position
     * @return EasyBillCompanyPosition
     */
    public function setCompanyPosition($position)
    {
        return $this->client->setCompanyPosition($position);
    }

    /**
     * @abstract
     * @param string $string
     * @return EasyBillSearchCustomer
     */
    public function searchCustomers($string)
    {
        return $this->client->searchCustomers($string);
    }


    /**
     * @abstract
     * @param EasyBillDocument $document
     * @return EasyBillDocumentFile
     */
    public function createDocument($document)
    {
        return $this->client->createDocument($document);
    }

    /**
     * @abstract
     * @param int $documentID
     * @return EasyBillDocumentFile
     */
    public function getDocument($documentID)
    {
        return $this->client->getDocument($documentID);
    }


    /**
     * @abstract
     * @param int $customerNumber
     * @return EasyBillCustomer
     */
    public function getCustomerByCustomerNumber($customerNumber)
    {
        return $this->client->getCustomerByCustomerNumber($customerNumber);
    }


    /**
     * @abstract
     * @param int $customerID
     * @return EasyBillCustomer|null
     */
    public function getCustomer($customerID)
    {
        try {
            return $this->client->getCustomer($customerID);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @abstract
     * @param int $customerID
     * @return EasyBillSearchDocument
     */
    public function getDocumentsByCustomer($customerID)
    {
        return $this->client->getDocumentsByCustomer($customerID);
    }

    /**
     * @abstract
     * @param $string
     * @return EasyBillSearchCompanyPositions
     */
    public function searchCompanyPositions($string)
    {
        return $this->client->searchCompanyPositions($string);
    }

    /**
     * @param EasyBillDocumentPayment $payment
     */
    public function setDocumentAddPayment($payment)
    {
        $this->client->setDocumentAddPayment($payment);
    }
}
