<div class="col-md-10 col-md-offset-1">
  <div class="panel panel-success ">
    <div class="panel-heading">
      <div class="panel-title">
        {{App\Global_var::getLangString('User_Interface', $language_strings)}}
      </div>
    </div>
    <div class="panel-body">

      {{Form::open(array('route'=>['logo.logo_update'], 'method'=>'post', 'files'=>'true', 'class'=>'post'))}}
      <label class="nextUrl" nextUrl="{{route('home')}}" />
      <div class="col-md-12" style="margin-bottom: 30px">
        <div class="col-md-4">
          <label for="companyName">
            {{App\Global_var::getLangString('Company_Name', $language_strings)}}
          </label>
        </div>
        <div class="col-md-6">
          <input type="text" name="logoText" value="{{$logo!=null? $logo->logoText:''}}" class="form-control" required="required">
        </div>
      </div>
      <div class="col-md-12">
        <div class="col-md-6 col-md-offset-4">
          <?php $logoImage=App\Logo::orderBy('id', 'desc')->first()!=null? App\Logo::orderBy('id', 'desc')->first()->logoImage:''; ?> <img src="{{asset('images/'.$logoImage)}}" alt="Logo" style="height: 120px; width: 150px; border-radius: 50%">
        </div>
      </div>
      <div class="col-md-12" style="padding-top: 15px">
        <div class="col-md-4">
          {{App\Global_var::getLangString('Upload_Logo_Image', $language_strings)}}
        </div>
        <div class="col-md-8">
          {{Form::file('logoImage')}}
        </div>
      </div>
      <div class="col-md-12" style="padding-top: 15px">
        <div class="col-md-4">
          {{App\Global_var::getLangString('Login_Image', $language_strings)}}
        </div>
        <div class="col-md-8">
          {{Form::file('backgroundImage')}}
        </div>
      </div>
      <div class="col-md-12" style="padding-top: 15px">
        <div class="col-md-4">
          {{App\Global_var::getLangString('Rows_Per_Page', $language_strings)}}
        </div>
        <div class="col-md-4">
          <input type="number" min="1" name="paginationSize" value="{{$setting!=null? $setting->paginationSize: null}}" class="form-control" required="required">
        </div>
      </div>
      <div class="col-md-12" style="padding-top: 15px">
        <div class="col-md-4">
          {{App\Global_var::getLangString('Display_Interval_in_Milli_Seconds', $language_strings)}}
        </div>
        <div class="col-md-4">
          <input type="number" min="1" name="lengthOfSingleResultInMilliSeconds" value="{{$setting!=null? $setting->lengthOfSingleResultInMilliSeconds: null}}" class="form-control" required="required">
        </div>
      </div>
      <div class="col-md-12" style="padding-top: 15px">
        <div class="col-md-4 col-md-offset-4">
          <button class="btn btn-success btn-block">
            <i class="fa fa-save"></i>
            {{App\Global_var::getLangString('Update', $language_strings)}}
          </button>
        </div>
      </div>
      {{Form::close()}}

    </div>
  </div>
</div>