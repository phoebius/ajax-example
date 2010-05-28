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