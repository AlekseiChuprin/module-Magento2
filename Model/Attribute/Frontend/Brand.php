<?php


namespace Study\RandomProducts\Model\Attribute\Frontend;

/**
 * Class Brand
 * @package Study\RandomProducts\Model\Attribute\Frontend
 */
class Brand extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    /**
     * @param \Magento\Framework\DataObject $object
     * @return string
     */
    public function getValue(\Magento\Framework\DataObject $object)
    {
        return '<b>' . $object->getData($this->getAttribute()->getAttributeCode()) . '</b>';
    }
}

