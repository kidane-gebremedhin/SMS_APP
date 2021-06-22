<div class="col-md-12">
  <div class="col-md-10">
    {!!Form::open(array("route"=>["language_strings.store"], "method"=>"POST", "class"=>"post"))!!}
    <label class="nextUrl" nextUrl="{{route('language_strings.create')}}" />
    <div class="panel panel-success">
      <div class="panel-heading">
        <h4>
          {{App\Global_var::getLangString('Create_New_String', $language_strings)}} 
          <a href="{{route('language_strings.edit')}}" class="get btn btn-success btn-md" style="margin-left: 40px">
    {{App\Global_var::getLangString('Edit_Language_Strings', $language_strings)}}</a>
      </h4>
    </div>           
    <div class="panel-body">
      <div class="col-md-12" style="padding-top:15px;">
        <div class="col-md-3">
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
      <div class="col-md-12" style="padding-top:15px;">
        <div class="col-md-3">
          {{ Form::text('keyWord', null, array('class'=>'form-control', 'required'=>'true'))}}
        </div>
        <div class="col-md-3">
          {{ Form::text('tig', null, array('class'=>'form-control', 'required'=>'true'))}}
        </div>

        <div class="col-md-3">
          {{ Form::text('amh', null, array('class'=>'form-control', 'required'=>'true'))}}
        </div>
        <div class="col-md-3">
          {{ Form::text('eng', null, array('class'=>'form-control', 'required'=>'true'))}}
        </div>
      </div>
      <div class="row" style="margin-top:120px;">
        <div class="col-md-6 col-md-offset-3 form-group text-center">
          <button type="submit" class="btn btn-success btn-block">
            <i class="fa fa-save"></i> 
            {{App\Global_var::getLangString('Save', $language_strings)}}
          </button>
        </div>
      </div>
    </div> 


  </div>
  {!!Form::close()!!}
</div>
</div>

<script type="text/javascript">

  /*-----Tab activator----------*/
  $(document).ready(function(){
    activateTab('Basic_Info');
  });

  $(document).on('click', '.tap_element', function(e){
    var id=$(this).attr('href');
    id=id.substr(1);
    activateTab(id)

  })
</script>