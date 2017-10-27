<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Model\UsersTaobao;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

include app_path("Libraries\alimama\TopSdk.php");

class AccountController extends Controller
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
     * 淘宝授权登录后获取访问令牌（access_token）
     */
    public function getToken(Request $request)
    {
        $code=$request->input('code');
        $url = 'https://oauth.taobao.com/token';
        $config = config('services.alimama');
        $data = [
            'grant_type'=>'authorization_code',
            'client_id'=>$config['appKey'],
            'client_secret'=>$config['secretKey'],
            'redirect_uri'=>'http://127.0.0.1:12345/error',
            'code'=>$code
        ];
        $result=json_decode(curlPost($url,http_build_query($data),[]));
        print_R($result);
        $taobao=UsersTaobao::where('taobao_user_id',$result->taobao_user_id)->first();
        $taobao=$taobao?$taobao:(new UsersTaobao());
        $taobao->w1_expires_in=$result->w1_expires_in;
        $taobao->refresh_token_valid_time=$result->refresh_token_valid_time;
        $taobao->taobao_user_nick=$result->taobao_user_nick;
        $taobao->re_expires_in=$result->re_expires_in;
        $taobao->expire_time=$result->expire_time;
        $taobao->token_type=$result->token_type;
        $taobao->access_token=$result->access_token;
        $taobao->w1_valid=$result->w1_valid;
        $taobao->refresh_token=$result->refresh_token;
        $taobao->w2_expires_in=$result->w2_expires_in;
        $taobao->w2_valid=$result->w2_valid;
        $taobao->r1_expires_in=$result->r1_expires_in;
        $taobao->r2_expires_in=$result->r2_expires_in;
        $taobao->r2_valid=$result->r2_valid;
        $taobao->r1_valid=$result->r1_valid;
        $taobao->taobao_user_id=$result->taobao_user_id;
        $taobao->expires_in=$result->expires_in;
        $taobao->save();
        //redirect('file://index.html');
    }
}
