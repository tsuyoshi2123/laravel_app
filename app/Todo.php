<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model //継承元のmodelクラスにall(),fill()などが定義されている 実行しているのはmodel
{
    use SoftDeletes;
    
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'user_id',
    ]; // fill() fillableに値が入れられるか確認してる todosテーブルの指定カラムのみcreate(),file(),update()でデータ挿入が可能になる データが勝手に書き込まれるのを防ぐ

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }
}
//  todosテーブルに紐づくモデル todo.php を作りモデルに継承する。
// migrations todos usersテーブル