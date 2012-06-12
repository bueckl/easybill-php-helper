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
        try {
            $search = $this->searchCompanyPositions($positionNumber);
        } catch (Exception $e) {
            return null;
        }
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
        try {
            return $this->client->setCustomer($customer);
        } catch (Exception $e) {
            return null;
        }
    }


    /**
     * @abstract
     * @param int $companyPositionID
     * @return EasyBillCompanyPosition
     */
    public function getCompanyPosition($companyPositionID)
    {
        try {
            return $this->client->getCompanyPosition($companyPositionID);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @abstract
     * @param EasyBillCompanyPosition $position
     * @return EasyBillCompanyPosition
     */
    public function setCompanyPosition($position)
    {
        try {
            return $this->client->setCompanyPosition($position);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @abstract
     * @param string $string
     * @return EasyBillSearchCustomer|null
     */
    public function searchCustomers($string)
    {
        try {
            return $this->client->searchCustomers($string);
        } catch (Exception $e) {
            return null;
        }
    }


    /**
     * @abstract
     * @param EasyBillDocument $document
     * @return EasyBillDocumentFile
     */
    public function createDocument($document)
    {
        try {
            return $this->client->createDocument($document);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @abstract
     * @param int $documentID
     * @return EasyBillDocumentFile
     */
    public function getDocument($documentID)
    {
        try {
            return $this->client->getDocument($documentID);
        } catch (Exception $e) {
            return null;
        }
    }


    /**
     * @abstract
     * @param int $customerNumber
     * @return EasyBillCustomer
     */
    public function getCustomerByCustomerNumber($customerNumber)
    {
        try {
            return $this->client->getCustomerByCustomerNumber($customerNumber);
        } catch (Exception $e) {
            return null;
        }
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
        try {
            return $this->client->getDocumentsByCustomer($customerID);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @abstract
     * @param $string
     * @return EasyBillSearchCompanyPositions
     */
    public function searchCompanyPositions($string)
    {
        try {
            return $this->client->searchCompanyPositions($string);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @param EasyBillDocumentPayment $payment
     * @return bool
     */
    public function setDocumentAddPayment($payment)
    {
        try {
            $this->client->setDocumentAddPayment($payment);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
