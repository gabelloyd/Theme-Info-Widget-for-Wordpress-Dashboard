=== Theme Info Widget ===
Contributors: gabelloyd
Donate link: https://longtailcreative.com
Tags: wordpress, dashboard
Requires at least: 4.4
Tested up to: 4.7.3
Stable tag: 1.0.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Display theme name, version number, and developer contact info in a widget on the Wordpress dashboard.

== Description ==

Display theme name, version number, and developer contact info in a widget on the Wordpress dashboard.

== Usage ==

Place some text here, explaining how to use this plugin. Keep it clear and easy to read (short sentences).

== Installation ==

Installing "Theme Info Widget" can be done either by searching for "Theme Info Widget" via the "Plugins > Add New" screen in your WordPress dashboard, or by using the following steps:

1. Download the plugin via Github.
1. Upload the ZIP file through the "Plugins > Add New > Upload" screen in your WordPress dashboard.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Visit the settings screen and configure, as desired.

If you want to use this in your theme as a Must Use plugin, you need to create a proxy file within your `mu-plugins` folder. 

```
<?php // mu-plugins/load.php
require WPMU_PLUGIN_DIR.'/ltc-theme-info-widget/ltc-theme-info-widget.php';
```

== Frequently Asked Questions ==

= How do I contribute? =

We encourage everyone to contribute their ideas, thoughts and code snippets. This can be done by forking the [repository over at GitHub](http://github.com/gabelloyd/ltc-theme-info-widget/).

== Screenshots ==

1. The settings screen.


== Upgrade Notice ==

= 1.0.0 =
* March 15, 2017
* Initial release. Woo!

== Changelog ==

= 1.0.0 =
* March 15, 2017
* Initial release. Woo!