<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Model\Cache;

use Magento\Framework\App\Cache\Type\FrontendPool;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;

class Type extends TagScope
{
    public const TYPE_IDENTIFIER = 'api_pokemon_cache';
    public const CACHE_TAG = 'API_POKEMON_CACHE';

    /**
     * @param FrontendPool $cacheFrontendPool
     */
    public function __construct(private readonly FrontendPool $cacheFrontendPool)
    {
        parent::__construct($cacheFrontendPool->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}
