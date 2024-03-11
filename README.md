# Pokemon API Catalog Extension
The module presents downloaded data from PoKemon API on the product list and the product page.

### Version
1.0.0

### Compatibility
- Magento Open Source 2.4.3, 2.4.4
- Magento Commerce 2.4.3, 2.4.4
- Not tested on other versions

## Requirements
- Magento 2
- Pokomon_Client
- Composer

### Installation
The recommended way to install this extension is via composer:

```shell
composer config repositories.mageami-pokemon-catalog git git@github.com:mageami/magento2-pokemon-catalog-extension.git
composer require mageami/magento2-pokemon-catalog-extension:dev-master
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento c:cl
php bin/magent c:fl
```

#### Change log

##### 10.03.2024 1.0.0
- Init repository
