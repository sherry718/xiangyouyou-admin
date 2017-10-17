<?php
    include "TopSdk.php";
    /*date_default_timezone_set('Asia/Shanghai');
	$content = @file_get_contents('/Users/xt/Downloads/json.txt');
	var_dump(json_decode($content));
	var_dump(urlencode(mb_convert_encoding('阿里发票商家答疑', 'gb2312', 'utf-8')));*/

    $c = new TopClient;
    $c->appkey = '24616825';
    $c->secretKey = '849e034f00766457d55cb13cb098636d';
    $req = new TbkItemGetRequest;
    $req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick");
    $req->setQ("女装");
    $req->setCat("16,18");
    $resp = $c->execute($req);
    var_dump($resp);
?>