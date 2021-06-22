<div class="col-md-12">  
  <div class="col-md-10">
    {!!Form::open(array("route"=>["language_strings.update"], "method"=>"POST", "class"=>"post"))!!}
    <label class="nextUrl" nextUrl="{{route('language_strings.edit')}}" />
    <div class="panel panel-info">
      <div class="panel-heading">
        {{App\Global_var::getLangString('Edit_Language_Strings', $language_strings)}}
        <a style="margin-top: -3px;" href="{{route('language_strings.create')}}" class="get pull-right btn btn-success btn-sm"><i class="fa fa-plus"></i>  {{App\Global_var::getLangString('Create_New_String', $language_strings)}}</a> 
        <a style="margin-top: -3px;" href="{{route('export_excel')}}" class="get pull-right btn btn-default btn-sm"><i class="fa fa-excel"></i>{{App\Global_var::getLangString('Export_To_Excel', $language_strings)}}</a>        
      </div>           
      <div class="panel-body">
        <div class="row" style="padding-top:15px;">
          <div class="col-md-1">
            #
          </div>
          <div class="col-md-2">
            {{App\Global_var::getLangString('Key_Word', $language_strings)}}
          </div>
          <div class="col-md-3">
            {{App\Global_var::getLangString('Tigrigna', $language_strings)}}
          </div>
          <div class="col-md-3">
            {{App\Global_var::getLangString('Amharic', $language_strings)}}
          </div>
          <div class="col-md-3">
            {{App\Global_var::getLangString('English', $language_strings)}}
          </div>
        </div>
        <?php $count=1; ?> 
        @foreach($language_strings as $language_string)
        <input type="hidden" name="id" value="{{$language_string->id}}">
        <div class="row" style="padding-top:15px;">
          <div class="col-md-1">
            {{$count++}}
          </div>
          <div class="col-md-2">
            {{ Form::text($language_string->id.'_keyWord', $language_string->keyWord, array('class'=>'form-control', 'required'=>'true', 'readonly'=>'readonly'))}}
          </div>
          <div class="col-md-3">
            {{ Form::text($language_string->id.'_tig', $language_string->tig, array('class'=>'form-control', 'required'=>'true'))}}
          </div>
          <div class="col-md-3">
            {{ Form::text($language_string->id.'_amh', $language_string->amh, array('class'=>'form-control', 'required'=>'true'))}}
          </div>
          <div class="col-md-3">
            {{ Form::text($language_string->id.'_eng', $language_string->eng, array('class'=>'form-control', 'required'=>'true'))}}
          </div>
        </div>
        @endforeach
      </div>
      <div class="row" style="padding-top:10px;">
        <div class="col-md-6 col-md-offset-3 form-group text-center">
          <button type="submit" class="btn btn-success btn-block">
            <i class="fa fa-save"></i> 
            {{App\Global_var::getLangString('Update', $language_strings)}}
          </button>
        </div>
      </div>
    </div>
    {!!Form::close()!!}
  </div>
</div>

