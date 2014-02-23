<?php

class Sape {
    public static function wfSapeSidebar( Skin $skin, &$bar ) {
	global $IP, $wgServer, $wgSapeUserID;
	
	// Return $bar unchanged if not all values have been set.
	if ( $wgSapeUserID == 'none' ) {
	    return $bar;
	}
	
	if ( $skin->getUser()->isLoggedIn() ) {
	    return $bar;
        }

       	define( '_SAPE_USER', $wgSapeUserID );

	require_once( "$IP/$wgSapeUserID/sape.php" );
	
	$sape = new SAPE_client(array(
	    'host' => $wgServer,
	    'charset' => 'UTF-8'
	));

	$out = $sape->return_links();
	
	if ( strstr($out, 'href') !== FALSE ) {
	    $out = '<ul><li>'.$out.'</li></ul>';
	}
	
	$bar['sape-sidebar-heading'] = $out;
	return true;
    }
}
