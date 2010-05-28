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

// master.view.php
$this->setMaster('master');

$this->renderPartial('parts/js');

?>


<table width="100%" border="0">
	<tr>
		<td width="50%">
			<input type="button" name="refresh" value="Refresh" onclick="do_refresh()" />
			<span id="extra_actions">
				<input type="text" name="dir_name" id="dir_name" value="" />
				<input type="button" name="create_dir" value="Create dir" onclick="do_create_dir()" />
			</span>
		</td>
		<td style="text-align:right">
			<div id="known" style="display:none">
				<span id="logged_in_name"></span>
				<input type="button" name="logout" value="Logout" onclick="do_logout()" />
			</div>
			<div id="unknown">
				<input type="text" name="login_name" id="login_name" value="root" />
				<input type="button" name="login" value="Login" onclick="do_login()" />
			</div>

		</td>
	</tr>
</table>

<hr />

<div id="items">
</div>

<script type="text/javascript">
window.onload = do_refresh;
</script>
