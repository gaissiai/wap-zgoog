<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0031)http://www.lp-leclub.com/admin/ -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
	志公|后台管理系统
</title>
 <script src="/Public/Admin/js/jquery-1.8.0.min.js" type="text/javascript"></script>
 <script src="/Public/Admin/js/verify.js" type="text/javascript"></script>
<link href="/Public/Admin/css/Default.css" rel="stylesheet" type="text/css"></head>

<script>
    <?php if($_COOKIE['login_error'] == '1'):?>
        alert('密码错误');
    <?php endif;cookie('login_error',null)?>
    <?php if($_COOKIE['login_lose'] == '1'):?>
        alert('时间超时');
    <?php endif;cookie('login_lose',null)?>
</script>

<body>
<form method="post" action="<?php echo U('enter');?>" id="form1" onsubmit="return false">

<div class="aspNetHidden">
</div>

<div class="aspNetHidden">

</div>
    <div style="margin-top: 200px; padding-top: 36px; width: 100%; height: 124px; background-color: #000000;
        text-align: center;">
        <div style="margin-left: auto; margin-right: auto; width: 600px;">
            <table>
                <tbody><tr>
                    <td>
                        <p style="font-size:40px;color:#fff;line-height: 30px;">志公教育</p>
                    </td>
                    <td>
                        <table width="300" border="0">
                            <tbody><tr>
                                <td style="color: #ffffff;">
                                    帐号
                                </td>
                                <td>
                                    <input name="AdminName" type="text" id="AdminName" tabindex="2" style="width:160px;">
                                </td>
                                <td rowspan="2">
                                    <input type="image" id="LoginButton"  src="/Public/Admin/image/ButtonLogin.png">
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #ffffff;">
                                    密码
                                </td>
                                <td>
                                    <input name="AdminPassword" type="password" id="AdminPassword" tabindex="2" style="width:160px;">
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
        </div>
    </div>

    </form>

</body></html>