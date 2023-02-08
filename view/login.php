<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php $Path = include(dirname(__FILE__).'/common_head.php'); ?>
    <link href="./css/login_style.css" rel="stylesheet">
  </head>

  <body>
    <?php $Path = include(dirname(__FILE__).'/header.php'); ?>

    <div id="complete">
      <form action="login" method="post">
        <!-- <button  type="submit" class="items_table_button">Login</button> -->
        <button type="submit" id="login_button">Login</button>
        <a href="./">
          <button type="button" class="items_table_button">Return</button>
        </a>


        <!-- <div class="item_button">
        </div> -->
      </form>
    </div>

    <?php $Path = include(dirname(__FILE__).'/footer.php'); ?>
  </body>
</html>