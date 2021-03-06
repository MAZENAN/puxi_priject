<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="admin/lib/respond.min.js"></script>
<![endif]-->
<link href="{{asset('admin/static/h-ui/css/H-ui.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/static/h-ui.admin/css/H-ui.login.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/static/h-ui.admin/css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<title>后台登录</title>
</head>
<body>
<!-- <input type="hidden" id="TenantId" name="TenantId" value="" /> -->
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="{{url('admin/public/check')}}" method="post" onsubmit="return checkInput()">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="username" name="username" type="text" placeholder="用户名" class="input-text size-L" value="{{old('username')}}" autocomplete="off">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L" value="{{old('password')}}">
        </div>
      </div>
      <div class="row cl">
         <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe63f;</i></label>
        <div class="formControls col-xs-8">
          <input id="captcha" class="input-text size-L" type="text" placeholder="验证码"  placeholder="验证码" name="captcha" style="width:150px;" autocomplete="off">
          <img src="{{captcha_src()}}" id="img"> <a id="change" href="javascript:;">看不清,换一张</a> </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="1">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          {{csrf_field()}}
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 普西学术 </div>
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript">
if (window != top){
            top.location.href = location.href;
        }

  $(function(){
    $("#change").click(
        function(){
          $("#img").attr("src","{{captcha_src()}}"+"?r="+Math.random())
        }
      )
  })

  function checkInput(){
    if ($("#username").val()=="") {
      layer.alert("请输入用户名")
      return false;
    }
    if ($("#password").val()=="") {
      layer.alert("请输入密码")
      return false;
    }
    if ($("#captcha").val()=="") {
      layer.alert("请输入验证码")
      return false;
    }
      layer.msg('正在登录中....');
  }
</script>

<script type="text/javascript">
  @if(count($errors->all())>0)
    layer.alert("@foreach($errors->all() as $error) {{$error}} @endforeach");
  @endif
</script>
</body>
</html>