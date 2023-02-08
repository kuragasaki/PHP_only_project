<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php $Path = include(dirname(__FILE__).'/common_head.php'); ?>
    <link href="./css/item_style.css" rel="stylesheet">
  </head>

  <body>
    <?php $Path = include(dirname(__FILE__).'/header.php'); ?>

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
    <?php $Path = include(dirname(__FILE__).'/footer.php'); ?>

  </body>
</html>