<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Plugin\Catalog;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductSearchResultsInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Pokemon\CatalogExtension\Api\Data\PokemonInterface;
use Pokemon\CatalogExtension\Service\GetPokemonInterface;
use Pokemon\CatalogExtension\Setup\Patch\Data\AddPokemonAttribute;

class ProductRepositoryPlugin
{
    /**
     * @param GetPokemonInterface $getPokemon
     */
    public function __construct(
        private readonly GetPokemonInterface $getPokemon
    ) {

    }

    /**
     * @param ProductRepositoryInterface $subject
     * @param ProductInterface           $result
     *
     * @return ProductInterface
     */
    public function afterGet(ProductRepositoryInterface $subject, ProductInterface $result): ProductInterface
    {
        $this->addPokemonData($result);

        return $result;
    }

    /**
     * @param ProductRepositoryInterface $subject
     * @param ProductInterface           $result
     *
     * @return ProductInterface
     */
    public function afterGetById(ProductRepositoryInterface $subject, ProductInterface $result): ProductInterface
    {
        $this->addPokemonData($result);

        return $result;
    }

    /**
     * @param ProductInterface $product
     *
     * @return void
     */
    private function addPokemonData(ProductInterface $product): void
    {
        $pokemonName = $product->getCustomAttribute(AddPokemonAttribute::ATTRIBUTE_CODE)?->getValue();

        if ($pokemonName) {
            $pokemon = $this->getPokemon->execute($pokemonName);
            $this->updateProduct($product, $pokemon);
            $this->setPokemonExtensionAttribute($product, $pokemon);
        }
    }

    /**
     * @param ProductInterface|null $product
     * @param PokemonInterface|null $pokemon
     *
     * @return void
     */
    private function updateProduct(?ProductInterface $product, ?PokemonInterface $pokemon): void
    {
        if (null !== $pokemon) {
            $product->setName($pokemon->getName());
        }
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

        if (null === $productExtensionAttributes->getPokemonData() && null !== $pokemon) {
            $product->setExtensionAttributes($productExtensionAttributes->setPokemonData($pokemon));
        }
    }

    /**
     * @param ProductRepositoryInterface    $subject
     * @param ProductSearchResultsInterface $productSearchResults
     * @param SearchCriteriaInterface       $searchCriteria
     *
     * @return ProductSearchResultsInterface
     */
    public function afterGetList(
        ProductRepositoryInterface $subject,
        ProductSearchResultsInterface $productSearchResults,
        SearchCriteriaInterface $searchCriteria
    ) : ProductSearchResultsInterface {

        foreach ($productSearchResults->getItems() as $product) {
            if (!$product->getId()) {
                return $productSearchResults;
            }

            $this->addPokemonData($product);
        }

        return $productSearchResults;
    }
}
