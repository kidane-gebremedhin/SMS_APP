<div id="ajaxContent">

<div class="row col-md-10">
<a class="currency_types-create btn btn-success btn-xs navbar-right" href="{{route('currency_types.create')}}"><i class="fa fa-plus"></i> Add currency type</a>

</div>
<div class="row">

	<div class="panel panel-info col-md-10 col-md-offset-1">
{{$currency_types->links()}}
	<h2><label class="badge bg-green">{{$currency_types!=null? $currency_types->count(): 0}}</label> <label class="badge">currency types of {{$currency_types->total()}}</label> total currency types</h2>
@if($currency_types!=null)
		<table class="table table-striped">
			<thead>
        		<th>ID</th>
				<th>Name</th>
				<th>Icon</th>
        		<th>Description</th>
				<th></th>
				
			</thead>
			<tbody>
			<?php $counter=1; ?>

				@foreach($currency_types as $currency_type)
				<tr>
          			<td>{{$currency_type->id}}</td>
					<td>{{$currency_type->name}}</td>
					<td>{{$currency_type->icon}}</td>
					<td>
					{{strlen($currency_type->description)>50? substr($currency_type->description, 0, 50).'...': $currency_type->description}}</td>
					<td>
					
<ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   Actions
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-currency_typemenu pull-right">
                    <li>
                    <a class="currency_types-show btn btn-lg" href="{{route('currency_types.show', $currency_type->id)}}" value="{{$currency_type->id}}">
                       <i class="fa fa-eye"></i> View 
                       </a>
                    </li>
                    <li>
                      <a class="currency_types-edit btn btn-lg" href="{{route('currency_types.edit', $currency_type->id)}}" value="{{$currency_type->id}}">
                       <i class="fa fa-edit"></i> Edit 
                       </a>
                    </li>
                    <li><a class="currency_types-confirm-delete btn btn-lg" href="{{route('currency_types.delete', $currency_type->id)}}" value="{{$currency_type->id}}"><i class="fa fa-trash"></i> Delete 
                    </a></li>
                  </ul>
                </li>
</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
@else
	<div class="panel"><h2>There are no Currency types.</h2></div>
@endif
	</div>
</div>

</div>
