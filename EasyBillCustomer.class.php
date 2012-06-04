<?php

/**
 * https://soap.easybill.de/wsdl/soap.customer.xsd
 */
class EasyBillCustomer
{

    const SALUTATION_MR = 1;
    const SALUTATION_MRS = 2;

    const TAX_OPTIONS_NOT_DEFINED = 0;
    const TAX_OPTIONS_WITH_VAT = 1;
    const TAX_OPTIONS_WITHOUT_VAT = 2;

    public $customerID;
    public $customerNumber;
    public $salutation;
    public $firstName;
    public $lastName;
    public $street;
    public $zipCode;
    public $city;
    public $country;
    public $taxOptions;
    public $cashAllowanceDays;
    public $companyName;
    public $email;
    public $phone_1;
    public $mobile;
}
