
<?php
 /* echo "<pre >";
  var_dump($_POST);
  echo "</pre >";

  session_start();

  $errors = array();

if(isset($_POST['submit'])){

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $contact_us_type = $_POST['contact_us_type'];
    $contents = $_POST['contents'];

    $user_name = htmlspecialchars($user_name, ENT_QUOTES);
    $email = htmlspecialchars($email, ENT_QUOTES);
    $contact_us_type = htmlspecialchars($contact_us_type, ENT_QUOTES);
    $contents = htmlspecialchars($contents, ENT_QUOTES);

    if($user_name === ""){
      $errors['user_name'] = "お名前が入力されていません。";
    }
    if($email === ""){
      $errors['email'] = "メールアドレスが入力されていません。";
    }
    if($contents === ""){
      $errors['contents'] = "お問い合わせ内容が入力されていません。";
    }

    if(count($errors) === 0) {
      $_SESSION['user_name'] = $user_name;
      $_SESSION['email'] = $email;
      $_SESSION['contents'] = $contents;

      header('Location:
http://localhost/contact/confirm.php');
      exit();
    }
  }

  echo "<pre>";
  var_dump($errors);
  echo "</pre>";
*/
?>


<!DOCTYPE>
	<html lang="ja">
<head>
	<title>お問い合わせ</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
	<!-- <?php
	echo "<ul>";
	foreach($errors as $value){
	  echo "<li>";
	  echo $value;
	  echo "</li>";
	}
	echo "</ul>";
	?> -->
		<h1>お問い合わせ</h1>
    <form method="post" action="confirm.php">
      <div class="form-group">
        <label for="exampleFormControlName">氏名</label>
        <input type="text" name="user_name" value="<?php if( !empty($_POST['user_name']) ){ echo $_POST['user_name']; } ?>" class="form-control" id="exampleFormControlName" placeholder="お名前">
      </div>
      <div class="form-group">
        <label for="exampleFormControlEmail">メールアドレス</label>
        <input type="email" name="email" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>" class="form-control" id="exampleFormControlEmail" placeholder="メールアドレス">
      </div>

      <div class="form-group">
        <label for="FormControlSelect">お問い合わせ種別</label>
        <select class="form-control" id="FormControlSelect" name="contact_us_type">
        <?php $contact_type = array(
          'about_site' => 'サイトについて',
          'sign_up_about' => '会員登録について',
          'other' => 'その他'); ?>
          <?php foreach ($contact_type as $key => $value) :?>
          	<option value="<?php echo $key; ?>"<?php if ( !empty($_POST['contact_us_type']) && $_POST['contact_us_type'] === $key ){ echo 'selected'; } ?>><?php echo "$value"; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="FormControlTextarea1">お問い合わせ内容</label>
        <textarea class="form-control" id="FormControlTextarea1" name="contents" rows="" cols=""><?php if( !empty($_POST['contents']) ){ echo $_POST['contents']; } ?></textarea>
      </div>

        <input type="submit" name="submit" value="確認する">

      </form>
    </div>
</body>
</html>