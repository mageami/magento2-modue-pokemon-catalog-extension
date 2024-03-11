<?php
/**
 * Copyright © Fast White Cat S.A. All rights reserved.
 * See LICENSE_FASTWHITECAT for license details.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Service\Pokemon;

use Pokemon\CatalogExtension\Api\Data\PokemonInterface;
use Pokemon\CatalogExtension\Service\GetPokemonInterface;
use Pokemon\CatalogExtension\Model\PokemonCache as ModelPokemonCache;

class PokemonCache implements GetPokemonInterface
{
    /**
     * @param ModelPokemonCache $pokemonCache
     */
    public function __construct(
        private readonly ModelPokemonCache $pokemonCache
    ) {

    }

    /**
     * @inheritDoc
     */
    public function execute(string $name): ?PokemonInterface
    {
        return $this->pokemonCache->getCache($name);
    }
}
