<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('admin.title')}} | 注册</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{ asset("/packages/admin/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/packages/admin/font-awesome/css/font-awesome.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/packages/admin/AdminLTE/dist/css/AdminLTE.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset("/packages/admin/AdminLTE/plugins/iCheck/square/blue.css") }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ Admin::url('/') }}"><b>{{config('admin.name')}}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">注册</p>

    <form class="form-horizontal" role="form" method="POST" action="{{config('admin.prefix') . 'auth/register'}}" >
      <div class="form-group has-feedback {!! !$errors->has('username') ?: 'has-error' !!}">

        @if($errors->has('username'))
          @foreach($errors->get('username') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
          @endforeach
        @endif

        <input type="input" class="form-control" placeholder="用户名" name="username" value="{{ old('username') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {!! !$errors->has('name') ?: 'has-error' !!}">

        @if($errors->has('name'))
          @foreach($errors->get('name') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
          @endforeach
        @endif

        <input type="input" class="form-control" placeholder="真实用户名" name="name" value="{{ old('name') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>


      <div class="form-group has-feedback {!! !$errors->has('password') ?: 'has-error' !!}">
        @if($errors->has('password'))
          @foreach($errors->get('password') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
          @endforeach
        @endif
        <input type="password" class="form-control" placeholder="密码" name="password" value="{{ old('username') }}" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input id="password-confirm" type="password" class="form-control" placeholder="确认密码" name="password_confirmation" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {!! !$errors->has('student_no') ?: 'has-error' !!}">
        @if($errors->has('student_no'))
          @foreach($errors->get('student_no') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
          @endforeach
        @endif
        <input type="text" class="form-control" placeholder="学号" name="student_no" value="{{ old('student_no') }}" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {!! !$errors->has('email') ?: 'has-error' !!}">
        @if($errors->has('email'))
          @foreach($errors->get('email') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
          @endforeach
        @endif
        <input type="email" class="form-control" placeholder="邮箱" name="email" value="{{ old('email') }}" required>
        <span class="glyphicon glyphicon-send form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {!! !$errors->has('mobile') ?: 'has-error' !!}">
        @if($errors->has('mobile'))
          @foreach($errors->get('mobile') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
          @endforeach
        @endif
        <input type="text" class="form-control" placeholder="手机" name="mobile" value="{{ old('mobile') }}" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 col-md-offset-4">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
        </div>
        <!-- /.col -->
      </div>

    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset("/packages/admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}} "></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset("/packages/admin/AdminLTE/bootstrap/js/bootstrap.min.js")}}"></script>
<!-- iCheck -->
<script src="{{ asset("/packages/admin/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
