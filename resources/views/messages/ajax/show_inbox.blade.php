<div class="col-md-12">
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-success">
		<div class="panel-heading">
			{{App\Global_var::getLangString('Detail', $language_strings)}}

			<a href="{{route('messages.inbox', $currentUser->id)}}" class="get pull-right" nextUrl="{{route('messages.inbox', $currentUser->id)}}"><i class="fa fa-eye"></i>  
				{{App\Global_var::getLangString('Messages', $language_strings)}}
			</a> 		
		</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<th class="col-md-3"></th>
					<th></th>
				</thead>
				<tbody>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Subject', $language_strings)}}</strong></td><td><h4><strong>{{$message->subject}}</strong></h4></td>
					</tr>

					<tr>
						<td><strong>{{App\Global_var::getLangString('Message_Body', $language_strings)}}</strong></td><td><h4>{{$message->body}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Sender', $language_strings)}}</strong></td><td><h4>{{$message->senders->first()!=null? $message->senders->first()->email: ''}}</h4></td>
					</tr>
					<tr>
						<td><strong>{{App\Global_var::getLangString('Date', $language_strings)}}</strong></td><td>{{date('M j Y h:i', strtotime($message->created_at))}}</td>
					</tr>

				</tbody>
			</table>

</div>
</div>
</div>
</div>

