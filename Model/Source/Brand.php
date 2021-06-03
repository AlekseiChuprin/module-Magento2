<?php


namespace Study\RandomProducts\Model\Source;

/**
 * Class Brand
 * @package Study\RandomProducts\Model\Source
 */
class Brand extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * brand constant
     */
    const PUMA = 'puma';

    /**
     * brand constant
     */
    const NIKE = 'nike';

    /**
     * brand constant
     */
    const ADIDAS = 'adidas';

    /**
     * @return array|array[]|null
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('--Select--'), 'value' => ''],
                ['label' => __('Puma'), 'value' => self::PUMA],
                ['label' => __('Nike'), 'value' => self::NIKE],
                ['label' => __('Adidas'), 'value' => self::ADIDAS],
            ];
        }
        return $this->_options;
    }
}
