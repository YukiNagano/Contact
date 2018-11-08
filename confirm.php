<?php
echo "<pre >";
var_dump($_POST);
echo "</pre >";
if (!empty($_POST)){

  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $contact_us_type = $_POST['contact_us_type'];
  $contents = $_POST['contents'];

  $user_name = htmlspecialchars($user_name, ENT_QUOTES);
  $email = htmlspecialchars($email, ENT_QUOTES);
  $contact_us_type = htmlspecialchars($contact_us_type, ENT_QUOTES);
  $contents = htmlspecialchars($contents, ENT_QUOTES);

}
//メール呼び出し
require 'send_mail.php';
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
        <p  class="form-control-static" id="exampleFormControlName"><?php echo $user_name; ?></p>
      </div>

      <div class="form-group">
        <label for="exampleFormControlEmail">メールアドレス</label>
        <p class="form-control-static" id="exampleFormControlEmail"><?php echo $email; ?></p>
      </div>

      <div class="form-group">
        <label for="FormControlSelect">お問い合わせ種別</label>
        <p><?php switch ($contact_us_type) {
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
        <p><?php echo nl2br($contents); ?></p>
      </div>

				<input type="button" onclick="history.back();" value="前に戻る">
        <input type="submit" name="btn_submit" value="送信">
        <input type="hidden" name="your_name" value="<?php echo $user_name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="contact_us_type" value="<?php echo $contact_us_type; ?>">
        <input type="hidden" name="contents" value="<?php echo $contents; ?>">
      </form>
    </div>
	</body>
	</html>
