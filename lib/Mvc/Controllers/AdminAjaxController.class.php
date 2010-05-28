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

// handles common admin requests (authentication is performed
// by the base controller)
class AdminAjaxController extends AuthenticationAjaxController
{
	// creates a directory at BROWSE_ROOT
	// correct result: { created: true }
	function action_create_dir($dir)
	{
		if (
				empty($dir)
				|| $dir == '.'
				|| $dir == '..'
		) {
			return 'dir cannot be empty or have auxiliary name';
		}

		if (false !== strpos('.', $dir)) {
			return 'dir cannot contain dots';
		}

		if (is_dir(BROWSE_ROOT . DIRECTORY_SEPARATOR . $dir)) {
			return 'dir already exists';
		}

		try {
			mkdir(BROWSE_ROOT . DIRECTORY_SEPARATOR . $dir);
		}
		catch (Exception $e) {
			return $e->getMessage();
		}

		return array('created' => true);
	}
}

?>