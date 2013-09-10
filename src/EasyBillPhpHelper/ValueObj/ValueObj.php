<?php

namespace EasyBillPhpHelper\ValueObj;

use ___PHPSTORM_HELPERS\object;

/**
 * Class ValueObj
 *
 * @package EasyBillPhpHelper\ValueObj
 */
abstract class ValueObj
{

    /**
     * @param array $data
     */
    function __construct(array $data = array())
    {
        foreach ($data as $key => $value) $this->$key = $value;
    }

    /**
     * @param \stdClass[] $data
     *
     * @return ValueObj[]
     */
    public static function createFromArray(array $data)
    {
        $class = get_called_class();
        $return = array();
        foreach ($data as $row) {
            $return[] = new $class((array)$row);
        }
        return $return;
    }
}