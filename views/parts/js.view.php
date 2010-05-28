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
		"/ajax/PublicAjax/authorize/",
		{ name: name },
		function(data){
			if (data.error)
				alert(data.error)
			else {
				set_known(data.name)
				auth.name = data.name
				auth.authtoken = data.authtoken;
			}
		}
	);
}
</script>
