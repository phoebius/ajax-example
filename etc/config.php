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

//
// application config
//

set_include_path(
	  APP_ROOT .DIRECTORY_SEPARATOR . 'lib' . PATH_SEPARATOR
	. APP_ROOT .DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'lib' . PATH_SEPARATOR
	. get_include_path()
);

define('BUGS_EMAIL', 'bugs@host.com');

define('BROWSE_ROOT', APP_ROOT . DIRECTORY_SEPARATOR . 'www' . DIRECTORY_SEPARATOR . 'tmp');

?>