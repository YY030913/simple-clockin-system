<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>致麻烦啰嗦的财务</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/checkin/Public/index/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/checkin/Public/index/css/flat-ui.css" rel="stylesheet">
    <link href="/checkin/Public/index/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="/checkin/Public/index/images/icons/png/Clipboard.png">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row" style="margin-top:5px;">
          <div class="col-md-12">
          <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">导航</span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">           
                <li class="active"><a href="<?php echo U('Index/day');?>">本日签到情况</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">亲爱的 <?php echo ($name); ?> 您好!</a></li>          
              </ul>
            </div><!-- /.navbar-collapse -->
            </div>
          </nav><!-- /navbar -->
      </div>

      <div class="row">
        <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <th>日期</th>
                    <th>人员</th>
                    <th>上班时间</th>
                    <th>下班时间</th>
                  </tr>
                  <?php if(is_array($people)): foreach($people as $key=>$data): ?><tr>
                    <td><?php echo ($date); ?></td>
                    <td><?php echo ($data["name"]); ?></td>
                    <td><?php echo ($data["startTime"]); ?></td>
                    <td><?php echo ($data["endTime"]); ?></td>
                  </tr><?php endforeach; endif; ?>
                </table>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo U('Index/index');?>" class="btn btn-large btn-block btn-primary">退 出</a>
        </div>
      </div>
    </div>
    <br>
    
    <!-- Load JS here for greater good =============================-->
    <script src="/checkin/Public/index/js/jquery-1.8.3.min.js"></script>
    <script src="/checkin/Public/index/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="/checkin/Public/index/js/jquery.ui.touch-punch.min.js"></script>
    <script src="/checkin/Public/index/js/bootstrap.min.js"></script>
    <script src="/checkin/Public/index/js/bootstrap-select.js"></script>
    <script src="/checkin/Public/index/js/bootstrap-switch.js"></script>
    <script src="/checkin/Public/index/js/flatui-checkbox.js"></script>
    <script src="/checkin/Public/index/js/flatui-radio.js"></script>
    <script src="/checkin/Public/index/js/jquery.tagsinput.js"></script>
    <script src="/checkin/Public/index/js/jquery.placeholder.js"></script>
    <script src="/checkin/Public/index/js/jquery.stacktable.js"></script>
    <script src="http://vjs.zencdn.net/4.3/video.js"></script>
    <script src="/checkin/Public/index/js/application.js"></script>
  </body>
</html>