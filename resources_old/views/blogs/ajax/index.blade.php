<div id="ajaxContent">

<div class="row col-md-12">
<a class="blogs-create btn btn-success btn-xs navbar-right" href="{{route('blogs.create')}}"><i class="fa fa-plus"></i> Add New blog</a>

</div>
<div class="row">

	<div class="panel panel-info col-md-12 col-md-offset-0">
	<h2><label class="badge bg-green">{{$blogs!=null? $blogs->count(): 0}}</label> blogs of  <label class="badge">{{$blogs->total()}}</label> total blogs</h2>
@if(count($blogs)>0)
    <table class="table table-striped">
			<thead>
				<th class="col-md-2">Blog Title</th>
            <th>Body</th>
        		<th>Posted By</th>
				    <th class="col-md-2"></th>
				
			</thead>
			<tbody>
			<?php $counter=1; ?>

				@foreach($blogs as $blog)
				<tr>
          <td style="word-break: break-all;">{{$blog->title}}</td>
					<td style="word-break: break-all;">{{$blog->body}}</td>
          <td>
          @if($blog->postedByUser!=null && $blog->postedByUser->role!=null)
          {{$blog->postedByUser->name}} <strong>Role:</strong> <label class="badge">{{$blog->postedByUser->role->roleName}}</label>
          @endif
					</td>
          <td>
					
<ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   Actions
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-blogmenu pull-right">
                    <li>
                    <a class="blogs-show btn btn-lg" href="{{route('blogs.show', $blog->id)}}" value="{{$blog->id}}">
                       <i class="fa fa-eye"></i> View 
                       </a>
                    </li>
                    <li>
                      <a class="blogs-edit btn btn-lg" href="{{route('blogs.edit', $blog->id)}}" value="{{$blog->id}}">
                       <i class="fa fa-edit"></i> Edit 
                       </a>
                    </li>
                    <li><a class="blogs-confirm-delete btn btn-lg" href="{{route('blogs.delete', $blog->id)}}" value="{{$blog->id}}"><i class="fa fa-trash"></i> Delete 
                    </a></li>
                  </ul>
                </li>
</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
<div class="col-md-12">
{{$blogs->links()}}
</div>    
@else
  <div class="col-md-12"><hr><h2 class="col-md-offset-2">ዝተመዝገቡ መረዳእታታት የለውን</h2></div>
@endif
	</div>
</div>

</div>
