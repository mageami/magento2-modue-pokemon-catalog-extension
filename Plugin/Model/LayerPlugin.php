<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Plugin\Model;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Block\Product\ListProduct;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;
use Pokemon\CatalogExtension\Api\Data\PokemonInterface;
use Pokemon\CatalogExtension\Service\GetPokemonInterface;
use Pokemon\CatalogExtension\Setup\Patch\Data\AddPokemonAttribute;

class LayerPlugin
{
    /**
     * @param GetPokemonInterface $getPokemon
     */
    public function __construct(
        private readonly GetPokemonInterface $getPokemon
    ) {

    }

    /**
     * @param ListProduct        $subject
     * @param AbstractCollection $collection
     *
     * @return AbstractCollection
     */
    public function afterGetLoadedProductCollection(
        ListProduct $subject,
        AbstractCollection $collection
    ): AbstractCollection {
        foreach ($collection as $product) {
            $pokemonName = $product->getCustomAttribute(AddPokemonAttribute::ATTRIBUTE_CODE)?->getValue();

            if ($pokemonName) {
                $pokemon = $this->getPokemon->execute($pokemonName);
                if (null !== $pokemon) {
                    $product->setName($pokemon->getName());
                    $this->setPokemonExtensionAttribute($product, $pokemon);
                }
            }
        }

        return $collection;
    }

    /**
     * @param ProductInterface      $product
     * @param PokemonInterface|null $pokemon
     *
     * @return void
     */
    private function setPokemonExtensionAttribute(ProductInterface $product, ?PokemonInterface $pokemon): void
    {
        $productExtensionAttributes = $product->getExtensionAttributes();

        if (null === $productExtensionAttributes->getPokemonData()) {
            $product->setExtensionAttributes($productExtensionAttributes->setPokemonData($pokemon));
        }
    }
}
