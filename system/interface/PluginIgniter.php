<style>
.pluginigniter h2 {
	font-size: 30px;
	line-height: 40px;
}
.pluginigniter h1, h2, h3, h4, h5, h6 {
	margin: 10px 0;
	font-family: inherit;
	font-weight: bold;
	line-height: 1;
	color: inherit;
	text-rendering: optimizelegibility;
}
.pluginigniter .page-header {
	padding-bottom: 9px;
	margin: 20px 0 30px;
	border-bottom: 1px solid #EEE;
}
.pluginigniter h2 small {
	font-size: 18px;
}
.pluginigniter h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
	font-weight: normal;
	line-height: 1;
	color: #999;
}
.pluginigniter .table {
	width: 100%;
	margin-bottom: 20px;
}
.pluginigniter table {
	max-width: 100%;
	background-color: transparent;
	border-collapse: collapse;
	border-spacing: 0;
}
.pluginigniter thead {
	display: table-header-group;
	vertical-align: middle;
	border-color: inherit;
}
.pluginigniter thead tr td {
	font-weight:bold;
}
.pluginigniter tr {
	display: table-row;
	vertical-align: inherit;
	border-color: inherit;
}
.pluginigniter .table caption + thead tr:first-child th, .table caption + thead tr:first-child td, .table colgroup + thead tr:first-child th, .table colgroup + thead tr:first-child td, .table thead:first-child tr:first-child th, .table thead:first-child tr:first-child td {
	border-top: 0;
}
.pluginigniter .table th, .table td {
	padding: 8px;
	line-height: 20px;
	text-align: left;
	vertical-align: top;
	border-top: 1px solid #DDD;
}
.pluginigniter tbody {
	display: table-row-group;
	vertical-align: middle;
	border-color: inherit;
}
.pluginigniter table {
	border-collapse: collapse;
	border-spacing: 0;
}
</style>
<div class="pluginigniter" style="padding:15px;">
	<div class="page-header">
		<h2>WP PluginIgniter <small>Version <?=PI_SYS_VERSION?></small></h2>
	</div>
	<table class="table">
		<thead>
			<tr>
				<td>System Constant Name</td>
				<td>System Constant Value</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>PLUGINPATH</td>
				<td><?=PLUGINPATH?></td>
			</tr>
			<tr>
				<td>BASEPATH</td>
				<td><?=BASEPATH?></td>
			</tr>
			<tr>
				<td>SYSDIR</td>
				<td><?=SYSDIR?></td>
			</tr>
			<tr>
				<td>FCPATH</td>
				<td><?=FCPATH?></td>
			</tr>
			<tr>
				<td>ENVIRONMENT</td>
				<td><?=ENVIRONMENT?></td>
			</tr>
		</tbody>
	</table>
</div>