<div class="col-md-12">
<div class="col-md-12">
{!! Form::open(array("route"=>"importRecipientsFromExcel", "method"=>"POST", "class"=>"post_", 'files'=>'true')) !!}
  <div class="col-md-12">
    <div class="col-md-0">
    </div>
    <div class="col-md-8" style="padding: 20px; margin-bottom: 30px; border: 1px solid gray">
    <div class="col-md-6">
      {{Form::file('recipients')}}
    </div>
  <div class="col-md-3">
    <button type="submit" class="btn btn-success">
      <i class="fa fa-upload"></i> 
      {!! App\Global_var::getLangString('Import', $language_strings) !!}
    </button>
  </div>
  </div>
  </div>
{!! Form::close() !!}
</div>

  <div class="col-md-8">

    {!! Form::open(array("route"=>"recipients.store", "method"=>"POST", "class"=>"post")) !!}

    <label class="nextUrl" nextUrl="{!! route('recipients.index') !!}" />

    <div class="panel panel-success">

      <div class="panel-heading">

        {!! App\Global_var::getLangString('Create_New_Recipient', $language_strings) !!}

        <a href="{!! route('recipients.index') !!}" class="get btn btn-success btn-sm pull-right" nextUrl="{!! route('recipients.index') !!}"><i class="fa fa-eye"></i>  

          {!! App\Global_var::getLangString('List', $language_strings) !!}

        </a> 

      </div>

      <div class="panel-body">

        <div class="col-md-12" style="padding-top:15px;">
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Category', $language_strings) !!}
            </label>
            <div class="col-md-8">
		{{ Form::select('categoryId', [null=>'-- --']+$recipient_categories->pluck('name', 'id')->toArray(), null, array('class'=>'select2 form-control categoryId')) }}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Full_Name', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {!!  Form::text('fullName', null, array('class'=>'form-control', 'required'=>'true')) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="label-control col-md-4">
              {!! App\Global_var::getLangString('Phone_Number', $language_strings) !!}
            </label>
            <div class="col-md-8">
              {!!  Form::text('phoneNumber', null, array('class'=>'phoneNumber form-control', 'required'=>'true')) !!}
            </div>
          </div>
          <div class="col-md-12 form-group">
            <label class="col-md-4 control-label"> 
              {!! App\Global_var::getLangString('Description', $language_strings) !!}
            </label>
            <div class="form-group col-md-8">
              {!! Form::textarea('remark', null, array('class'=>' form-control', 'rows'=>'3'));!!}
            </div>
          </div>
          <div class="col-md-12 form-group text-center">

            <div class="col-md-8 col-md-offset-4">

              <button type="submit" class="btn btn-success btn-block">

              <i class="fa fa-save"></i> 

              {!! App\Global_var::getLangString('Save', $language_strings) !!}

            </button>

            </div>

          </div>

        </div>

      </div>

    </div>

    {!! Form::close() !!}

  </div>

</div>



