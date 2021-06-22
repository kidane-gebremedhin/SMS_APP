<div class="login-box">
  super-admin: contact@pilasatech.com <br>
  password: pilasa
  <div class="login-logo">
    <a href="../../index2.html"><b>PILASA</b>-ERP</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
<form role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa-sign-in fa"> </i> Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <a href="{{ url('/password/reset') }}" class="btn btn-block btn-social btn-facebook btn-flat">I forgot my password</a>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
