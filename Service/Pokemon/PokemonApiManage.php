<?php
/**
 * Copyright © Fast White Cat S.A. All rights reserved.
 * See LICENSE_FASTWHITECAT for license details.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Service\Pokemon;

use Pokemon\CatalogExtension\Api\Data\PokemonInterface;
use Pokemon\CatalogExtension\Service\GetPokemonInterface;
use Pokemon\CatalogExtension\Model\PokemonCache;

class PokemonApiManage  implements GetPokemonInterface
{
    /**
     * @param GetPokemonInterface $api
     * @param PokemonCache        $pokemonCache
     */
    public function __construct(
        private readonly GetPokemonInterface $api,
        private readonly PokemonCache $pokemonCache
    ) {

    }

    /**
     * @inheritDoc
     */
    public function execute(string $name): ?PokemonInterface
    {
        $pokemon = $this->api->execute($name);
        $this->pokemonCache->saveCache($name, $pokemon);

        return $pokemon;
    }
}
