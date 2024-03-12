<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Service;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Stdlib\ArrayManager;
use Pokemon\CatalogExtension\Api\Data\PokemonInterface;
use Pokemon\CatalogExtension\Api\Data\PokemonInterfaceFactory;
use Pokemon\Client\Api\FieldRetrieverInterface;

class ResponseParser
{
    /**
     * @param PokemonInterfaceFactory $pokemonFactory
     * @param DataObjectHelper        $dataObjectHelper
     * @param ArrayManager            $arrayManager
     * @param array                   $fieldRetriever
     */
    public function __construct(
        private readonly PokemonInterfaceFactory $pokemonFactory,
        private readonly DataObjectHelper        $dataObjectHelper,
        private readonly ArrayManager            $arrayManager,
        private array                            $fieldRetriever = []
    ) {
        $this->fieldRetriever = array_filter(
            $this->fieldRetriever,
            static fn($arg) => $arg instanceof FieldRetrieverInterface
        );
    }

    /**
     * @param array $data
     *
     * @return PokemonInterface
     */
    public function execute(array $data): PokemonInterface
    {
        $values = [];

        /** @var FieldRetrieverInterface $fieldRetriever */
        foreach ($this->fieldRetriever as $fieldRetriever) {
            $values = $this->arrayManager->set(
                $fieldRetriever->getFieldName(),
                $values,
                $fieldRetriever->getValue($data)
            );
        }

        /** @var PokemonInterface $pokemon */
        $pokemon = $this->pokemonFactory->create();

        $pokemon->setId((int)$values['id']);
        $pokemon->setName($values['name'] ?? null);
        $pokemon->setImageUrl($values['image_url'] ?? null);
        $pokemon->setAbilities($values['abilities']);
        $pokemon->setBaseExperience($values['base_experience'] ?? null);
        $pokemon->setCries($values['cries'] ?? null);
        $pokemon->setForms($values['forms'] ?? null);
        $pokemon->setGameIndices($values['game_indices'] ?? null);
        $pokemon->setHeldItems($values['held_items'] ?? null);
        $pokemon->setIsDefault($values['is_default'] ?? null);
        $pokemon->setLocationAreaEncounters($values['location_area_encounters'] ?? null);
        $pokemon->setMoves($values['moves'] ?? null);
        $pokemon->setPastAbilities($values['past_abilities'] ?? null);
        $pokemon->setPastTypes($values['past_types'] ?? null);
        $pokemon->setSpecies($values['species'] ?? null);
        $pokemon->setSprites($values['sprites'] ?? null);
        $pokemon->setStats($values['stats'] ?? null);
        $pokemon->setTypes($values['types'] ?? null);
        $pokemon->setWeight($values['weight'] ?? null);

        return $pokemon;
    }
}
