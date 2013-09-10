<?php

namespace EasyBillPhpHelper\ValueObj;

/**
 * Class EasyBillCustomer
 *
 * @package EasyBillPhpHelper\ValueObj
 * @link    https://soap.easybill.de/wsdl/soap.customer.xsd
 *
 * @property string customerID
 * @property string $customerNumber
 * @property string $salutation
 * @property string $firstName
 * @property string $lastName
 * @property string $street
 * @property string $zipCode
 * @property string $city
 * @property string $country
 * @property string $taxOptions
 * @property string $cashAllowanceDays
 * @property string $companyName
 * @property string $email
 * @property string $phone_1
 * @property string $mobile
 *
 * @property string $bankAccountOwner_1
 * @property string $bankName_1
 * @property string $bankCode_1
 * @property string $bankAccount_1
 * @property string $bankBIC_1
 * @property string $bankIBAN_1
 */
class EasyBillCustomer extends ValueObj
{
    const SALUTATION_MR = 1;
    const SALUTATION_MRS = 2;

    const TAX_OPTIONS_NOT_DEFINED = 0;
    const TAX_OPTIONS_WITH_VAT = 1;
    const TAX_OPTIONS_WITHOUT_VAT = 2;
}