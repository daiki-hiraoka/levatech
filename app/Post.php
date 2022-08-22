<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // fill&saveで保存できる内容を記述しておく
    // この記述に満たされる内容でないと保存することができない。
    protected $fillable = [
        'title',
        'body'
    ];
  

    // 10件のみを表示する関数
    public function getByLimit(int $limit_count = 10)
    {
        /**
         * updated_atで降順に並べた後、limitで制限をかける
         * 返されるのはcollectionインスタンス
         */
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    // ペジネーションを用いてデータベースのデータを表示する方法
    public function getpaginateByLimit(int $limit_count = 10)
    {
        /**
         * 返されるのはPaginationインスタンス
         * Collectionインスタンスとほとんど扱いが変わらない
         */
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
