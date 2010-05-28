<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2009 phoebius.org
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
 *
 ************************************************************************************************/

// encapsulates an authentication layer to check whether access is
// granted to the requests handled by the action methods of the descendants
// of this controller or not
abstract class AuthenticationAjaxController extends AbstractAjaxController
{
	// overloads the logic of invokation of the method
	// adding a precheck: ``authtoken'' and ``name'' variables
	// should be presented in the reuqest
	protected function processAction($action, ReflectionMethod $method)
	{
		// check for credentials here
		$request = $this->getTrace()->getWebContext()->getRequest();
		try {
			$authid = $request["authtoken"];
			$name = $request["name"];

			if ($authid != $this->getAuthToken($name)) {
				return "authentication failed";
			}
		}
		catch (Exception $e) {
			return "missing `name` or `authtoken`";
		}

		return parent::processAction($action, $method);
	}
}

?>