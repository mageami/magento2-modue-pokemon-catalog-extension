<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Plugin\Block\Product\View;

use Magento\Catalog\Block\Product\View\Gallery;
use Magento\Framework\DataObject;
use Magento\Framework\Data\Collection;
use Magento\Framework\Data\CollectionFactory;

class GalleryPlugin
{
    /**
     * @param CollectionFactory $dataCollectionFactory
     */
    public function __construct(
        private readonly CollectionFactory $dataCollectionFactory
    ) {

    }

    /**
     * @param Gallery    $subject
     * @param Collection $images
     *
     * @return Collection
     */
    public function afterGetGalleryImages(Gallery $subject, Collection $images): Collection
    {
        $pokemonImageUrl = $subject->getProduct()?->getExtensionAttributes()?->getPokemonData()?->getImageUrl();

        if ($pokemonImageUrl) {
            try {
                $product = $subject->getProduct();
                $images = $this->dataCollectionFactory->create();
                $productName = $product->getName();
                $imageId = uniqid();
                $image = [
                    'file' => $pokemonImageUrl,
                    'media_type' => 'image',
                    'value_id' => $imageId,
                    'row_id' => $imageId,
                    'label' => $productName,
                    'label_default' => $productName,
                    'position' => 100,
                    'position_default' => 100,
                    'disabled' => 0,
                    'url' => $pokemonImageUrl,
                    'path' => '',
                    'small_image_url' => $pokemonImageUrl,
                    'medium_image_url' => $pokemonImageUrl,
                    'large_image_url' => $pokemonImageUrl
                ];

                $images->addItem(new DataObject($image));
            } catch (\Exception $e) {
                return $images;
            }
        }

        return $images;
    }
}
