
<div class="row">
<div class="col-md-8 col-md-offset-2">
<a href="{{route('blogs.index')}}" class="blogs-index btn btn-success btn-xs navbar-right"><i class="fa fa-eye"></i> <strong>View all blogs</strong></a>
			<h3>blog ID: {{$blog->id}} <small>Delete in process</small></h3> <br>
</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1 class="text-danger">Are you sure to delete this blog?</h1>
<a href="{{route('blogs.destroy', $blog->id)}}" value="{{$blog->id}}" class="blogs-delete btn btn-danger btn-lg"><i class="fa fa-trash"></i> Yes! Delete</a>

<a href="{{route('blogs.index')}}" class="blogs-index btn btn-default btn-lg"> No! Cancel</a>
</div>
</div>

<div class="row panel panel-info">

	<div class="col-md-8 col-md-offset-2">
	<br><br>
	<table class="table">
		<tbody>
			<tr>
				<td class="col-md-4"><h4><strong>Blog Title</strong></h4></td><td><h4>{{$blog->title}}</h4></td>
			</tr>
			<tr>
				<td class="col-md-4"><h4><strong>Body</strong></h4></td><td><h4>{{$blog->body}}</h4></td>
			</tr>
			<tr>
			<td class="col-md-4"><h4><strong>Posted by </strong></h4></td><td><h4> 
		@if($blog->posedByUser!=null && $blog->posedByUser->role!=null)
          <td>{{$blog->posedByUser()->name}} <label class="badge">{{$blog->posedByUser()->role->roleName}}</label></td>
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
			Created: <label class="label label-default">{{date('M j Y H:i', strtotime($blog->created_at))}}</label> 
		</div>
<br><br>
	</div>
