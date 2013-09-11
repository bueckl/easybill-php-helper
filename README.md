easybill-php-helper
===================

Helps to use the EasyBill API
```php
// Use EasyBillPhpHelper namespace.
use \EasyBillPhpHelper;

// Init your SoapClient.
$client = EasyBillService::getSoapClient('...your API key...');

// Create new instance from EasyBillService.
$service = new EasyBillService($client);
```
For sample look in easybill-php-helper / tests / EasyBillServiceTest.php
