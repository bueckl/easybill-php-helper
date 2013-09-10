<?php

namespace EasyBillPhpHelper\ValueObj;

/**
 * Class EasyBillDocumentFile
 * @package EasyBillPhpHelper\ValueObj
 *
 * @property mixed            fileName
 * @property mixed            file
 * @property EasyBillDocument document
 * @property mixed            signDocument
 * @property mixed            sentasemail
 * @property mixed            sentaspost
 */
class EasyBillDocumentFile extends ValueObj
{
    /**
     * @param array $data
     */
    function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            if ($key == 'document') $this->$key = new EasyBillDocument((array)$value);
            else $this->$key = $value;
        }
    }

}
