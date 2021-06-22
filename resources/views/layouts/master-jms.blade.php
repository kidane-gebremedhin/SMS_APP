@include('partials._header')


 <div class="col-md-12" style="position: relative; width: 100%; top:20px; height:50px; z-index: 99; display: block;">
   @if (Session::has('danger'))
  <div class="alert alert-danger">{{ Session::get('danger') }}</div>
  @elseif (Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
<div class="col-md-8 col-md-offset-2">
@if ($errors->any())
        {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
@endif
 </div>
 </div>
  {{-- show message to user at top of page body content --}}
 <div class="messageArea" style="position: fixed; top: 130px; width: 100%; z-index: 99; display: none;">
  <div class="row" style="height:50px">
    <div id="validation-error-message-displayer" style="display: none; height: 50px;">
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h3 class='text-warnning'>Operation Failed </h3>
                   <strong id="validation-error-message"></strong>
          </div>
          </div>
       <div id="message-success-displayer" style="display: none">
        <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   <strong id="message-success"></strong>
          </div>
          </div>
          <div id="message-error-displayer" style="display: none">
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                   <strong id="message-error"></strong>
                  </div>
            </div>
       </div>
      </div>

<div id="container" style="margin-top: 80px; height: 400px">
    @yield('bodyContent')
</div>

    <!-- /footer content -->
@include('partials._footer')
