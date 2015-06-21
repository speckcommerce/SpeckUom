<?php

namespace Speckcommerce\Uom;

class UomList
{
    /**
     * @var $uomArray array
     */
    private static $uomArray;

    public function __construct()
    {
        if (!isset(self::$uomArray)) {
            self::$uomArray = require __DIR__ . '/../data/cefact_codes.php';
        }
    }

    /**
     * find UoM by common code
     *
     * @param string $commonCode
     * @return Uom|null
     */
    public function find($commonCode)
    {
        $commonCode = strtoupper($commonCode);

        if (!array_key_exists($commonCode, self::$uomArray)) {
            return null;
        }

        return new Uom(
            self::$uomArray[$commonCode]['commoncode'],
            self::$uomArray[$commonCode]['name'],
            self::$uomArray[$commonCode]['description'],
            self::$uomArray[$commonCode]['symbol'],
            self::$uomArray[$commonCode]['conversion_factor']
        );
    }

    /**
     *
     * @return array
     */
    public function getAll()
    {
        // @TODO Should it return array of Uom objects instead?
        return self::$uomArray;
    }
}
