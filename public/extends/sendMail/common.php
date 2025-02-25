<?php
/*
*公共函数库
*函数调用
*/
header("Content-type:text/html;charset=utf-8;");



/*发送邮件方法
 *@param $to：接收者 $title：标题 $content：邮件内容
 *@return bool true:发送成功 false:发送失败
 */

function sendMail($to,$rand,$web_name){
    //引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
    require_once("./Mail/class.phpmailer.php"); 
    require_once("./Mail/class.smtp.php");
    $mail = new PHPMailer();//实例化PHPMailer核心类
    // $mail->SMTPDebug = 1;//是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    $mail->isSMTP();//使用smtp鉴权方式发送邮件
    $mail->SMTPAuth=true;//smtp需要鉴权 这个必须是true
    $mail->Host = 'smtp.exmail.qq.com';//链接qq域名邮箱的服务器地址
    $mail->SMTPSecure = 'ssl';//设置使用ssl加密方式登录鉴权
    $mail->Port = 465;//设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
    $mail->CharSet = 'UTF-8';//设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
    $mail->FromName = $web_name;//设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->Username ='fusong@xskj9.onexmail.com';//smtp登录的账号 这里填入字符串格式的qq号即可
    $mail->Password = 'YzGdZJfcxBToBzLu';//smtp登录的密码 使用生成的授权码（就刚才叫你保存的最新的授权码）【非常重要：在网页上登陆邮箱后在设置中去获取此授权码】
    $mail->From = 'fusong@xskj9.onexmail.com';//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
    
    //收件人邮件地址配置
    $mail->addAddress($to);
    
    $mail->isHTML(true);//邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
    //邮件
    $mail->Subject ="验证码";//添加该邮件的主题
    $mail->Body = "您的验证码为:".$rand;//添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
 
    //发信操作并输出函数返回值
    if($mail->send()) {
        return true;
    }else{
        return false;
    }
}



/*验证邮箱格式方法
*@param $email  邮箱账号
*/

function check_email($email)

{
 $result = trim($email);
 if (filter_var($result, FILTER_VALIDATE_EMAIL))
 {
 return "true";
 }
 else
 {
 return "false";
 }
}




?>