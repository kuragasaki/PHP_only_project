<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php $Path = include(dirname(__FILE__).'/common_head.php'); ?>
    <link href="./css/sing_up_style.css" rel="stylesheet">
  </head>

  <body>
    <?php $Path = include(dirname(__FILE__).'/header.php'); ?>

    <div id="user_infos">
      <section>
        <h2>
           Registration
        </h2>
        <form method="post" action="./php/sign_up.php">
          <dl>
            <dt>
              First Name
            </dt>
            <dd>
              <input type="text" name="firstName" value="" />
            </dd>
            <dt>
              Last Name
            </dt>
            <dd>
              <input type="text" name="lastName" value="" />
            </dd>
            <dt>
              Mail Address
            </dt>
            <dd>
              <input type="mail" name="mailAddress" value="" />
            </dd>
            <dt>
               Gender
            </dt>
            <dd>
              <input type="radio" class="radio_input" name="gender" value="male" />male
              <input type="radio" class="radio_input" name="gender" value="female" />female
            </dd>
            <dt>
              Password
            </dt>
            <dd>
              <input type="password" name="password" id="password" required />
            </dd>
            <dt>
              Password Confirm
            </dt>
            <dd>
              <input type="password" name="passwordConfirm" id="passwordConfirm" required />
            </dd>
          </dl>

          <div class="item_button">
            <button type="submit" id="item_view_button_cart" class="table_button_layout items_table_button">Confirm</button>
            <a href="./">
              <button type="button" class="items_table_button">Return</button>
            </a>
          </div>

        </form>
      </section>
    </div>

    <?php $Path = include(dirname(__FILE__).'/footer.php'); ?>

    <script>
      // var form = document.forms[0];
      // form.onsubmit = function() {
      //   // エラーメッセージをクリアする
      //   form.password.setCustomValidity("");
      //   // パスワードの一致確認
      //   if (form.password.value != form.passwordConfirm.value) {
      //     // 一致していなかったら、エラーメッセージを表示する
      //     form.password.setCustomValidity("パスワードと確認用パスワードが一致しません");
      //   }
      // };
      // // 入力値チェックエラーが発生したときの処理
      // form.addEventListener("invalid", function() {
      //   document.getElementById("errorMessage").innerHTML = "入力値にエラーがあります";
      // }, false);
    </script>
  </body>
</html>
