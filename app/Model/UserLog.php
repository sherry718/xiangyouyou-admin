<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserLog 用户登录日志表
 * @package App\Models
 */
class UserLog extends Model
{
    public $table = 'user_logs';
    public $timestamps = false;
}
