<?php


namespace Study\RandomProducts\Block;


class RandomProduct extends \Magento\Framework\View\Element\Template
{
    /**
     * const COUNT_RANDOM_PRODUCTS
     */
    const COUNT_RANDOM_PRODUCTS = 3;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $productCollection;

    /**
     * @var \Magento\Framework\Pricing\Helper\Data
     */
    protected $priceHelper;

    /**
     * @var \Magento\Catalog\Helper\Image
     */
    protected $imageHelper;

    /**
     * RandomProduct constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory
     * @param \Magento\Framework\Pricing\Helper\Data $priceHelper
     * @param \Magento\Catalog\Helper\Image $imageHelper
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        \Magento\Framework\Pricing\Helper\Data $priceHelper,
        \Magento\Catalog\Helper\Image $imageHelper
    )
    {
        parent::__construct($context);
        $this->productCollection = $collectionFactory;
        $this->priceHelper = $priceHelper;
        $this->imageHelper = $imageHelper;
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getRandomProduct()
    {
        $randomProducts = $this->productCollection->create();
        $randomProducts->addAttributeToSelect(['name', 'price', 'thumbnail', 'show_yes_no', 'custom_dropdown']);
        $randomProducts->setPageSize(self::COUNT_RANDOM_PRODUCTS);
        $randomProducts->getSelect()->orderRand();
        $randomProducts->setVisibility([\Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH]);

        return $randomProducts;
    }

    /**
     * @param $price
     * @return float|string
     */
    public function getFormattedPrice($price)
    {
        return $this->priceHelper->currency($price, true, false);
    }

    public function getImageUrl($product)
    {
        return $this->imageHelper->init($product, 'product_thumbnail_image')->getUrl();
    }
}
