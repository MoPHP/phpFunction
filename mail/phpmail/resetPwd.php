<?php
/**
 * ��base64_decode�⿪$_GET['p']��ֵ
 */
$p=$_GET['p'];
$array = explode('.',base64_decode($p));
//echo "<br>";
/**
 * ��ʱ�����ǻ�õ�һ�����飬$array������ֱ������û�����������Ҫһ���ַ���
 * $array[0] Ϊ�û���
 * $array[1] Ϊ�������ɵ��ַ���
 */
//���ˣ����ǿ�ʼ����ƥ�乤���ɡ�

//$sql = "select password from member where username = '".trim($array['0'])."'";
//echo $sql;
//$query=mysql_query($sql,$conn);
//$rs=mysql_fetch_array($query);

//$password = $rs['password'];
//�����ͨ�����������˺Ų�ѯ���ݿ��ȡ������
$password = '123456';
/**
 * ����������
 */
$checkCode = md5($array['0'].'+'.$password);
/**
 * ����������֤�� =>
 */
?>
<?
if( $array['1'] === $checkCode ){

    //ִ�����ó���һ��������������
    echo "<form name='form1' id='form1' method='post' action='' onSubmit='return CheckForm()'>";
    echo "<table width='80%' border='0' cellspacing='0' cellpadding='0'>";
    echo "<tr>";
    echo "<td width='28%' align='right'>&nbsp;</td>";
    echo "<td width='10%' height='30' align='right'>�� �� ����</td>";
    echo "<td width='62%' align='left'>".$array['0']."<input name='username' type='hidden' id='username' value='".$array['0']."'/></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td align='right'>&nbsp;</td>";
    echo "<td height='30' align='right'>�� �� �룺</td>";
    echo "<td align='left'><input name='newpassword' type='password' id='newpassword' class='in'/></td>";
    echo " </tr>";
    echo "<tr>";
    echo "<td align='right'>&nbsp;</td>";
    echo "<td height='30' align='right'>ȷ�����룺</td>";
    echo "<td align='left'><input name='conpassword' type='password' id='conpassword' class='in'/></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td align='right'>&nbsp;</td>";
    echo "<td height='50' colspan='2' align='left'><div style='margin-left:30px' mce_style='margin-left:30px'><input type='submit' name='update' style='background:url(images/bo2.jpg); height:36px; width:113px; border:none; font-size:14px; font-weight:bold; color:#FFFFFF' value=' �޸����� ' /></div></td>";
			 echo " </tr>";
			echo "</table> ";
	   echo "</form>";
}else{
    //�����������ҳ��
    //header('location:error.php');
    print"<script type='text/javascript'>alert('�û����������������Ӳ���Ӧ');
 </script>";
}
/*
if($_POST['username']){
    $username = trim($_POST['username']);
    $newpassword=trim($_POST['newpassword']);
    $newpassword=md5("$newpassword".ALL_PS);

    $sql="update member set password='$newpassword' where username='$username'";
    //echo $sql;
    //exit;
    mysql_query($sql,$conn);
    print"<mce:script type='text/javascript'><!--
alert('�����޸ĳɹ�!');location.href='login.php';
// --></mce:script>";//*/

?>