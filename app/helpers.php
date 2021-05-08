<?php

use Carbon\Carbon;

if (! function_exists('testHelper')) {
    function testHelper() {
        return 'Working....';
    }
}
if (! function_exists('dateFormat')) {
    function dateFormat($date) {
      if ($date) {
            $dt = new DateTime($date);

        return $dt->format(' j F Y'); // 27/10/2021
    }

    }
}


if ( ! function_exists( 'getRouteInfo' ) ) {
	/**
	 * Get routing information
	 * @return array
	 */
	function getRouteInfo() {

		if ( ! App::runningInConsole() ) {

			

			$routeArray       = app( 'request' )->route()->getAction();

			$controllerAction = class_basename( $routeArray['controller'] );

			
			list( $controller, $action ) = explode( '@', $controllerAction );

			return [ 'controller' => $controller, 'action' => $action ];
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'getActiveClass' ) ) {
	/**
	 * Get Active Class information/ Active menus
	 * @return array
	 */
	function getActiveClass( $controllerArray = array(), $actionArray = array() ) {
		$routeArray = getRouteInfo();
		
		if ( ! empty( $routeArray ) && in_array( $routeArray['controller'], $controllerArray ) && in_array( $routeArray['action'], $actionArray ) ) {
			echo 'active';
		} else {
			echo '';
		}

	}
}

?>