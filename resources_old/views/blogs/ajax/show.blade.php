
<div class="row">
<div class="col-md-8 col-md-offset-2">
<a href="{{route('blogs.index')}}" class="blogs-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i> <strong>View all blogs</strong></a>
</div>
</div>

<div class="row panel panel-info">
<div class="col-md-4 col-md-offset-2">
	<img src="{{asset('images/blogs/'.$blog->image)}}" style="width:60%; border: 2px solid gray;">
</div>
	<div class="col-md-6">
	<br><br>
	<table class="table">
		<tbody>
			<tr>
				<td class="col-md-4"><h4><strong>Blog Title</strong></h4></td><td style="word-break: break-all;"><h4>{{$blog->title}}</h4></td>
			</tr>
			<tr>
				<td class="col-md-4"><h4><strong>Body</strong></h4></td><td style="word-break: break-all;"><h4>{{$blog->body}}</h4></td>
			</tr>
			<tr>
			<td class="col-md-4"><h4><td><h4> 
		@if($blog->postedByUser!=null && $blog->postedByUser->role!=null)
          <td><strong>Posted by: </strong>{{$blog->postedByUser->name}} <label class="badge">{{$blog->postedByUser->role->roleName}}</label></td>
          @endif
          </h4></td>
				</tr>
		</tbody>
	</table>
	</div>
</div>
<div class="row">
<div class="col-md-10 col-md-offset-2"> 
<hr>
<div class="col-md-offset-6" style="word-break: break-all;">
			Created: <label class="label label-default">{{date('M j Y H:i', strtotime($blog->created_at))}}</label> 
			<a href="{{route('blogs.edit', $blog->id)}}" value="{{$blog->id}}" class="blogs-edit btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
			<a href="{{route('blogs.delete', $blog->id)}}" value="{{$blog->id}}" class="blogs-confirm-delete btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
		</div>
<br><br>
	</div>
	</div>
