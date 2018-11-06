<?php
/*
  echo "<pre >";
  var_dump($_POST);
  echo "</pre >";
 */
//メール処理----------------------
  // ここにメール送信機能を追加
  // 変数タイムゾーンを初期化
  $header = null;
  $auto_reply_subject = null;
  $auto_reply_text = null;
  $admin_reply_subject = null;
  $admin_reply_text = null;
  date_default_timezone_set('Asia/Tokyo');

  // ヘッダー情報を設定
  $header = "MIME-Version: 1.0\n";
  $header = "From: TEST <test@example.com>\n";
  $header = "Reply-To: TEST <test@example.com>\n";

  // 件名を設定 - user
  $auto_reply_subject = 'お問い合わせいただきありがとうございます。';
  // 本文を設定 - user
  $auto_reply_text = "この度は、お問い合わせいただき誠りがとうございます。下記の内容でお問い合わせを受け付けました。\n\n";
  $auto_reply_text .= "お問い合わせ日時 : " . date("Y-m-d H:i") ."\n";
  $auto_reply_text .= "氏名 : " . $_POST['user_name']. "\n";
  $auto_reply_text .= "メールアドレス : " . $_POST['email'] . "\n";
  switch ($_POST['contact_us_type']) {
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
  $auto_reply_text .= "お問い合わせ内容 : " . nl2br($_POST['contents']) . "\n\n";
  // メール送信 - user
  mb_send_mail( $_POST['email'], $auto_reply_subject, $auto_reply_text, $header);


  // メールの件名 - admin
  $admin_reply_subject = "お問い合わせを受け付けました。";
  // 本文を設定 - admin
  $admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
  $admin_reply_text .= "お問い合わせ日時 : " . date("Y-m-d H:i") ."\n";
  $admin_reply_text .= "氏名 : " . $_POST['user_name'] . "\n";
  $admin_reply_text .= "メールアドレス : " . $_POST['email'] . "\n";
  switch ($_POST['contact_us_type']) {
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
  $admin_reply_text .= "お問い合わせ内容 : " . nl2br($_POST['contents']) . "\n\n";
  // メール送信 - admin
  mb_send_mail( 'ny712314@gmail.com', $admin_reply_subject, $admin_reply_text, $header);

//メール処理---------------------
?>
<!DOCTYPE>
	<html lang="ja">
<head>
	<title>確認 | お問い合わせ</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
  <div class="container">
    <h1>お問い合わせ  確認</h1>
    <form method="post" action="thanks.php">

      <div class="form-group">
        <label for="exampleFormControlName">氏名</label>
        <p  class="form-control-static" id="exampleFormControlName"><?php echo $_POST['user_name']; ?></p>
      </div>

      <div class="form-group">
        <label for="exampleFormControlEmail">メールアドレス</label>
        <p class="form-control-static" id="exampleFormControlEmail"><?php echo $_POST['email']; ?></p>
      </div>

      <div class="form-group">
        <label for="FormControlSelect">お問い合わせ種別</label>
        <p><?php switch ($_POST['contact_us_type']) {
          case "about_site":
            echo 'サイトについて';
            break;
          case "sign_up_about":
            echo '会員登録について';
            break;
          case "other":
            echo 'その他';
            break;
          default:
            echo '入力してください';
            break;
        }?>
      </div>

      <div class="form-group">
        <label for="FormControlTextarea1">お問い合わせ内容</label>
        <p><?php echo nl2br($_POST['contents']); ?></p>
      </div>

				<input type="button" onclick="history.back();" value="前に戻る">
        <input type="submit" name="btn_submit" value="送信">
        <input type="hidden" name="your_name" value="<?php echo $_POST['user_name']; ?>">
        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
        <input type="hidden" name="contact_us_type" value="<?php echo $_POST['contact_us_type']; ?>">
        <input type="hidden" name="contents" value="<?php echo $_POST['contents']; ?>">
      </form>
    </div>
	</body>
	</html>
