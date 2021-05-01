<?php 
//メリマガ登録画面




//$D_item_arr['item_dat']と$D_item_arr['order']の配列が存在している

foreach($D_item_arr['item_dat'][$p_y][$p_m] as $d_key => $value){

  foreach($value as $d_value){


    var_dump($D_item_arr['order'][$p_y][$p_m][$d_key['seles_srial']][0]['kensuu']);
  }


}






?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メルマガ登録画面</title>
</head>
<body>
  <h1>メルマガ登録画面</h1>
  <form action="email-newsletter" method="POST">
  <p>メールタイトル：
    <input type="text" name="title">
  </p>
  <p>送信日：
    <input type="date" name="delivary_date">
  </p>
  <p>計測URL：
    <input type="text" name="marketing_URL">
  </p>
  <p>商品番号：
    <input type="text" name="serial">
  </p>
  <p>画像URL：
    <input type="text" name="image_URL">
  </p>
  <p>商品説明：
    <input type="text" name="item_description">
  </p>
    <input type="submit" value="送信する">
  </form>
  
</body>
</html>