<?php

/**
 * 注：本邮件类都是经过我测试成功了的，如果大家发送邮件的时候遇到了失败的问题，请从以下几点排查：
 * 1. 用户名和密码是否正确；
 * 2. 检查邮箱设置是否启用了smtp服务；
 * 3. 是否是php环境的问题导致；
 * 4. 将26行的$smtp->debug = false改为true，可以显示错误信息，然后可以复制报错信息到网上搜一下错误的原因；
 * 5. 如果还是不能解决，可以访问：http://www.daixiaorui.com/read/16.html#viewpl
 *    下面的评论中，可能有你要找的答案。
 */

require_once "email.class.php";
//******************** 配置信息 ********************************
$smtpserver = "smtp.qq.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "***@qq.com";//SMTP服务器的用户邮箱
$smtpemailto = $_POST['toemail'];//发送给谁
$smtpuser = "1846907072@qq.com";//SMTP服务器的用户帐号
$smtppass = "****";//SMTP服务器的用户密码
$mailtitle = '找回密码';//邮件主题


$user_name = 'dmodai';
$user_email = '13042360740@163.com';
$password = '123456';
$x = md5($username.'+'.$password);
$string = base64_encode($username.".".$x);
$mailbody = "尊敬的".$username."先生/女士：<br />&nbsp;&nbsp;&nbsp;&nbsp;取回密码邮件<br />请点击下面的链接，按流程进行密码重设。<a href=' http://localhost/SELF/PHPFunction/mail/phpmail/resetPwd.php?p=".$string."'>http://localhost/SELF/PHPFunction/mail/phpmail/resetPwd.php?p=".$string."</a><br>(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)上面的页面打开后，输入新的密码后提交，之后您即可使用新的密码登录了。<br><br>此邮件为系统邮件，请勿直接回复";


$mailcontent = "<h1>".$mailbody."</h1>";//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
//************************ 配置信息 ****************************
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = false;//是否显示发送的调试信息
$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);




echo "<div style='width:300px; margin:36px auto;'>";
if($state==""){
    echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
    echo "<a href='index.html'>点此返回</a>";
    exit();
}
echo "恭喜！邮件发送成功！！";
echo "<a href='index.html'>点此返回</a>";
echo "</div>";

?>