<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/16
 * Time: 7:16
 */
require_once __DIR__.'/class.phpmailer.php';
require_once __DIR__.'/class.smtp.php';
class Smtpmail
{
    public $charset = 'utf8';
    public $host = 'smtp.163.com';
    public $smtpAuth = true;
    public $username = 'nealjiao@163.com';
    public $password = 'jiaozhibao123';
    public $smtpSecure = 'ssl';
    public $port = 994;

    function __construct()
    {}

    function sendMail($email,$subject,$body,$attachment=null){

        $mail = new \PHPMailer();

        $mail->isSMTP();// 使用SMTP服务
        $mail->CharSet = $this->charset;// 编码格式为utf8，不设置编码的话，中文会出现乱码
        $mail->Host = $this->host;// 发送方的SMTP服务器地址
        $mail->SMTPAuth = $this->smtpAuth;// 是否使用身份验证
        $mail->Username = $this->username;// 发送方的163邮箱用户名
        $mail->Password = $this->password;// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！
        $mail->SMTPSecure = $this->smtpSecure;// 使用ssl协议方式
        $mail->Port = $this->port;// 163邮箱的ssl协议方式端口号是465/994

        $mail->setFrom($this->username,"nealjiao 个人博客");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
        $mail->addAddress($email);// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
        //$mail->addReplyTo($this->username,"Reply");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
        //$mail->addCC("aaaa@inspur.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址
        //$mail->addBCC("bbbb@163.com");// 设置秘密抄送人
        if($attachment) $mail->addAttachment($attachment);// 添加附件
        $mail->Subject = $subject;// 邮件标题
        $mail->Body = $body;// 邮件正文
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用
        //$mail->ErrorInfo;// 输出错误信息
        if(!$mail->send()){
            return  false;
        }else{
            return  true;
        }
    }


}