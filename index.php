<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ガチャシュミレーター</title>
</head>
<body>
    
<?php


/*
    排出率
    ★5　0.6%
    ★4　PUキャラ2.55%
    ★4　PU武器2.55%
    ★3　武器94.3%
*/



//中身　★３ 武器94.3％
$star_3 = array(
        "片手剣",
        "大剣",
        "法噐",
        "弓",
        "槍",
);

//中身　★４PUキャラ2.55%
$star_4_char = array(
        "猫",
        "忍者",
        "偵察騎士",
);

//中身　★４PU武器2.55%
$star_4_item = array(
        "祭弓",
        "西風大剣",
        "弓蔵",
);

//中身　★４闇鍋
$star_4_yami = array(
        "騎兵隊長",
        "図書館司書",
        "法律家",
        "氷剣",
        "雷本",
        "ドドコドコの本",
);

//★５PU
$star_5_char_1 = array(
        "元権力者の血筋",
);

//★５すり抜け
$star_5_char_2 = array(
        "どどこ",
        "松茸大剣",
        "稲妻神里流太刀術",
        "花火屋の娘",
        "平井の弓",
        "霧切の雷光",
);


for ($i = 1; $i <= 10; $i++) {

$star_3_rand = NULL;
$star_4_rand = NULL;
$star_5_rand = NULL;

//10連目は確定で★４以上排出
    if($i <= 9){
        $ssr = 6;
        $sr = 51;
        $r = 943;
    }else{
        $ssr =6;
        $sr = 994;
        $r = 0;

    }


    $data = rand(1, 1000);
    //数値と回数の表示
    echo"<p>(".$data.")".$i."回目:";

//★５の確率は0.6％
    if ($data <= $ssr) {

//50％ですり抜け
        $star_5 = rand(1,2);
        echo "【".$star_5."】";
        echo "★★★★★";

        if($star_5 === 1){
            echo "ピックアップ確定";
            
    //名前を表示
        $star_5_rand = array_rand($star_5_char_1);
        echo "[".$star_5_rand."]";
        echo $star_5_char_1[$star_5_rand];

        }else{
            echo"すり抜け";
    //名前を表示
        $star_5_rand = array_rand($star_5_char_2);
        echo "[".$star_5_rand."]";
        echo $star_5_char_2[$star_5_rand];
        }

//★４の確率は5.1％
    } elseif ($data <= ($ssr+$sr)) {
        
//★4の排出無内役
//キャラ2.55%
//武器2.55%
//それ以外94.9%
        $star_4 = rand(1,1000);

        echo "【".$star_4."】";
        echo "★★★★";

        if($star_4 <= 255){
            echo"PUキャラクター";

        //名前を表示
        $star_4_rand = array_rand($star_4_char);
        echo "[".$star_4_rand."]";
        echo $star_4_char[$star_4_rand];

        }elseif($star_4 <=510){
            echo"PU武器";
        
    //名前を表示
        $star_4_rand = array_rand($star_4_item);
        echo "[".$star_4_rand."]";
        echo $star_4_item[$star_4_rand];

        }else{
            echo"すり抜け闇鍋";

    //名前を表示
        $star_4_rand = array_rand($star_4_yami);
        echo "[".$star_4_rand."]";
        echo $star_4_yami[$star_4_rand];

        }
//最低ランク★３は94.3％つまりその他の数字＝else
    } else {
        echo "★★★";

    //名前を表示
        $star_3_rand = array_rand($star_3);
        echo "[".$star_3_rand."]";
        echo $star_3[$star_3_rand];

    }

    echo "</p>";
}
?>

</body>
</html>