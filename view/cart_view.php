<?php
    // include "../pdo/item_pdo.php";
    include("../pdo/item_pdo.php");

    // $keywords = ;

    ## チェックなどはサービスクラスを作ってそちらに任せる？

    $itemPdo = new ItemPdo();

    $keywords_array = null;
    $categoryCd = null;
    $order_select = [];
    $pageNumber = 1;
    $urlParamterKeywordOrCategoryCd = "";
    $urlParamterOrder = "";
    $urlParamterPageNumber = "";

    if (array_key_exists("keyword", $_GET)) {
      $keywords_array = preg_split("/[\s]/", $_GET["keyword"]);

      // ページ番号、または、ソートの際に使用
      $urlParamterKeywordOrCategoryCd = "keyword=".$_GET["keyword"];
    }

    if (array_key_exists("categoryCd", $_GET)) {
      $categoryCd = $_GET["categoryCd"];

      // ページ番号、または、ソートの際に使用
      $urlParamterKeywordOrCategoryCd = "categoryCd=".$_GET["categoryCd"];
    }

    if (array_key_exists("orderTitle", $_GET)) {
      print('array_key_exists(orderTitle, $_GET)');
      $order_select['order'] = $_GET["orderTitle"];
      $order_select['ascFlg'] = $_GET["ascFlg"]; // True = asc, False = desc

      // ページ番号に使用
      $urlParamterPageNumber = "orderTitle=".$_GET["orderTitle"];
      $urlParamterPageNumber = $urlParamterPageNumber."&ascFlg=".$_GET["ascFlg"];
    }

    if (array_key_exists("pageNumber", $_GET)) {
      $pageNumber = $_GET["pageNumber"];
    }
    
    # 入力チェック
    if (isset($keyword) || isset($categoryCd) || $pageNumber > 1) {
      if (isset($keyword)) {
        $items_array = $itemPdo->get_item_count_and_items($keywords_array, null, $order_select, $pageNumber);
      } else if (isset($categoryCd)) {
        $items_array = $itemPdo->get_item_count_and_items(null, $categoryCd, $order_select, $pageNumber);
      } else if ($pageNumber > 1) {
        $items_array = $itemPdo->get_item_count_and_items(null, null, $order_select, $pageNumber);
      }

      $item_count = $items_array['count'];
      $item_list = $items_array['item_list'];
    } else {
      $item_count = $itemPdo->get_count_items();
      $item_list = $itemPdo->get_items();
    }

    $errorMsg = "";
    $maxPageNumber = 1;

    if ($item_count > 20) {
      $maxPageNumber = $maxPageNumber / 20;

      if ($item_count % 20 != 0) {
        $maxPageNumber += 1;
      }
    }

    if (!empty($urlParamterPageNumber)) {
      $urlParamterPageNumber = "&".$urlParamterPageNumber;

      if (!empty($urlParamterKeywordOrCategoryCd)) {
        $urlParamterOrder = "&".$urlParamterKeywordOrCategoryCd;
        $urlParamterPageNumber = $urlParamterPageNumber."&".$urlParamterKeywordOrCategoryCd;
      }
    } else if (!empty($urlParamterKeywordOrCategoryCd)) {
      $urlParamterPageNumber = "&".$urlParamterKeywordOrCategoryCd;
    }
?>








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
    <!-- <header>
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
    </header> -->

    <?php $Path = include(dirname(__FILE__).'/header.php'); ?>

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

    <?php $Path = include(dirname(__FILE__).'/footer.php'); ?>
  </body>
</html>