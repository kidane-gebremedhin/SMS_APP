
<div class="row">
<div class="col-md-8 col-md-offset-2">
<a href="{{route('currency_types.index')}}" class="currency_types-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i> <strong>View all currency types</strong></a>
			<h3>Currency type ID: {{$currency_type->id}} <small>details</small></h3> <br>
</div>
</div>

<div class="row panel panel-info">

	<div class="col-md-8 col-md-offset-2">
	<br><br>
	<table class="table">
		<tbody>
			<tr>
				<td class="col-md-4"><h4><strong>Name</strong></h4></td><td><h4>{{$currency_type->name}}</h4></td>
			</tr>
			<tr>
				<td class="col-md-4"><h4><strong>Icon</strong></h4></td><td><h4>{{$currency_type->icon}}</h4></td>
			</tr>
			<tr>
				<td class="col-md-4"><h4><strong>Description</strong></h4></td><td><h4>{{$currency_type->description}}</h4></td>
			</tr>
		</tbody>
	</table>
	</div>
</div>
<div class="col-md-10 col-md-offset-2">
		 
<hr>
<div class="col-md-offset-6">
			Created: <label class="label label-default">{{date('M j Y H:i', strtotime($currency_type->created_at))}}</label> 
			<a href="{{route('currency_types.edit', $currency_type->id)}}" value="{{$currency_type->id}}" class="currency_types-edit btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
			<a href="{{route('currency_types.delete', $currency_type->id)}}" value="{{$currency_type->id}}" class="currency_types-confirm-delete btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
		</div>
<br><br>
	</div>
