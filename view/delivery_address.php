<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php $Path = include(dirname(__FILE__).'/common_head.php'); ?>
    <link href="./css/delivery_address_style.css" rel="stylesheet">
  </head>

  <body>
    <?php $Path = include(dirname(__FILE__).'/header.php'); ?>

    <div id="user_infos">
      <section>
        <h2>
          Delivery
        </h2>
        <form>
          <dl>
            <dt>
              First Name
            </dt>
            <dd>
              <input type="text" name="firstName" />
            </dd>
            <dt>
              Last Name
            </dt>
            <dd>
              <input type="text" name="lastName" />
            </dd>
            <dt>
              Mail Address
            </dt>
            <dd>
              <input type="mail" name="mailAddress" />
            </dd>
            <dt>
              Telephone
            </dt>
            <dd>
              <input type="telephone" name="telephone" />
            </dd>
            <dt>
              Post Code
            </dt>
            <dd>
              〒<input type="text" class="p-postal-code" name="postCodeFront" size="3" maxlength="3">
              -
              <input type="text" class="p-postal-code" name="postCodeBack" size="4" maxlength="4">
            </dd>
            <dt>
              State / province
            </dt>
            <dd>
              <input type="text" name="state" />
            </dd>
            <dt>
              City / locality
            </dt>
            <dd>
              <input type="text" name="city" />
            </dd>
            <dt>
              Address Line
            </dt>
            <dd>
              <input type="text" name="addressLine" />
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
