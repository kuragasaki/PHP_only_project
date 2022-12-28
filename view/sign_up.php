<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Example EC Site</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="./css/reset.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/header_style.css" rel="stylesheet">
    <link href="./css/sing_up_style.css" rel="stylesheet">
    <link href="./css/footer_style.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <div id="title_position">
        <h1 class="header_upper">
          <a href="./">
            <span class="h1_top h1_common">Example</span>
            <br />
            <span class="h1_buttom h1_common">EC Site</span>
          </a>
        </h1>
        <div class="search_form" >
          <form action="./" >
            <input id="word_input" name="keyword" type="text" maxsize="200" placeholder="search word" />
            <button id="sbtn2" type="submit"><i class="fas fa-search"></i></button>
          </form>
          <a href="login.html" class="header_a_style">
            <button class="header_button" type="submit">LOG - IN</button>
          </a>
          <a href="sign_up.html" class="header_a_style">
            <button class="header_button" type="submit">SIGN - UP</button>
          </a>
          <a href="cart_view.html" class="cart_btn-tag header_a_style"><i class="fas fa-shopping-cart"></i>See in Cart</a>
        </div>
      </div>
      <nav>
        <div id="nav_position">
          <ul class="main_manu">
            <li>
              Category 1
            </li>
            <li>
              Category 2
            </li>
            <li>
              Category 3
            </li>
            <li>
              Category 4
            </li>
            <li>
              Category 5
            </li>
          </ul>
        </div>
      </nav>
    </header>

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

    <footer>
      <p>
        © All rights reserved by Example EC Site
      </p>
    </footer>

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
