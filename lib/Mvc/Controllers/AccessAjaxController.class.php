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

abstract class AccessAjaxController extends AbstractAjaxController
{
	protected function processAction($action, ReflectionMethod $method)
	{
		// check for credentials here
		$request = $this->getTrace()->getWebContext()->getRequest();
		try {
			$authid = $request->getVar("authtoken");
			$name = $request->getVar("name");

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