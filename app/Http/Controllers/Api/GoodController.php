<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

include app_path("Libraries\alimama\TopSdk.php");

class GoodController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * 淘宝客商品查询
     */
    public function getList()
    {


        $c = new \TopClient;
        $config = config('services.alimama');
        $c->appkey = $config['appKey'];
        $c->secretKey = $config['secretKey'];

        /*$req = new \TbkItemGetRequest;
        $req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick");
        $req->setQ("女装");
        $req->setCat("16,18");
        $resp = $c->execute($req);
        var_dump($resp);*/

        $req = new \ItemcatsGetRequest;
        $req->setCids("18957,19562");
        //$req->setDatetime("2000-01-01 00:00:00");
        $req->setFields("cid,parent_cid,name,is_parent");
        $req->setParentCid("50011999");
        $resp = $c->execute($req);
        var_dump($resp);
    }
}
