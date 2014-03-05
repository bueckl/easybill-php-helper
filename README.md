easybill-php-helper
===================

Helps to use the EasyBill API
```php
<?php



// Use EasyBillPhpHelper namespace.
use \EasyBillPhpHelper;

// Init your SoapClient.
$client = EasyBillService::getSoapClient('...your API key...');

// Create new instance from EasyBillService.
$service = new EasyBillService($client);

// Create new Customer
$customer = new \EasyBillPhpHelper\ValueObj\EasyBillCustomer();
$customer->companyName = 'GitHub';
$customerRes = $service->addCustomer($customer);

// Create new Position
$position = new \EasyBillPhpHelper\ValueObj\EasyBillCompanyPosition();
$position->itemNumber = '1337';
$position->itemDescription = 'leet';
$position->unit = 'kg';
$position->ustPercent = 19;
$position->salePrice = 1337;
$position->stock = 100;
$positionRes = $service->addCompanyPosition($position);

// Create new Document
$document = new \EasyBillPhpHelper\ValueObj\EasyBillDocument();
$document->customerID = $customerResObj->customerID;
$document->addPosition(\EasyBillPhpHelper\ValueObj\EasyBillDocumentPosition::createFromCompanyPosition($positionRes));
$document->currency = \EasyBillPhpHelper\ValueObj\EasyBillDocument::CURRENCY_EUR;
$documentRes = $service->createDocument($document);
```
For sample look in easybill-php-helper / tests / EasyBillServiceTest.php
