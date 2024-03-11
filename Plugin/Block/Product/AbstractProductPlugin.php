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
                $image['width'] = "240";
                $image['height'] = "300";
                $image['label'] = $product->getName();
                $image['ratio'] = "1.25";
                $image['custom_attributes'] = "";
                $image['resized_image_width'] = "399";
                $image['resized_image_height'] = "399";
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
