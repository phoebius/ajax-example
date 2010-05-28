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

// a common abstract controller is needed to define and encapsulate
// methods that are related to all areas of the application
abstract class AbstractCommonController extends ActionBasedController
{
	// make an authtoken that signs an authorized client by its login
	protected function getAuthToken($name)
	{
		return sha1(__FILE__ . $name);
	}
}

?>