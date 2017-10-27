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
        header('Access-Control-Allow-Origin:*');
        $c = new \TopClient;
        $config = config('services.alimama');
        $c->appkey = $config['appKey'];
        $c->secretKey = $config['secretKey'];

        $req = new \TbkItemGetRequest;
        $req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick");
        $req->setQ("休闲零食");
        $req->setPlatform("2");
        //$req->setCat("16,18");
        $data = $c->execute($req);

        $results=(array)$data->results;
        ///print_R($results['n_tbk_item']);
        return response()->json(['list'=>$results['n_tbk_item']]);
    }
}
