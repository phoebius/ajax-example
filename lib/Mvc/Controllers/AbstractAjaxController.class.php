<?php
/* ***********************************************************************************************
 *
 * Phoebius Framework
 *
 * **********************************************************************************************
 *
 * Copyright (c) 2010 phoebius.org
 *
 * This program is free software; you can redistribute it and/or modify it under the terms
 * of the GNU Lesser General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * this program; if not, see <http://www.gnu.org/licenses/>.
 *
 ************************************************************************************************/

// simplifies handling ajax requests by wrapping the results of
// defined action methods
// action method may produce the following results:
//  - array - it will be converted to JSON
//  - string - it will be treated as an error message and will be wrapped by an object
//             and then converted to json: { error: <string> }
abstract class AbstractAjaxController extends AbstractCommonController
{
	// allow action methods to returns the following values:
	//  - array will be converted to a JSON
	//  - string will be treated as an error message
	protected function makeActionResult($actionResult)
	{
		if (is_array($actionResult)) {
			return new JsonResult($actionResult);
		}

		if (is_scalar($actionResult)) {
			return new JsonResult(array(
				"error" => $actionResult
			));
		}

		return parent::makeActionResult($actionResult);
	}
}

?>