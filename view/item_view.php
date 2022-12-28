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
    <link href="./css/item_style.css" rel="stylesheet">
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
            <a href="login.html">
              <button class="header_button" type="submit">LOG - IN</button>
            </a>
            <a href="sign_up.html">
              <button class="header_button" type="submit">SIGN - UP</button>
            </a>
            <a href="cart_view.html" class="cart_btn-tag"><i class="fas fa-shopping-cart"></i>See in Cart</a>
          </form>
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

    <div class="item_view_body">
      <section>
        <h2>
          Item Name A
        </h2>
        <span class="img_position">
          <img src=""  class="big_img" />
        </span>
        <dl>
          <dt>
          Category Type
          </dt>
          <dd>
          Category 1-1-1
          </dd>
          <dt>
          price
          </dt>
          <dd>
          buy sell $100
          </dd>
          <dt>
          Release date
          </dt>
          <dd>
          2022/01/01
          </dd>
        </dl>
      </section>
    </div>

    <div class="item_button">
      <form action="cart_view.html" >
        <input type="hidden" name="itemId" value="ItemNameA" />
        <button type="submit" id="item_view_button_cart" class="table_button_layout cart_btn-tag items_table_button"><i class="fas fa-shopping-cart"></i>Add to cart</button>
        <a href="./">
          <button type="button" class="items_table_button">Return</button>
        </a>
      </form>
    </div>
    <footer>
      <p>
        © All rights reserved by Example EC Site
      </p>
    </footer>

  </body>
</html>