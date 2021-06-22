<div id="ajaxContent">

<div class="row col-md-12">
<a class="abouts-create btn btn-success btn-xs navbar-right" href="{{route('abouts.create')}}"><i class="fa fa-plus"></i> Add New About</a>

</div>
<div class="row">

	<div class="panel panel-info col-md-12 col-md-offset-0">
	<h2><label class="badge bg-green">{{$abouts!=null? $abouts->count(): 0}}</label> abouts of  <label class="badge">{{$abouts->total()}}</label> total abouts</h2>
@if(count($abouts)>0)
    <table class="table table-striped">
			<thead>
				<th>about Title</th>
            <th>Body</th>
        		<th>Posted By</th>
				    <th></th>
			</thead>
			<tbody>
			<?php $counter=1; ?>

				@foreach($abouts as $about)
				<tr>
          <td>{{$about->title}}</td>
					<td>{{$about->body}}</td>
           <td>
           @if($about->posedByUser!=null && $about->posedByUser->role!=null)
         {{$about->posedByUser()->name}} <label class="badge">{{$about->posedByUser()->role->roleName}}</label>
          @endif
          </td>
					<td>
<ul class="nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   Actions
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-aboutmenu pull-right">
                    <li>
                    <a class="abouts-show btn btn-lg" href="{{route('abouts.show', $about->id)}}" value="{{$about->id}}">
                       <i class="fa fa-eye"></i> View 
                       </a>
                    </li>
                    <li>
                      <a class="abouts-edit btn btn-lg" href="{{route('abouts.edit', $about->id)}}" value="{{$about->id}}">
                       <i class="fa fa-edit"></i> Edit 
                       </a>
                    </li>
                    <li><a class="abouts-confirm-delete btn btn-lg" href="{{route('abouts.delete', $about->id)}}" value="{{$about->id}}"><i class="fa fa-trash"></i> Delete 
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
{{$abouts->links()}}
</div>    
@else
  <div class="col-md-12"><hr><h2 class="col-md-offset-2"> ብዛዕባ ቢሮ ሲቪል ሰርቪሰ ክልል ትግራይ ዝተመዝገበ መረዳእታ የለን</h2></div>
@endif
	</div>
</div>

</div>

<script type="text/javascript">
  /*--------------abouts pagination--------------*/

$('#ajaxntent').load('route(abouts.index)');
$(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    if ( $(this).attr('href') != '#' ) {
        $("#ajaxContent").animate({ scrollTop: 0 }, "fast");
        $('#ajaxContent').empty().load($(this).attr('href'));
        activateUrl('abouts?page='+$(this).text());
    }
});
</script>