<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpstudy_pro\WWW\thinkPHP\public/../application/index\view\index\index.html";i:1592464930;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>后台首页</title>
  <link rel="stylesheet" href="/thinkPHP/public/static/layui/css/layui.css">
  <link rel="stylesheet" href="/thinkPHP/public/static/bootstrap/css/bootstrap.css">
</head>

<body class="layui-layout-body">
  <div class="layui-layout layui-layout-admin">
    <div class="layui-header">
      <div class="layui-logo">问卷星后台</div>
      <!-- 头部区域（可配合layui已有的水平导航） -->
      <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item"><a href="">控制台</a></li>
        <li class="layui-nav-item"><a href="">商品管理</a></li>
        <li class="layui-nav-item"><a href="">用户</a></li>
        <li class="layui-nav-item">
          <a href="javascript:;">其它系统</a>
          <dl class="layui-nav-child">
            <dd><a href="">邮件管理</a></dd>
            <dd><a href="">消息管理</a></dd>
            <dd><a href="">授权管理</a></dd>
          </dl>
        </li>
      </ul>
      <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
          <a href="javascript:;">
            <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
            贤心
          </a>
          <dl class="layui-nav-child">
            <dd><a href="">基本资料</a></dd>
            <dd><a href="">安全设置</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">退了</a></li>
      </ul>
    </div>

    <div class="layui-side layui-bg-black">
      <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree" lay-filter="test">
          <li class="layui-nav-item layui-nav-itemed">
            <a class="" href="javascript:;">所有商品</a>
            <dl class="layui-nav-child">
              <dd><a href="javascript:;">列表一</a></dd>
              <dd><a href="javascript:;">列表二</a></dd>
              <dd><a href="javascript:;">列表三</a></dd>
              <dd><a href="">超链接</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;">解决方案</a>
            <dl class="layui-nav-child">
              <dd><a href="javascript:;">列表一</a></dd>
              <dd><a href="javascript:;">列表二</a></dd>
              <dd><a href="">超链接</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item"><a href="">云市场</a></li>
          <li class="layui-nav-item"><a href="">发布商品</a></li>
        </ul>
      </div>
    </div>

    <div class="layui-body">
      <!-- 内容主体区域 -->
      <div style="padding: 15px;">
        
        <div style="padding: 15px;">
          <input type="text" class="form-inline" id="exampleInputName" placeholder="查询">
          <input type="date" class="form-inline" id="startTime">
          <input type="date" class="form-inline" id="lastTime">
        <button type="button" class="btn btn-info" onclick="handleSearch()">查询</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">添加用户</button>

        <table class="layui-table">
          <thead>
            <tr>
              <th>用户名</th>
              <th>账号</th>
              <th>密码</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody id="list-box">
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
              <td><?php echo $vo['username']; ?></td>
              <td><?php echo $vo['account']; ?></td>
              <td><?php echo $vo['psw']; ?></td>
              <td>
                <button type="button" class="btn btn-primary"
                  onclick="handleEdit(<?php echo $vo['id']; ?>,'<?php echo $vo['username']; ?>','<?php echo $vo['account']; ?>','<?php echo $vo['psw']; ?>')"
                  data-toggle="modal1">编辑</button>
                <button type="button" class="btn btn-danger" onclick="handelDel(<?php echo $vo['id']; ?>)">删除</button>
              </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>

          </tbody>
        </table>
        <div id="pages"><?php echo $list->render(); ?></div>
        
      </div>

    </div>

    <div class="layui-footer">
      <!-- 底部固定区域 -->
      © 问卷星
    </div>
  </div>
  <!-- 添加用户 -->
  <div class="modal fade" id="exampleModal" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">添加用户</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="control-label">账号</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="username" class="control-label">用户名</label>
              <input type="text" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="pwd" class="control-label">密码</label>
              <input type="password" class="form-control" id="pwd">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary" onclick="handelAdd()">确定</button>
        </div>
      </div>
    </div>
  </div>
  <!-- 修改用户 -->
  <div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">修改用户</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <input type="hidden" id="userId">
              <label for="recipient-name1" class="control-label">新账号</label>
              <input type="text" class="form-control" id="recipient-name1">
            </div>
            <div class="form-group">
              <label for="username1" class="control-label">新用户名</label>
              <input type="text" class="form-control" id="username1">
            </div>
            <div class="form-group">
              <label for="pwd1" class="control-label">新密码</label>
              <input type="password" class="form-control" id="pwd1">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary" onclick="handelEditTo()">确定</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <script src="/thinkPHP/public/static/layui/layui.js"></script>
  <script src="/thinkPHP/public/static/bootstrap/js/bootstrap.js"></script>

  <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    })

    function handelAdd() {
      if ($("#recipient-name").val().length > 0 && $("#username").val().length && $("#pwd").val().length) {
        $.ajax({
          type: "POST",
          url: "<?php echo url('index/Index/add'); ?>",
          data: {
            acc: $("#recipient-name").val(),
            username: $("#username").val(),
            pwd: $("#pwd").val()
          },
          dataType: "JSON",
          success: function (response) {
            alert(response.msg)
            if (response.status == 1) {
              // $('#exampleModal').hide()
              $('#exampleModal').modal('hide')
            }

          },
          error: function () {
            console.log("异常");
          }
        })
      } else {
        alert('不能为空')
      }
    }

    function handleEdit(id, username, acc, pwd) {
      $('#myModal').modal('show')
      $('#userId').val(id);
      $('#recipient-name1').val(acc);
      $('#username1').val(username);
      $('#pwd1').val(pwd);
    }

    function handelEditTo() {
      if ($("#recipient-name1").val().length > 0 && $("#username1").val().length && $("#pwd1").val().length) {
        $.ajax({
          type: "POST",
          url: "<?php echo url('index/Index/edit'); ?>",
          data: {
            id: $("#userId").val(),
            acc: $("#recipient-name1").val(),
            username: $("#username1").val(),
            pwd: $("#pwd1").val()
          },
          dataType: "JSON",
          success: function (response) {
            alert(response.msg)
            if (response.status == 1) {
              // $('#exampleModal').hide()
              $('#myModal').modal('hide')
            }

          },
          error: function () {
            console.log("异常");
          }
        })
      } else {
        alert('不能为空')
      }
    }

    function handelDel(id) {
      $.ajax({
        type: "POST",
        url: "<?php echo url('index/Index/del'); ?>",
        data: {
          id: id
        },
        dataType: "JSON",
        success: function (response) {
          alert(response.msg)

        },
        error: function () {
          console.log("异常");
        }
      })
    }

    function handleSearch() {
      let keyword = $("#exampleInputName").val()
      let startTime = $("#startTime").val()
      let lastTime =  $("#lastTime").val()
      window.location.href = "<?php echo url('index/Index/index'); ?>&keyword="+keyword+"&startTime="+startTime+"&lastTime="+lastTime;
      // if ($("#exampleInputName").val().length > 0) {
      //   $.ajax({
      //     type: "POST",
      //     url: "<?php echo url('index/Index/search'); ?>",
      //     data: {
      //       keyword: $("#exampleInputName").val()
      //     },
      //     dataType: "JSON",
      //     success: function (response) {
      //       if(response.status == 1){
      //         let str = '';
      //         for(item of response.data.data){
      //           str += `<tr>
      //               <td>${item.username}</td>
      //               <td>${item.account}</td>
      //               <td>${item.psw}</td>
      //               <td>
      //                 <button type="button" class="btn btn-primary"
      //                   onclick="handleEdit(${item.id},'${item.username}','${item.account}','${item.psw}')"
      //                   data-toggle="modal1">编辑</button>
      //                 <button type="button" class="btn btn-danger" onclick="handelDel(${item.id})">删除</button>
      //               </td>
      //             </tr>`;
      //         }
      //         $("#list-box").html(str)
      //       }else{
      //         alert(response.msg)
      //       }
            
      //     },
      //     error: function () {
      //       console.log("异常");
      //     }
      //   })
      // }

    }
  </script>
</body>

</html>