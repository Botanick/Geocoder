<?php

namespace Geocoder\Model;

use Geocoder\Exception\InvalidArgument;

final class Accuracy
{
    /**
     * @var double
     */
    private $value = 0.0;
    /**
     * @var string
     */
    private $providerValue = null;

    /**
     * @param double $value
     * @param null $providerValue
     */
    public function __construct(
        $value = 0.0,
        $providerValue = null
    ) {
        if ($value < 0 || $value > 1) {
            throw new InvalidArgument(sprintf('Accuracy value should be a double in [0, 1], %f given', $value));
        }

        $this->value = $value;
        $this->providerValue = $providerValue;
    }

    /**
     * Returns flattened accuracy value
     *
     * @return double
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns accuracy as received from provider
     *
     * @return string
     */
    public function getProviderValue()
    {
        return $this->providerValue;
    }

    /**
     * Returns accuracy as array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'value' => $this->getValue(),
            'providerValue' => $this->getProviderValue(),
        ];
    }
}