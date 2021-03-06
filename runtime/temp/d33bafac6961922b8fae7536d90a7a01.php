<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpstudy_pro\WWW\thinkPHP\public/../application/login\view\login\login.html";i:1592384536;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登录</title>
  <link rel="stylesheet" href="/thinkPHP/public/static/layui/css/layui.css">
  <link rel="stylesheet" href="/thinkPHP/public/static/bootstrap/css/bootstrap.css">
  <style>
    .login-box {
      text-align: center;
      margin-top: 100px;
    }

    .login-box form {
      width: 23%;
      margin: 0 auto;
      border: 1px solid #eee;
      padding: 20px 0;
      border-radius: 5px;
    }
  </style>
</head>

<body class="layui-layout-body">
  <div class="layui-layout layui-layout-admin">
    <div class="login-box">
      <h1>后台登录</h1>
      <form class="layui-form" action="javascript:0">
        <div class="layui-form-item">
          <label class="layui-form-label">账号</label>
          <div class="layui-input-inline">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入账号" autocomplete="off"
              class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">密码</label>
          <div class="layui-input-inline">
            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off"
              class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">验证码</label>
          <div class="layui-input-inline">
            <input type="text" name="code" required lay-verify="required" placeholder="请输入验证码" autocomplete="off"
              class="layui-input">
            <div><img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="handleChange(this)" /></div>
          </div>
        </div>
        <div>
          <div class="layui-input-inline">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="/thinkPHP/public/static/layui/layui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <script>
    //Demo
    layui.use('form', function () {
      var form = layui.form;

      //监听提交
      form.on('submit(formDemo)', function (data) {
        // layer.msg(JSON.stringify(data.field));
        // console.log(data.field.title)
        $.ajax({
          type: "POST",
          url: "<?php echo url('login/Login/login'); ?>",
          data: {
            acc: data.field.title,
            psw: data.field.password,
            code: data.field.code
          },
          dataType: "JSON",
          success: function (response) {
              alert(response.msg)
              if(response.status ==1){
                window.location.href = 'index/Index/index'
              }
          },
          error: function () {
            console.log("异常");
          }
        })
        return false;
      });
    });

    function handleChange(obj) {
      $(obj).attr('src', '<?php echo captcha_src(); ?>?' + Math.random());
    }
  </script>
</body>
<!-- <body>

  <h1>hahahaha</h1>
  <a href="<?php echo url('center/Center/index'); ?>">跳转</a>
</body> -->

</html>