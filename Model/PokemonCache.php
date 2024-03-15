<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Model;

use Magento\Framework\App\CacheInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Pokemon\CatalogExtension\Api\Data\PokemonInterface;
use Pokemon\CatalogExtension\Model\Cache\Type;

class PokemonCache
{
    private const CACHE_LIFE_TIME = 86400;

    /**
     * @param CacheInterface      $cache
     * @param SerializerInterface $serializer
     */
    public function __construct(
        private readonly CacheInterface      $cache,
        private readonly SerializerInterface $serializer
    ) {

    }

    /**
     * @param string $name
     * @param PokemonInterface  $data
     *
     * @return bool
     */
    public function saveCache(string $name, PokemonInterface $data): bool
    {
        return $this->cache->save(
            $this->serialize($data),
            $this->getCacheKey($name),
            [Type::CACHE_TAG],
            self::CACHE_LIFE_TIME
        );
    }

    /**
     * @param string $name
     *
     * @return string
     */
    private function getCacheKey(string $name): string
    {
        return sprintf('%s_%s', Type::TYPE_IDENTIFIER, $name);
    }

    /**
     * @param string $name
     *
     * @return PokemonInterface|null
     */
    public function getCache(string $name): ?PokemonInterface
    {
        $cachedData = $this->cache->load($this->getCacheKey($name));

        return empty($cachedData) ? null : $this->unserialize($cachedData);
    }
}
