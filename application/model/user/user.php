<?php
/**
 * Created by PhpStorm.
 * User: yuhai
 * Date: 2018/10/27
 * Time: 10:14
 */
namespace app\model\user;

use PHPMailer\PHPMailer\PHPMailer;
use think\Config;
use think\Model;
class user extends Model
{
    protected $table = 'users';

    protected static function init()
    {
        self::event('before_insert', function($user){
            $user->is_active = 0;
            $user->updated_at = date('Y-m-d H:i:s');
        });
        $email = config('email');
        self::event('after_insert', function($user) use($email) {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $email['smtp_host'];  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $email['user_name'];                 // SMTP username
            $mail->Password = $email['user_password'];                           // SMTP password
            $mail->SMTPSecure = $email['smtp_secure'];                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $email['smtp_post'];                                    // TCP port to connect to
            $mail->setFrom($email['user_name'], 'yuhaiqunyuhaiqun');
            $mail->addAddress($user['email'], 'Joe User');     // Add a recipient
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $a = $mail->send();
        });
    }
}