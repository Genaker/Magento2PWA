
# PWA module for any magento store and Hyva Theme. No needs rewrite evererthing using silly PWA Studio

PWA extension for Magento 2. Just install and PWA is ready. 

# Magento (PWA)Progressive Web Applications Are Not a Magento PWA Studio

For some reason many think MAgento PWA are single page applications that require MAgento PWA Studio or other JavaScript based headless theme or Single Page APP (SPA).

This is wrong.

Magento PWA does not have to be a PWA Studio or custom JS based Theme or SPA.

I recommend against being a Magento PWA Studio:

Because Magento PWA Studio client-side JavaScript does not provide the better user experience developers think they do. In fact, they create a relatively poor user experience in most cases. Also good React developers cost more than legacy PHP MAgento developers.

MAgento marketers sels progressive web application is a custom development with the price tag $50K+. However you need just install this extension or add Manifest JS and Service worker to your existing MAgento store.

Magento PWA Studio is just another failed project from Magento.


## Installation 
### Type 1: Zip file

 - Unzip the zip file in `app/code/Genaker`
 - Enable the module by running `php bin/magento module:enable Genaker_PWA`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`
 - Generate JS ServiceWorker and Manifest files **`php bin/magento pwa:generate`**

### Type 2: Composer

 - Install the module composer by running `composer require genaker/module-pwa`
 - enable the module by running `php bin/magento module:enable Genaker_PWA`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`
 - Generate JS ServiceWorker and Manifest files **`php bin/magento pwa:generate`**


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


