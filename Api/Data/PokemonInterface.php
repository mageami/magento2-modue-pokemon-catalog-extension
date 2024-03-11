<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Api\Data;

interface PokemonInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self;

    /**
     * @return array|null
     */
    public function getAbilities(): ?array;

    /**
     * @param array|null $abilities
     *
     * @return $this
     */
    public function setAbilities(?array $abilities): self;

    /**
     * @return int|null
     */
    public function getBaseExperience(): ?int;

    /**
     * @param int|null $baseExperience
     *
     * @return $this
     */
    public function setBaseExperience(?int $baseExperience): self;

    /**
     * @return array|null
     */
    public function getCries(): ?array;

    /**
     * @param array|null $cries
     *
     * @return self
     */
    public function setCries(?array $cries): self;

    /**
     * @return array|null
     */
    public function getForms(): ?array;

    /**
     * @param array|null $forms
     *
     * @return $this
     */
    public function setForms(?array $forms): self;

    /**
     * @return array|null
     */
    public function getGameIndices(): ?array;

    /**
     * @param array|null $gameIndices
     *
     * @return $this
     */
    public function setGameIndices(?array $gameIndices): self;

    /**
     * @return array|null
     */
    public function getHeldItems(): ?array;

    /**
     * @param array|null $heldItems
     *
     * @return $this
     */
    public function setHeldItems(?array $heldItems): self;

    /**
     * @return bool
     */
    public function isDefault(): bool;

    /**
     * @param bool $isDefault
     *
     * @return $this
     */
    public function setIsDefault(bool $isDefault): self;

    /**
     * @return array|null
     */
    public function getMoves(): ?array;

    /**
     * @param array|null $moves
     *
     * @return $this
     */
    public function setMoves(?array $moves): self;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     *
     * @return $this
     */
    public function setName(?string $name): self;

    /**
     * @return int|null
     */
    public function getOrder(): ?int;

    /**
     * @param int|null $order
     *
     * @return $this
     */
    public function setOrder(?int $order): self;

    /**
     * @return array|null
     */
    public function getPastAbilities(): ?array;

    /**
     * @param array|null $pastAbilities
     *
     * @return $this
     */
    public function setPastAbilities(?array $pastAbilities): self;

    /**
     * @return array|null
     */
    public function getPastTypes(): ?array;

    /**
     * @param array|null $pastTypes
     *
     * @return $this
     */
    public function setPastTypes(?array $pastTypes): self;

    /**
     * @return array|null
     */
    public function getSpecies(): ?array;

    /**
     * @param array|null $species
     *
     * @return $this
     */
    public function setSpecies(?array $species): self;

    /**
     * @return array|null
     */
    public function getSprites(): ?array;

    /**
     * @param array|null $sprites
     *
     * @return $this
     */
    public function setSprites(?array $sprites): self;

    /**
     * @return array|null
     */
    public function getStats(): ?array;

    /**
     * @param array|null $stats
     *
     * @return $this
     */
    public function setStats(?array $stats): self;

    /**
     * @return array|null
     */
    public function getTypes(): ?array;

    /**
     * @param array|null $types
     *
     * @return $this
     */
    public function setTypes(?array $types): self;

    /**
     * @return int|null
     */
    public function getWeight(): ?int;

    /**
     * @param int|null $weight
     *
     * @return $this
     */
    public function setWeight(?int $weight): self;

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string;

    /**
     * @param string|null $imageUrl
     *
     * @return $this
     */
    public function setImageUrl(?string $imageUrl): self;

    /**
     * @return string|null
     */
    public function getHeight(): ?string;

    /**
     * @param string|null $height
     *
     * @return $this
     */
    public function setHeight(?string $height): self;

    /**
     * @return string|null
     */
    public function getLocationAreaEncounters(): ?string;

    /**
     * @param string|null $locationAreaEncounters
     *
     * @return $this
     */
    public function setLocationAreaEncounters(?string $locationAreaEncounters): PokemonInterface;
}
