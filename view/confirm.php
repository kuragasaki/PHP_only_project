<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php $Path = include(dirname(__FILE__).'/common_head.php'); ?>
    <link href="./css/confirm_style.css" rel="stylesheet">
  </head>

  <body>
    <?php $Path = include(dirname(__FILE__).'/header.php'); ?>

    <div id="user_infos">
      <section>
        <h2>
          Confirm
        </h2>
        <form action="./complete.html" method="post">
          <dl>
            <dt>
              First Name
            </dt>
            <dd>
              <?=$firstName ?>
              <input type="hidden" name="firstName" value="<?=$firstName ?>"/>
            </dd>
            <dt>
              Last Name
            </dt>
            <dd>
              lastName
              <input type="hidden" name="lastName" value="lastName"/>
            </dd>
            <dt>
              Mail Address
            </dt>
            <dd>
              mailAddress
              <input type="hidden" name="mailAddress" value="mailAddress" />
            </dd>
            <dt>
              Telephone
            </dt>
            <dd>
              telephone
              <input type="hidden" name="telephone" value="telephone" />
            </dd>
            <dt>
               Post Code
            </dt>
            <dd>
              〒 000 - 0000
              <input type="hidden" class="p-postal-code" name="postCodeFront" value="000">
              <input type="hidden" class="p-postal-code" name="postCodeBack" value="0000">
            </dd>
            <dt>
              State / province
            </dt>
            <dd>
              state
              <input type="hidden" name="state" value="state" />
            </dd>
            <dt>
              City / locality
            </dt>
            <dd>
              city
              <input type="hidden" name="city" value="city" />
            </dd>
            <dt>
              Address Line
            </dt>
            <dd>
              address line
              <input type="hidden" name="addressLine" value="address line" />
            </dd>
          </dl>

          <div class="item_button">
            <button type="submit" id="item_view_button_cart" class="table_button_layout items_table_button">Send</button>
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
