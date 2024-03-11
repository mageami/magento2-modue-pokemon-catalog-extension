<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Service;

use Pokemon\CatalogExtension\Api\Data\PokemonInterface;
use Psr\Log\LoggerInterface;

class GetPokemon implements GetPokemonInterface
{
    /**
     * @param GetPokemonInterface $api
     * @param GetPokemonInterface $cache
     * @param ResponseParser      $responseParser
     * @param LoggerInterface     $logger
     */
    public function __construct(
        private readonly GetPokemonInterface $api,
        private readonly GetPokemonInterface $cache,
        private readonly ResponseParser      $responseParser,
        private readonly LoggerInterface     $logger
    ) {

    }

    /**
     * @param string $name
     *
     * @return PokemonInterface|null
     */
    public function execute(string $name): ?PokemonInterface
    {
        try {
            return $this->cache->execute($name) ?: $this->api->execute($name);
        } catch (\Exception $e) {
            $this->logger->critical($e->getMessage(), ['exception' => $e]);
            $this->logger->debug($e->getTraceAsString());
        }

        return null;
    }
}
