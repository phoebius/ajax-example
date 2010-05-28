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

?>

<script type="text/javascript">

var auth = { name: '', authtoken: '' }

function do_login()
{
	authorize(get_name())
}

function do_logout()
{
	set_unknown();
	auth.authtoken = '';
	auth.name = '';
}

function do_create_dir()
{
	create_dir($("#dir_name").val())
}

function do_refresh()
{
	refresh_items()
}

function set_name(name)
{
	$("#logged_in_name").html(name)
}

function get_name()
{
	return $("#login_name").val();
}

function set_known(name)
{
	$("#known").show()
	$("#extra_actions").show()
	$("#unknown").hide()
	set_name(name);
}

function set_unknown()
{
	$("#unknown").show()
	$("#known").hide()
	$("#extra_actions").hide()
}

// ajax requests
function refresh_items() {
	$("#items").html("")
	$.getJSON(
		"/ajax/PublicAjax/get_items/",
		{},
		function(data) {
			data.items.forEach(function(v, k) {
				append_item(v)
			})
		}
	);
}

function append_item(dir)
{
	$("#items").append(dir + "<br />")
}

function create_dir(dir) {
	$.getJSON(
		"/ajax/AdminAjax/create_dir/",
		{
			dir: dir,
			name: auth.name,
			authtoken: auth.authtoken
		},
		function(data) {
			if (data.error)
				alert(data.error)
			else {
				append_item(dir)
				$("#dir_name").val("")
			}
		}
	)
}

function authorize(name) {
	$.getJSON(
		"/authorize/",
		{ name: name },
		function(data){
			set_known(data.name)
			auth.name = data.name
			auth.authtoken = data.authtoken;
		}
	);
}
</script>

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