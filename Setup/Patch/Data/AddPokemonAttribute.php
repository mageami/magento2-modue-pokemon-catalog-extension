<?php
/**
 * Copyright © AmiCode All rights reserved.
 */

declare(strict_types=1);

namespace Pokemon\CatalogExtension\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class AddPokemonAttribute implements DataPatchInterface, PatchRevertableInterface
{
    public const ATTRIBUTE_CODE = 'pokemon_name';
    public const ATTRIBUTE_LABEL = 'Pokemon name';
    public const ATTRIBUTE_ORDER = 1000;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory          $eavSetupFactory
     */
    public function __construct(
        private readonly ModuleDataSetupInterface $moduleDataSetup,
        private readonly EavSetupFactory          $eavSetupFactory
    ) {

    }

    /**
     * @inheritDoc
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * @return $this
     */
    public function apply(): self
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        if (!$eavSetup->getAttributeId(Product::ENTITY, self::ATTRIBUTE_CODE)) {

            $eavSetup->addAttribute(
                Product::ENTITY,
                self::ATTRIBUTE_CODE,
                [
                    'type' => 'varchar',
                    'label' => __(self::ATTRIBUTE_LABEL),
                    'group' => 'General',
                    'input' => 'text',
                    'required' => false,
                    'backend' => '',
                    'frontend' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'filterable' => true,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'is_used_in_grid' => true,
                    'user_defined' => true,
                    'used_for_promo_rules' => true,
                    'apply_to' => ''
                ]
            );

            foreach ($eavSetup->getAllAttributeSetIds(Product::ENTITY) as $attributeSetId) {
                $eavSetup->addAttributeToGroup(
                    Product::ENTITY,
                    $attributeSetId,
                    'General',
                    self::ATTRIBUTE_CODE,
                    self::ATTRIBUTE_ORDER
                );
            }
        }
        $this->moduleDataSetup->getConnection()->endSetup();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function revert(): void
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->removeAttribute(Product::ENTITY, self::ATTRIBUTE_CODE);
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @inheritDoc
     */
    public function getAliases(): array
    {
        return [];
    }
}
