<?php

if (!defined('MEDIAWIKI')) {
    die();
}

/*
 * The following settings must be made in your LocalSettings.php.
*/
$wgSapeUserID = 'none';

// Define localisation and body files
$wgAutoloadClasses['Sape'] = dirname( __FILE__ ).'/Sape.body.php';
$wgExtensionMessagesFiles['Sape'] = dirname( __FILE__ ).'/Sape.i18n.php';

// Extention Credits
$wgExtensionCredits['other'][] = array(
    'path' => __FILE__,
    'name' => 'Sape',
    'author' => 'Artem Klevtsov',
    'url' => 'https://github.com/unikum/MediaWiki-Sape',
    'version' => '0.1',
    'descriptionmsg' => 'sape-desc'
);

// Register sidebar hook
$wgHooks['SkinBuildSidebar'][] = 'Sape::wfSapeSidebar';
