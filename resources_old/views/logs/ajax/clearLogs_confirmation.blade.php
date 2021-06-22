<div class="col-md-12">
		<div class="col-md-6 col-md-offset-3" style="border: 1px solid red">
		<h2 class="text-danger" style="font-family: algerian">
			{{App\Global_var::getLangString('Are_you_sure_to_Clear_All_Logs', $language_strings)}}
			<hr>
	@if($currentUser->isGranted('logs.logsAll'))			
			<a href="{{route('logs.logsAll')}}" class="get_ btn btn-success btn-block" nextUrl="{{route('logs.clearLogs')}}"> 
				{{App\Global_var::getLangString('No', $language_strings)}}
			</a>
	@endif
	@if($currentUser->isGranted('logs.clearLogs'))
			<a href="{{route('logs.clearLogs')}}" class="get btn btn-danger btn-block" nextUrl="{{route('logs.logsAll')}}"><i class="fa fa-trash"></i> 
				{{App\Global_var::getLangString('Yes', $language_strings)}}
			</a>
	@endif
		</h2>	
	</div>
</div>