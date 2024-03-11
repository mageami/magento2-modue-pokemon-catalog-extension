<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Service;

use Pokemon\CatalogExtension\Api\Data\PokemonInterface;

interface GetPokemonInterface
{
    /**
     * @param string $name
     *
     * @return PokemonInterface|null
     */
    public function execute(string $name): ?PokemonInterface;
}
