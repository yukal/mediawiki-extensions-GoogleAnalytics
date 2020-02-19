<?php
/**
 * GoogleAnalytics Hooks
 * https://www.mediawiki.org/wiki/Manual:Hooks
 * https://www.mediawiki.org/wiki/Template:MediaWikiHook
 *
 * @file
 * @ingroup Extensions
 * @version 1.0
 * @author Alexander Yukal <yukal@email.ua>
 * @license https://opensource.org/licenses/MIT MIT License
 */

namespace MediaWiki\Extension\GoogleAnalytics;

class Hooks {

	private static $template = '
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=%s"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());
  gtag(\'config\', \'%s\');
</script>
';

	/**
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/BeforePageDisplay
	 * @param \OutputPage $out The OutputPage object
	 * @param \Skin $skin Skin object that will be used to generate the page
	 *
	 * @return void
	 */
	public static function onBeforePageDisplay( \OutputPage $out, \Skin $skin ) {
		$config = $out->getConfig();
		$accountId = $config->get('GoogleAnalyticsAccountId');
		$showOnSpecials = $config->get('GoogleAnalyticsShowOnSpecials');

		if (!$showOnSpecials && $skin->getTitle()->isSpecialPage()) {
			$out->addHeadItem('GoogleAnalyticsInformer', '<!-- GoogleAnalytics: Not allowed on special pages -->');
			return ;
		}

		if ($accountId !== '') {
			$out->addHeadItem('GoogleAnalytics', sprintf(self::$template, $accountId, $accountId));
		} else {
			$out->addHeadItem('GoogleAnalyticsInformer', '<!-- GoogleAnalytics: Account ID not passed -->');
		}
	}

}
