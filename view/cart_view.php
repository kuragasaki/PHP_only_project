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
    <link href="./css/cart_style.css" rel="stylesheet">
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
            <button class="header_button" type="submit">LOG - IN</button>
            <button class="header_button" type="submit">SIGN - UP</button>
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

    <form action="./delivery_address.html" method="post" id="cartInfo">
      <table id="cartInfosTbl">
        <caption>
          <h2>
            Buy Items
          </h2> 
        </caption>
        <thead>
          <tr class="header_background">
            <th id="item_checkbox">
              Buy /<br />Not Buy
            </th>
            <th class="item_data">
              Item Name
            </th>
            <th class="item_data">
              price
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="item_data">
              <input type="checkbox" name="itemId" value="itemId1_1_1" />
            </td>
            <td class="item_data">
              Item Name A
            </td>
            <td class="item_data">
              $100
            </td>
          </tr>
          <tr class="data_background">
            <td class="item_data">
              <input type="checkbox" name="itemId" value="itemId1_1_2" />
            </td>
            <td class="item_data">
              Item Name B
            </td>
            <td class="item_data">
              $100
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td id="foot_sum" colspan="3">
              <b>SUM：$1,000</b>
            </td>
          </tr>
        </tfoot>
      </table>

      <div class="item_button">
        <button  type="submit" class="items_table_button">Buy</button>
        <a href="./">
          <button  type="button" class="items_table_button">Return</button>
        </a>
      </div>
    </form>

    <footer>
      <h3>Example EC Site Company</h3>
    </footer>
  </body>
</html>