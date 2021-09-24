<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task01 extends Model
{
    // テーブルの固定（モデル名を変更したときにテーブル名が自動で変更されてしまうため）
    protected $table = 'tasks';

    use HasFactory;
    // user_id はログイン機能に使用する
    // protected:そのクラス自身と継承クラスからアクセス可能。つまり非公開だが継承は可能。
    // $fillableに指定したカラムのみ、create()やfill()、update()で値が代入される。　類似：$guarded
    protected $fillable = ['name'];

    /**
     * タスクを保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
