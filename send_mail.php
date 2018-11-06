<?php
//メール処理----------------------

//言語指定と文字コード指定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// ここにメール送信機能を追加
// 変数タイムゾーンを初期化
$header = null;
$auto_reply_subject = null;
$auto_reply_text = null;
$admin_reply_subject = null;
$admin_reply_text = null;
date_default_timezone_set('Asia/Tokyo');

//admin info "headerで使用"
$admin_user_name = "test_user";
$admin_email_adress = "test@example.com";

// ヘッダー情報を設定
$header = "MIME-Version: 1.0\n";
$header = "From: TEST <$admin_email_adress\n";
$header = "Reply-To: TEST <$admin_email_adress>\n";

$user_name = $_POST['user_name'];
$email = $_POST['email'];
$contact_us_type = $_POST['contact_us_type'];
$contents = $_POST['contents'];

// 件名を設定 - user
$auto_reply_subject = 'お問い合わせいただきありがとうございます。';
// 本文を設定 - user
$auto_reply_text = "この度は、お問い合わせいただき誠りがとうございます。下記の内容でお問い合わせを受け付けました。\n\n";
$auto_reply_text .= "お問い合わせ日時 : " . date("Y-m-d H:i") ."\n";
$auto_reply_text .= "氏名 : " . $user_name . "\n";
$auto_reply_text .= "メールアドレス : " . $email . "\n";
switch ($contact_us_type) {
  case "about_site":
    $auto_reply_text .= "お問い合わせ種別 : サイトについて\n";
    break;
  case "sign_up_about":
    $auto_reply_text .= "お問い合わせ種別 : 会員登録について\n";
    break;
  case "other":
    $auto_reply_text .= "お問い合わせ種別 : その他\n";
    break;
}
$auto_reply_text .= "お問い合わせ内容 : " . nl2br($contents) . "\n\n";
// メール送信 - user
mb_send_mail( $email, $auto_reply_subject, $auto_reply_text, $header);



// メールの件名 - admin
$admin_reply_subject = "お問い合わせを受け付けました。";
// 本文を設定 - admin
$admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
$admin_reply_text .= "お問い合わせ日時 : " . date("Y-m-d H:i") ."\n";
$admin_reply_text .= "氏名 : " . $user_name . "\n";
$admin_reply_text .= "メールアドレス : " . $mail . "\n";
switch ($contact_us_type) {
  case "about_site":
    $admin_reply_text .= "お問い合わせ種別 : サイトについて\n";
    break;
  case "sign_up_about":
    $admin_reply_text .= "お問い合わせ種別 : 会員登録について\n";
    break;
  case "other":
    $admin_reply_text .= "お問い合わせ種別 : その他\n";
    break;
}
$admin_reply_text .= "お問い合わせ内容 : " . nl2br($contents) . "\n\n";
// メール送信 - admin
mb_send_mail( $admin_email_adress, $admin_reply_subject, $admin_reply_text, $header);

//メール処理---------------------

?>