
<div class="row">
<div class="col-md-8 col-md-offset-2">
<a href="{{route('abouts.index')}}" class="abouts-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i> <strong>View all abouts</strong></a>
</div>
</div>

<div class="row panel panel-info">

	<div class="col-md-8 col-md-offset-2">
	<br><br>
	<table class="table">
		<tbody>
			<tr>
				<td class="col-md-4"><h4><strong>about Title</strong></h4></td><td><h4>{{$about->title}}</h4></td>
			</tr>
			<tr>
				<td class="col-md-4"><h4><strong>Body</strong></h4></td><td><h4>{{$about->body}}</h4></td>
			</tr>
			<tr>
			<td class="col-md-4"><h4><td><h4> 
		@if($about->postedByUser!=null && $about->postedByUser->role!=null)
          <td><strong>Posted by: </strong>{{$about->postedByUser->name}} <label class="badge">{{$about->postedByUser->role->roleName}}</label></td>
          @endif
          </h4></td>
				</tr>
		</tbody>
	</table>
	</div>
</div>
<div class="col-md-10 col-md-offset-2">
		 
<hr>
<div class="col-md-offset-6">
			Created: <label class="label label-default">{{date('M j Y H:i', strtotime($about->created_at))}}</label> 
			<a href="{{route('abouts.edit', $about->id)}}" value="{{$about->id}}" class="abouts-edit btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
			<a href="{{route('abouts.delete', $about->id)}}" value="{{$about->id}}" class="abouts-confirm-delete btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
		</div>
<br><br>
	</div>
