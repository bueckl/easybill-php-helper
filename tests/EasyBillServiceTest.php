<?php

class EasyBillServiceTest extends PHPUnit_Framework_TestCase
{

    private function getApiKey()
    {
        return '<API-KEY>';
    }

    /**
     * @return SoapClient
     */
    private function getClient()
    {
        return \EasyBillPhpHelper\EasyBillService::getSoapClient($this->getApiKey());
    }

    private function getService()
    {
        return new \EasyBillPhpHelper\EasyBillService($this->getClient());
    }

    public function testClientInit()
    {
        $this->assertInstanceOf('SoapClient', $this->getClient());
    }

    /*
    public function testCompanyPosition()
    {
        $position = new \EasyBillPhpHelper\ValueObj\EasyBillCompanyPosition();
        $position->itemNumber = '11';
        $position->itemDescription = 'asd';
        $position->unit = 'kg';
        $position->ustPercent = 19;
        $position->salePrice = 1337;
        $position->stock = 100;
        $res = $this->getService()->addCompanyPosition($position);
        var_dump($res);
        $this->assertTrue(true);
    }
    */

    /*
    public function testLoadCompanyPosition()
    {
        $id = 145830711;
        var_dump($this->getService()->getCompanyPosition($id));

        $this->assertTrue(true);
    }
    */

    /*
    public function testAddCustomer()
    {
        $c = new \EasyBillPhpHelper\ValueObj\EasyBillCustomer();
        $c->companyName = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
        $res = $this->getService()->addCustomer($c);
        var_dump($res);
        $this->assertTrue(true);
    }*/

    /**
    public function testGetCustomerById()
    {
    $id = 5932093;
    $res = $this->getService()->getCustomer($id);
    var_dump($res);
    $this->assertTrue(true);
    }
     **/

    /**
    public function testGetCustomerByNumber()
    {
    $id = '10002';
    $res = $this->getService()->getCustomerByCustomerNumber($id);
    var_dump($res);
    $this->assertTrue(true);
    }
     **/

    /**
    public function testSearchDocuments()
    {
    $id = '10002';
    $res = $this->getService()->getCustomerByCustomerNumber($id);
    $res = $this->getService()->searchDocumentsByCustomer($res->customerID);
    var_dump($res);
    $this->assertTrue(true);
    }**/

    /*
    public function testCreateDocument()
    {
        $customer = $this->getService()->getCustomerByCustomerNumber('28014');
        $document = new \EasyBillPhpHelper\ValueObj\EasyBillDocument();
        $document->customerID = $customer->customerID;

        $position = $this->getService()->getCompanyPosition(1776);
        $document->addPosition(\EasyBillPhpHelper\ValueObj\EasyBillDocumentPosition::createFromCompanyPosition($position));
        #$document->addPosition(\EasyBillPhpHelper\ValueObj\EasyBillDocumentPosition::createFromCompanyPosition($position));

        $document->currency = \EasyBillPhpHelper\ValueObj\EasyBillDocument::CURRENCY_EUR;

        $res = $this->getService()->createDocument($document);
        $this->assertTrue(true);
    }**/

    /*
    public function testGetDocument()
    {
        var_dump($this->getService()->getDocumentFile(6851550));
        $this->assertTrue(true);
    }
    **/

    /**
    public function testAddPayment()
    {
        $documentFile =$this->getService()->getDocumentFile(6851550);
        $payment = new \EasyBillPhpHelper\ValueObj\EasyBillDocumentPayment();
        $payment->documentID = $documentFile->document->documentID;
        $payment->amount = 199;
        $payment->paymentdate = '2010-01-20';
        $payment->paymenttype = 'PayPal';
        $payment->notice = '';
        $payment->payed = false;
        $this->getService()->addPayment($payment);
        $this->assertTrue(true);
    }
    **/
}
