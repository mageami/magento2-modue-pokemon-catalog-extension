<?php
/**
 * Copyright © Fast White Cat S.A. All rights reserved.
 * See LICENSE_FASTWHITECAT for license details.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Service\Pokemon;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Serialize\SerializerInterface;
use Pokemon\CatalogExtension\Api\Data\PokemonInterface;
use Pokemon\CatalogExtension\Service\GetPokemonInterface;
use Pokemon\CatalogExtension\Service\ResponseParser;
use Pokemon\Client\Api\ClientInterface;
use Pokemon\Client\Api\Data\RequestInterface;
use Pokemon\Client\Api\RequestBuilderInterface;

class PokemonApi implements GetPokemonInterface
{
    private const API_URL = '/api/v2/pokemon/';

    /**
     * @param ClientInterface         $client
     * @param RequestBuilderInterface $requestBuilder
     * @param SerializerInterface     $serializer
     * @param ResponseParser          $responseParser
     */
    public function __construct(
        private readonly ClientInterface $client,
        private readonly RequestBuilderInterface $requestBuilder,
        private readonly SerializerInterface $serializer,
        private readonly ResponseParser $responseParser
    ) {

    }

    /**
     * @inheritDoc
     * @throws NoSuchEntityException
     */
    public function execute(string $name): ?PokemonInterface
    {
        $this->requestBuilder->setUri(sprintf('%s%s/', self::API_URL, $name));
        $this->requestBuilder->setRequestMethod(RequestInterface::METHOD_GET_NAME);
        $response = $this->client->call($this->requestBuilder->create());

        try {
            $data = $this->serializer->unserialize($response->getBody());
        } catch (\Exception $e) {
            throw new \RuntimeException('Malformed response data!');
        }

        if (count($data ?? []) === 0) {
            throw new NoSuchEntityException(__('There is not such pokemon with name %1', $name));
        }

        return $this->responseParser->execute($data ?? []);
    }
}
