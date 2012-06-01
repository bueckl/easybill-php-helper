<?php

interface EasyBillClient
{
    /**
     * Add and update a customer
     * @abstract
     * @param EasyBillCustomer $customer
     * @return EasyBillCustomer
     */
    public function setCustomer($customer);


    /**
     * @abstract
     * @param int $companyPositionID
     * @return EasyBillCompanyPosition
     */
    public function getCompanyPosition($companyPositionID);

    /**
     * @abstract
     * @param EasyBillCompanyPosition $position
     * @return EasyBillCompanyPosition
     */
    public function setCompanyPosition($position);

    /**
     * @abstract
     * @param string $string
     * @return EasyBillSearchCustomer
     */
    public function searchCustomers($string);


    /**
     * @abstract
     * @param EasyBillDocument $document
     * @return EasyBillDocumentFile
     */
    public function createDocument($document);

    /**
     * @abstract
     * @param int $documentID
     * @return EasyBillDocumentFile
     */
    public function getDocument($documentID);


    /**
     * @abstract
     * @param int $customerNumber
     * @return EasyBillCustomer
     */
    public function getCustomerByCustomerNumber($customerNumber);


    /**
     * @abstract
     * @param int $customerID
     * @return EasyBillCustomer
     */
    public function getCustomer($customerID);

    /**
     * @abstract
     * @param int $customerID
     * @return EasyBillSearchDocument
     */
    public function getDocumentsByCustomer($customerID);

    /**
     * @abstract
     * @param $string
     * @return EasyBillSearchCompanyPositions
     */
    public function searchCompanyPositions($string);
}
