<?php

namespace Speckcommerce\Uom;

use InvalidArgumentException;

final class Uom
{
    private $commonCode;
    private $name;
    private $description;
    private $symbol;
    private $conversionFactor;

    public function __construct(
        $commonCode,
        $name,
        $description = '',
        $symbol = '',
        $conversionFactor = ''
    ) {
        if (empty($commonCode) || empty($name)) {
            throw new InvalidArgumentException('UoM requires common code and name');
        }
        $this->commonCode       = strtoupper((string) $commonCode);
        $this->name             = (string) $name;
        $this->description      = (string) $description;
        $this->symbol           = (string) $symbol;
        $this->conversionFactor = (string) $conversionFactor;
    }

    /**
     * Common unit of measurement code. 2-3 symbol alphanumeric string
     *
     * @return string
     */
    public function getCommonCode()
    {
        return $this->commonCode;
    }

    /**
     * Name of the unit of measurement
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Description of the unit of measurement
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * String representing unit
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Conversion factor for reference. Not usable for calculations
     *
     * @return string
     */
    public function getConversionFactor()
    {
        return $this->conversionFactor;
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getCommonCode();
    }
}
