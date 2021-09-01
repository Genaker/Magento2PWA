
# PWA module for any magento store and Hyva Theme. No needs rewrite evererthing using silly PWA Studio

PWA extension for Magento 2. Just install and PWA is ready. 

After installation of this plugin you will have ALL PWA feature available for your Magento 2 web site.

Progressive web app (PWA), is the latest browser feature that allows anyone to use web sites as native mobile or desktop apps. It is not a Magento feature. You don't need expensive redesign to use PWA.

PWA is simply a website acting as a mobile app. Unlike mobile apps, they don’t have to be downloaded from an app store. 

With PWAs, users can get app-like experiences they save to their home screens, with lightning speed and mobile-first design without needing to actually build an app for both iOS and Android. 

PWAs allow for modern web capabilities, including background sync, offline browsing, barcode scanning, and even push notifications. 

# Magento (PWA)Progressive Web Applications Are Not a Magento PWA Studio

For some reason many think MAgento PWA are single page applications that require MAgento PWA Studio or other JavaScript based headless theme or Single Page APP (SPA).

This is wrong.

Magento PWA does not have to be a PWA Studio or custom JS based Theme or SPA.

I recommend against being a Magento PWA Studio:

Because Magento PWA Studio client-side JavaScript does not provide the better user experience developers think they do. In fact, they create a relatively poor user experience in most cases. Also good React developers cost more than legacy PHP MAgento developers.

MAgento marketers sels progressive web application is a custom development with the price tag $50K+. However you need just install this extension or add Manifest JS and Service worker to your existing MAgento store.

Magento PWA Studio is just another failed project from Magento.


## Installation 

**Note!** We are expireancing the issue: A New Packagist Composer packages are not available using Composer V1. You need upgrade Composer to V2. New packages will only be visible to Composer 2. 

To install this NEW Magento PWA extension you must have Composer V2 to upgrade use command: 

```
composer self-update --2
```
See screanshot:

![composer-upgrade](https://user-images.githubusercontent.com/9213670/129279251-c6e7a1bc-94e3-4486-8625-e6929b77d626.jpg)

PS: this issue was fixed by warmupping the composer API V1. Composer V1 shuld also works. 


### Type 1: Zip file

 - Unzip the zip file in `app/code/Genaker`
 - Enable the module by running `php bin/magento module:enable Genaker_PWA`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`
 - Generate JS ServiceWorker and Manifest files **`php bin/magento pwa:generate`**
 
 **Note: You can add that generated files to the git and don't generate this files on production**

### Type 2: Composer

 - Install the module composer by running `composer require genaker/module-pwa`
 - enable the module by running `php bin/magento module:enable Genaker_PWA`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`
 - Generate JS ServiceWorker and Manifest files **`php bin/magento pwa:generate`**
 **Note: You can add that generated files to the git and don't generate this files on production**


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
