
# PWA module for any magento store. No needs rewrite evererthing using PWA Studio

PWA extension for Magento 2. Just install and PWA is ready. 

## Installation 
### Type 1: Zip file

 - Unzip the zip file in `app/code/Genaker`
 - Enable the module by running `php bin/magento module:enable Genaker_PWA`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`
 - Flush the cache by running `php bin/magento pwa:generate`

### Type 2: Composer

 - Install the module composer by running `composer require genaker/module-pwa`
 - enable the module by running `php bin/magento module:enable Genaker_PWA`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - Name (pwa/pwa_settings/name)

 - Short Name (pwa/pwa_settings/short_name)

 - Scope (pwa/pwa_settings/scope)

 - Display Mode (pwa/pwa_settings/display)

 - Start URL (pwa/pwa_settings/start_url)

 - Background Color (pwa/pwa_settings/background_color)

 - Description (pwa/pwa_settings/description)

 - Icons JSON (pwa/pwa_settings/icons)

 - complete manifest json (pwa/pwa_settings/manifest_json)

 - Theme Color  (pwa/pwa_settings/theme_color)


