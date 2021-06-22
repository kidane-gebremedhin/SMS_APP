<div class="col-md-8">
	<div class="panel panel-success">
		<div class="panel-heading">
			{{App\Global_var::getLangString('Detail', $language_strings)}}

			@if($currentUser->isGranted('transfer_categories.index'))
			<a href="{{route('transfer_categories.index')}}" class="get btn btn-success btn-sm pull-right" nextUrl="{{route('transfer_categories.index')}}"><i class="fa fa-eye"></i>  
				{{App\Global_var::getLangString('List', $language_strings)}}
			</a> 		
		@endif
		</div>
		<div class="panel-body">
			<table class="table">
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Name', $language_strings)}}</strong></td><td><h4>{{$transfer_category->name}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Priority', $language_strings)}}</strong></td><td><h4>{{$transfer_category->priority}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Level', $language_strings)}}</strong></td><td><h4>{{$transfer_category->level}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Description', $language_strings)}}</strong></td><td><h4>{!! $transfer_category->remark !!}</h4></td>
					</tr>
				</tbody>
			</table>

<div class="col-md-12">
<hr>
	<div class="col-md-12">
	{{App\Global_var::getLangString('Created_By', $language_strings)}}:
	<label class="label label-default">{{$transfer_category->createdByUser!=null? $transfer_category->createdByUser->username():''}}</label>

	{{App\Global_var::getLangString('Updated_By', $language_strings)}}:
	<label class="label label-default">{{$transfer_category->updatedByUser!=null? $transfer_category->updatedByUser->username():''}}	</label>
	<br>

	{{App\Global_var::getLangString('Created_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($transfer_category->created_at))}}</label>
	{{App\Global_var::getLangString('Updated_At', $language_strings)}}:
	<label class="label label-default">{{date('M j Y h:i', strtotime($transfer_category->updated_at))}}</label> 		 

</div>
</div>
<div class="col-md-12">
<hr>
	<div class="col-md-4 pull-right">

	@if($currentUser->isGranted('transfer_categories.edit'))
	<a href="{{route('transfer_categories.edit', $transfer_category->id)}}" value="{{$transfer_category->id}}" class="get btn btn-sm btn-primary" nextUrl="{{route('transfer_categories.edit', $transfer_category->id)}}"><i class="fa fa-edit"></i> 
		{{App\Global_var::getLangString('Edit', $language_strings)}}
	</a>
	@endif
	@if($currentUser->isGranted('transfer_categories.delete'))
	<a href="{{route('transfer_categories.delete', $transfer_category->id)}}" value="{{$transfer_category->id}}" class="get btn btn-sm btn-danger" nextUrl="{{route('transfer_categories.delete', $transfer_category->id)}}"><i class="fa fa-trash"></i> 
		{{App\Global_var::getLangString('Delete', $language_strings)}}
	</a>
@endif
</div>
</div>
		</div>
	</div>

</div>

