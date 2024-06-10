<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // 指定模型关联的数据表名称
    protected $table = 'courses';

    // 指定可以批量赋值的字段
    protected $fillable = [
        'title', 'content', 'image_url', 'user_id'
    ];

    // 定义与 User 模型之间的关系（如果需要）
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
