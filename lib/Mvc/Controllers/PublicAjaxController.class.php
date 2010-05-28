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

// handle public-accessed ajax requests
class PublicAjaxController extends AbstractAjaxController
{
	// processes an authorization by a provided name
	// if name can be authorized (e.g., it is empty) then
	// authorization failes.
	// $name is taken from the request automatically (from $_REQUEST)
	// correct result is: { name, authtoken }
	function action_authorize($name)
	{
		if (empty($name))
			return 'authorization failed';

		return array(
			"name" => $name,
			"authtoken" => $this->getAuthToken($name)
		);
	}

	// gets the list of items inside the directory
	// correct result: { items: [item1, item2, ..., itemN] }
	function action_get_items()
	{
		$items = scandir(BROWSE_ROOT);

		return array(
			"items" => $items
		);
	}
}

?>