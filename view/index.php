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
    <link href="./css/item_infos_style.css" rel="stylesheet">
    <link href="./css/footer_style.css" rel="stylesheet">
  </head>

  <body>
    	
    <?php $Path = include(dirname(__FILE__).'/header.php'); ?>
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
          <form action="./index" >
            <input id="word_input" name="keyword" type="text" maxsize="200" placeholder="search word" />
            <button id="sbtn2" type="submit"><i class="fas fa-search"></i></button>
          </form>
          <a href="login.html">
            <button class="header_button" type="submit">LOG - IN</button>
          </a>
          <a href="sign_up.html">
            <button class="header_button" type="submit">SIGN - UP</button>
          </a>
          <a href="cart_view.html" class="cart_btn-tag"><i class="fas fa-shopping-cart"></i>See in Cart</a>
        </div>
      </div>
      <nav>
        <div id="nav_position">
          <ul class="main_manu">
            <li>
              <a href="./index.php?categoryCd=<?= 01 ?>" class="header_category_link">
                Category 1
              </a>
              <ul>
                <li>
                  Category 1-1
                  <ul>
                    <li>Category 1-1-1</li>
                    <li>Category 1-1-2</li>
                    <li>Category 1-1-3</li>
                  </ul>
                </li>
                <li>
                  Category 1-2
                  <ul>
                    <li>Category 1-2-1</li>
                    <li>Category 1-2-2</li>
                    <li>Category 1-2-3</li>
                  </ul>
                </li>
                <li>
                  Category 1-3
                  <ul>
                    <li>Category 1-3-1</li>
                    <li>Category 1-3-2</li>
                    <li>Category 1-3-3</li>
                  </ul>
                </li>
              </ul> -->
            <!-- </li>
            <li>
              Category 2 -->
              <!-- <ul>
                <li>
                  Category 2-1
                  <ul>
                    <li>Category 2-1-1</li>
                    <li>Category 2-1-2</li>
                    <li>Category 2-1-3</li>
                  </ul>
                </li>
                <li>
                  Category 2-2
                  <ul>
                    <li>Category 2-2-1</li>
                    <li>Category 2-2-2</li>
                    <li>Category 2-2-3</li>
                  </ul>
                </li>
                <li>
                  Category 2-3
                  <ul>
                    <li>Category 2-3-1</li>
                    <li>Category 2-3-2</li>
                    <li>Category 2-3-3</li>
                  </ul>
                </li>
              </ul> -->
            <!-- </li>
            <li>
              Category 3 -->
              <!-- <ul>
                <li>
                  Category 3-1
                  <ul>
                    <li>Category 3-1-1</li>
                    <li>Category 3-1-2</li>
                    <li>Category 3-1-3</li>
                  </ul>
                </li>
                <li>
                  Category 3-2
                  <ul>
                    <li>Category 3-2-1</li>
                    <li>Category 3-2-2</li>
                    <li>Category 3-2-3</li>
                  </ul>
                </li>
                <li>
                  Category 3-3
                  <ul>
                    <li>Category 3-3-1</li>
                    <li>Category 3-3-2</li>
                    <li>Category 3-3-3</li>
                  </ul>
                </li>
              </ul> -->
            <!-- </li>
            <li>
              Category 4 -->
              <!-- <ul>
                <li>
                  Category 4-1
                  <ul>
                    <li>Category 4-1-1</li>
                    <li>Category 4-1-2</li>
                    <li>Category 4-1-3</li>
                  </ul>
                </li>
                <li>
                  Category 4-2
                  <ul>
                    <li>Category 4-2-1</li>
                    <li>Category 4-2-2</li>
                    <li>Category 4-2-3</li>
                  </ul>
                </li>
                <li>
                  Category 4-3
                  <ul>
                    <li>Category 4-3-1</li>
                    <li>Category 4-3-2</li>
                    <li>Category 4-3-3</li>
                  </ul>
                </li>
              </ul> -->
            <!-- </li>
            <li>
              Category 5 -->
              <!-- <ul>
                <li>
                  Category 5-1
                  <ul>
                    <li>Category 5-1-1</li>
                    <li>Category 5-1-2</li>
                    <li>Category 5-1-3</li>
                  </ul>
                </li>
                <li>
                  Category 5-2
                  <ul>
                    <li>Category 5-2-1</li>
                    <li>Category 5-2-2</li>
                    <li>Category 5-2-3</li>
                  </ul>
                </li>
                <li>
                  Category 5-3
                  <ul>
                    <li>Category 5-3-1</li>
                    <li>Category 5-3-2</li>
                    <li>Category 5-3-3</li>
                  </ul>
                </li>
              </ul> -->
            <!-- </li>
          </ul>
        </div>
      </nav>
    </header> -->
    <div id="error_message">
      <?php echo $errorMsg; ?>
    </div>
    <form action="cart_view.php" id="itemInfo" method="post">
      <table id="itemInfosTbl">
        <caption>
          <h2>Item Infos</h2>
        </caption>
        <thead>
          <tr class="header_background">
            <th>Add Item</th>
            <th class="item_data">
              Image
            </th>
            <th class="item_data">
              Item Name
            </th>
            <th class="item_data">
              Category Type
            </th>
            <th class="item_data">
              price
            </th>
            <th class="item_data">
              Release date
            </th>
          </tr>
        </thead>
        <tbody>
          <?php for($index = 0; $index < count($item_list); $index++ ): ?>
            <?php if( ($index + 1) % 2 == 0 ): ?>
            <tr class="data_background">
            <?php else: ?>
            <tr>
            <?php endif; ?>

              <td class="itemId">
                <input type="checkbox" name="itemId" value=<?= $item_list[$index]["item_id"]; ?> />
              </td>
              <td class="item_data">
                <a href="item_view.php?itemName=<?= $item_list[$index]['item_name']; ?>">
                  <img src="" />
                  Item Image A
                </a>
              </td>
              <td class="item_data">
              <a href="item_view.php?itemName=<?= $item_list[$index]['item_name']; ?>">
                  <?= $item_list[$index]["item_name"]; ?>
                </a>
              </td>
              <td class="item_data">
                <?= $item_list[$index]["category_name"]; ?>
              </td>
              <td class="item_data">
                <?= $item_list[$index]["price"]; ?>
              </td>
              <td class="item_data">
                <?= $item_list[$index]["create_date"]; ?>
              </td>
            </tr>

          <?php endfor; ?>
        </tbody>
      </table>

      <div class="page_link_area">
        <ul class="page_link_ui">

        <?php if($pageNumber > 1 ): ?>
          <li class="page_pre">
            <a href='./index.php?pageNumber=<?= ($pageNumber - 1).$urlParamterPageNumber; ?>'>
              前へ
            </a>
          </li>
        <?php endif; ?>
        <?php if($pageNumber > 1 ): ?>
          <li class="page_pre">
            <a href='./index.php?pageNumber=<?= ($pageNumber - 1).$urlParamterPageNumber; ?>'>
              <?= ($pageNumber - 1); ?>
            </a>
          </li>
        <?php endif; ?>
          <li class="page_cheese">
            <?= $pageNumber; ?>
          </li>
        <?php if($pageNumber < $maxPageNumber ): ?>
          <li class="page_pre">
            <a href='./index.php?pageNumber=<?= ($pageNumber + 1).$urlParamterPageNumber; ?>'>
              <?= ($pageNumber + 1); ?>
            </a>
          </li>
        <?php endif; ?>

        <?php if($pageNumber < $maxPageNumber ): ?>
          <li class="page_next">
            <a href='./index.php?pageNumber=<?= ($pageNumber + 1).$urlParamterPageNumber; ?>'>
              次へ
            </a>
          </li>
        <?php endif; ?>
        </ul>
      </div>

      <div class="item_button">
        <button id="table_button_cart" type="submit" class="table_button_layout cart_btn-tag items_table_button"><i class="fas fa-shopping-cart"></i>Add to cart</button>
        <input id="reset" type="reset" class="table_button_layout items_table_button" value="reset" />
      </div>
    </form>

    <?php $Path = include(dirname(__FILE__).'/footer.php'); ?>
    <!-- <footer>
      <p>
        © All rights reserved by Example EC Site
      </p>
    </footer> -->
  </body>
</html>