<?php
//メリマガ登録画面


$maker = array(
    array('apple', 'Uber',array('日本製','韓国製')), array('NEC', array('日本製','韓国製')), array('sony', array('日本製','韓国製')), array('Sharp' ,array('日本製','韓国製')));
$type = array('Note', 'Desktop');



$item_dat = array('アイテム',array('2021','2022'));



$item_test = array(array(array(array('2021','売れすぎてごめんなさい','3993', 'ボストンバッグ'),array('2021','木のスプーン','TEU345', '安いスプーン'))));

echo '<pre>';
var_dump($item_test);
echo '</pre>';

foreach($item_test[0][0][0] as $item => $dat){
    echo $item.':'.$dat;
}

//   echo $pc_name.':'.$bland;
  // foreach($bland as $D_key => $D_bland){
  //   // echo $D_bland;
  // }







// echo '<pre>';
// var_dump($maker[0][2]);
// echo '</pre>';

// foreach($maker[0][2] as $pc_name => $bland){
//   echo $pc_name.':'.$bland;
  // foreach($bland as $D_key => $D_bland){
  //   // echo $D_bland;
  // }

//   // echo '<pre>';
//   // echo $bland[0];
//   // echo '</pre>';
// }



//$D_item_arr['item_dat']と$D_item_arr['order']の配列が存在している
//$d_key(日にち)を$value（日にち以下のデータ）で
// foreach($D_item_arr['item_dat'][$p_y][$p_m] as $d_key => $value){

//   foreach($value as $d_value){


//     var_dump($D_item_arr['order'][$p_y][$p_m][$d_key['seles_srial']][0]['kensuu']);
//   }


// }






?>

<!-- <!DOCTYPE html>
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
</html> -->
