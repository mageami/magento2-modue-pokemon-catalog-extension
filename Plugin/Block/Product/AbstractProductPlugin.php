<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Plugin\Block\Product;

use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Block\Product\Image;
use Magento\Catalog\Model\Product;

class AbstractProductPlugin
{
    private const IMAGE_WIDTH = '240';
    private const IMAGE_HEIGHT = '300';
    private const RATIO = '1.25';
    private const RESIZED_IMAGE_WIDTH = '399';
    private const RESIZED_IMAGE_HEIGHT = '399';

    /**
     * @param AbstractProduct $subject
     * @param Image           $result
     * @param Product         $product
     * @param string          $imageId
     * @param array           $attributes
     *
     * @return Image
     */
    public function afterGetImage(
        AbstractProduct $subject,
        Image           $result,
        Product         $product,
        string          $imageId,
        array           $attributes
    ): Image {

        $pokemonImageUrl = $product?->getExtensionAttributes()?->getPokemonData()?->getImageUrl();
        try {
            if ($pokemonImageUrl) {
                $image = [];
                $image['image_url'] = $pokemonImageUrl;
                $image['width'] = self::IMAGE_WIDTH;
                $image['height'] = self::IMAGE_HEIGHT;
                $image['label'] = $product->getName();
                $image['ratio'] = self::RATIO;
                $image['custom_attributes'] = '';
                $image['resized_image_width'] = self::RESIZED_IMAGE_WIDTH;
                $image['resized_image_height'] = self::RESIZED_IMAGE_HEIGHT;
                $image['custom_attributes'] = [];
                $image['product_id'] = $product->getId();
                if ($image) {
                    $result->setData($image);
                }
            }
        } catch (\Exception $e) {
        }

        return $result;
    }
}
