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

// renders simple HTML pages
class MainController extends AbstractCommonController
{
	// handles unknown requst showing views/404.view.php
	function action_404()
	{
		// same as: return $this->view('404');
		return '404';
	}

	// handles index request showing views/index.view.php
	function action_index()
	{
		// render view views/index.view.php
		// using the model passed as an array to the second argument
		return $this->view(
			'index',
			array(
				'title' => 'Directory explorer'
			)
		);
	}
}

?>