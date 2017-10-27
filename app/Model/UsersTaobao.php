<?php
namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * Class User 用户与淘宝账号关系表
 * @package App\Models
 */
class UsersTaobao extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'users_taobao';




}
