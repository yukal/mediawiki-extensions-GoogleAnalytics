# mediawiki-extensions-GoogleAnalytics

This extension attaches the Google Analytics script into the MediaWiki pages

## Install
See how to [install extensions](https://www.mediawiki.org/wiki/Manual:Extensions#Installing_an_extension)

Download, unpack, rename the unpacked directory to `GoogleAnalytics` and then just put this directory with the scripts into `MediaWiki` extensions directory.

Find the `LocalSettings.php` file in the root of `MediaWiki` directory and paste this code
```php
// Google Analytics
wfLoadExtension( 'GoogleAnalytics' );

// Paste here your Google Analytics account id
$wgGoogleAnalyticsAccountId = "XX-XXXXXXXXX-X";

// Set this flag to true, if you want to attach Google Analytics script on special pages
// default is false
$wgGoogleAnalyticsShowOnSpecials = true;
```
That's all. This extension is not using the upgradable mechanism. You don't need to find out how to run `upgrading an extension`
