{assign var=label_rep from=['active'=>'success','pending'=>'info','locked'=>'danger','suspended'=>'warning','canceled'=>'warning','expired'=>'danger','terminated'=>'danger']}
{literal}
<style type="text/css">
	.filterable {
		margin-top: 15px;
	}
	.filterable .panel-heading .pull-right {
		margin-top: -20px;
	}
	.filterable .filters input[disabled] {
		background-color: transparent;
		border: none;
		cursor: auto;
		box-shadow: none;
		padding: 0;
		height: auto;
	}
	.filterable .filters input[disabled]::-webkit-input-placeholder {
		color: #333;
	}
	.filterable .filters input[disabled]::-moz-placeholder {
		color: #333;
	}
	.filterable .filters input[disabled]:-ms-input-placeholder {
		color: #333;
	}
	.padding-left { padding-left: 10px; }
	.color-red { color: #FF0000; }
	.color-green { color: #6cbc42; }
	.color-blue { color: #0080c5; }
</style>
{/literal}
<div class="container">
	<div class="row">
		<div class="panel panel-primary filterable">
			<div class="panel-heading">
				<h3 class="panel-title">Users</h3>
				<div class="pull-right">
					<button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
				</div>
			</div>
			<table class="table table-hover">
				<thead>
					<tr class="filters">
						<th><input type="text" class="form-control" placeholder="#" disabled></th>
						<th><input type="text" class="form-control" placeholder="First Name" disabled></th>
						<th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
						<th><input type="text" class="form-control" placeholder="Username" disabled></th>
						<th><input type="text" class="form-control" placeholder="Actions" disabled></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
						<td><a href="#" style="padding-right: 10px;" title="Edit User"><i class="glyphicon glyphicon-edit color-blue"></i></a> <a href="#" style="padding-right: 10px;" title="Account History"><i class="glyphicon glyphicon-time color-green"></i></a> <a href="#" style="padding-right: 10px" title="Delete User"><i class="glyphicon glyphicon-remove-sign color-red"></i></a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
						<td><a href="#" style="padding-right: 10px;" title="Edit User"><i class="glyphicon glyphicon-edit color-blue"></i></a> <a href="#" style="padding-right: 10px;" title="Account History"><i class="glyphicon glyphicon-time color-green"></i></a> <a href="#" style="padding-right: 10px" title="Delete User"><i class="glyphicon glyphicon-remove-sign color-red"></i></a></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
						<td><a href="#" style="padding-right: 10px;" title="Edit User"><i class="glyphicon glyphicon-edit color-blue"></i></a> <a href="#" style="padding-right: 10px;" title="Account History"><i class="glyphicon glyphicon-time color-green"></i></a> <a href="#" style="padding-right: 10px" title="Delete User"><i class="glyphicon glyphicon-remove-sign color-red"></i></a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
{literal}
<script type="text/javascript">
	/*
	Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
	*/
	$(document).ready(function(){
		$('.filterable .btn-filter').click(function(){
			var $panel = $(this).parents('.filterable'),
			$filters = $panel.find('.filters input'),
			$tbody = $panel.find('.table tbody');
			if ($filters.prop('disabled') == true) {
				$filters.prop('disabled', false);
				$filters.first().focus();
			} else {
				$filters.val('').prop('disabled', true);
				$tbody.find('.no-result').remove();
				$tbody.find('tr').show();
			}
		});

		$('.filterable .filters input').keyup(function(e){
			/* Ignore tab key */
			var code = e.keyCode || e.which;
			if (code == '9') return;
			/* Useful DOM data and selectors */
			var $input = $(this),
			inputContent = $input.val().toLowerCase(),
			$panel = $input.parents('.filterable'),
			column = $panel.find('.filters th').index($input.parents('th')),
			$table = $panel.find('.table'),
			$rows = $table.find('tbody tr');
			/* Dirtiest filter function ever ;) */
			var $filteredRows = $rows.filter(function(){
				var value = $(this).find('td').eq(column).text().toLowerCase();
				return value.indexOf(inputContent) === -1;
			});
			/* Clean previous no-result if exist */
			$table.find('tbody .no-result').remove();
			/* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
			$rows.show();
			$filteredRows.hide();
			/* Prepend no-result row if all rows are filtered */
			if ($filteredRows.length === $rows.length) {
				$table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
			}
		});
	});
</script>
{/literal}