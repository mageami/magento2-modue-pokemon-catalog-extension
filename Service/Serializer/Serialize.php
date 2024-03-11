<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Service\Serializer;

use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\Serialize\Serializer\Serialize as BaseSerialize;

class Serialize extends BaseSerialize implements SerializerInterface
{
    /**
     * {@inheritDoc}
     */
    public function unserialize($string)
    {
        if (false === $string || null === $string || '' === $string) {
            throw new \InvalidArgumentException('Unable to unserialize value.');
        }
        set_error_handler(
            function () {
                restore_error_handler();
                throw new \InvalidArgumentException('Unable to unserialize value, string is corrupted.');
            },
            E_NOTICE
        );
        // We have to use unserialize here
        // phpcs:ignore Magento2.Security.InsecureFunction
        $result = unserialize($string, ['allowed_classes' => true]);
        restore_error_handler();

        return $result;
    }
}
