<?php
/**
 * Copyright © Fast White Cat S.A. All rights reserved.
 * See LICENSE_FASTWHITECAT for license details.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Model;

use Pokemon\CatalogExtension\Api\Data\PokemonInterface;

class Pokemon implements PokemonInterface
{
    private int $id;
    private ?array $abilities;
    private ?int $baseExperience;
    private ?array $cries;
    private ?string $height;
    private ?string $imageUrl;
    private ?int $weight;
    private ?array $types;
    private ?array $stats;
    private ?array $species;
    private ?array $pastTypes;
    private ?array $pastAbilities;
    private ?int $order;
    private ?string $name;
    private ?array $moves;
    private ?bool $isDefault;
    private ?array $heldItems;
    private ?array $gameIndices;
    private ?array $forms;
    private ?string $locationAreaEncounters;
    private ?array $sprites;

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setId(int  $id): PokemonInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAbilities(): ?array
    {
        return $this->abilities;
    }

    /**
     * @inheritDoc
     */
    public function setAbilities(?array $abilities): PokemonInterface
    {
        $this->abilities = $abilities;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getBaseExperience(): ?int
    {
        return $this->baseExperience;
    }

    /**
     * @inheritDoc
     */
    public function setBaseExperience(?int $baseExperience): PokemonInterface
    {
        $this->baseExperience = $baseExperience;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCries(): ?array
    {
        return $this->cries;
    }

    /**
     * @inheritDoc
     */
    public function setCries(?array $cries): PokemonInterface
    {
        $this->cries = $cries;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getForms(): ?array
    {
        return $this->forms;
    }

    /**
     * @inheritDoc
     */
    public function setForms(?array $forms): PokemonInterface
    {
        $this->forms = $forms;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getGameIndices(): ?array
    {
        return $this->gameIndices;
    }

    /**
     * @inheritDoc
     */
    public function setGameIndices(?array $gameIndices): PokemonInterface
    {
        $this->gameIndices = $gameIndices;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getHeldItems(): ?array
    {
        return $this->heldItems;
    }

    /**
     * @inheritDoc
     */
    public function setHeldItems(?array $heldItems): PokemonInterface
    {
        $this->heldItems = $heldItems;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @inheritDoc
     */
    public function setIsDefault(bool $isDefault): PokemonInterface
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getMoves(): ?array
    {
        return $this->moves;
    }

    /**
     * @inheritDoc
     */
    public function setMoves(?array $moves): PokemonInterface
    {
        $this->moves = $moves;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setName(?string $name): PokemonInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * @inheritDoc
     */
    public function setOrder(?int  $order): PokemonInterface
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPastAbilities(): ?array
    {
        return $this->pastAbilities;
    }

    /**
     * @inheritDoc
     */
    public function setPastAbilities(?array $pastAbilities): PokemonInterface
    {
        $this->pastAbilities = $pastAbilities;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPastTypes(): ?array
    {
        return $this->pastTypes;
    }

    /**
     * @inheritDoc
     */
    public function setPastTypes(?array $pastTypes): PokemonInterface
    {
        $this->pastTypes = $pastTypes;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSpecies(): ?array
    {
        return $this->species;
    }

    /**
     * @inheritDoc
     */
    public function setSpecies(?array $species): PokemonInterface
    {
        $this->species = $species;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getSprites(): ?array
    {
        return $this->sprites;
    }

    /**
     * @param array|null $sprites
     *
     * @return $this
     */
    public function setSprites(?array $sprites): self
    {
        $this->sprites = $sprites;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStats(): ?array
    {
        return $this->stats;
    }

    /**
     * @inheritDoc
     */
    public function setStats(?array $stats): PokemonInterface
    {
        $this->stats = $stats;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @inheritDoc
     */
    public function setTypes(?array $types): PokemonInterface
    {
        $this->types = $types;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getWeight(): ?int
    {
        return $this->weight;
    }

    /**
     * @inheritDoc
     */
    public function setWeight(?int $weight): PokemonInterface
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @inheritDoc
     */
    public function setImageUrl(?string $imageUrl): PokemonInterface
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getHeight(): ?string
    {
        return $this->height;
    }

    /**
     * @inheritDoc
     */
    public function setHeight(?string $height): PokemonInterface
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getLocationAreaEncounters(): ?string
    {
        return $this->locationAreaEncounters;
    }

    /**
     * @inheritDoc
     */
    public function setLocationAreaEncounters(?string $locationAreaEncounters): PokemonInterface
    {
        $this->locationAreaEncounters = $locationAreaEncounters;

        return $this;
    }
}
