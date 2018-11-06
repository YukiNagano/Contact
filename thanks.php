<!DOCTYPE>
	<html lang="ja">
<head>
	<title>送信完了 | お問い合わせ</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
  require_once('db_connect.php');

  // 変数の初期化 & 日時の取得
  date_default_timezone_set('Asia/Tokyo');
  $sql = null;
  $res = null;
  $dbh = null;
  $date = date('Y-m-d H:i:s');

  try {
    // データベースに接続
    $dbh = db_connect();

    //例外処理を投げるようにする(throw)
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user_name   = $_REQUEST['user_name'];
    $email   = $_REQUEST['email'];
    $user_name   = $_REQUEST['contact_us_type'];
    $user_name   = $_REQUEST['contents'];
    //データベース処理// SQL作成
    $sql = "INSERT INTO contact (
		       user_name, email, contact_us_type, contents
	) VALUES (
		       '$user_name', '$email', '$contact_us_type', '$contents'	)";

    // SQL実行
    $res = $dbh->query($sql);



    //データベース接続切断
    $statement = null;
    $dbh = null;

  } catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    //エラー内容は本番環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
    exit($e->getMessage());
  }
?>
	<div class="container">
		<h1>お問い合わせ 送信完了</h1>
		<p>
			お問い合わせありがとうございます。<br>
			内容を確認し、回答させていただきます。 <br>
			しばらくお待ちください。
		</p>
		<a href="index.php">
			<button type="button">お問い合わせに戻る</button>
		</a>
	</div>
</body>
</html>

