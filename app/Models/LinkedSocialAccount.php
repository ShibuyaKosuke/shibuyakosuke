<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * LinkedSocialAccount ソーシャルログイン
 * @property int id ID
 * @property int user_id ユーザーID
 * @property string provider_name プロバイダー名
 * @property string provider_id プロバイダーID
 * @property Carbon created_at 作成日時
 * @property Carbon updated_at 更新日時
 * @property User user ユーザー
 * @method search
 */
class LinkedSocialAccount extends Model
{
    use Timestamp;

    protected $perPage = 15;

    protected $fillable = [
        'user_id',
        'provider_name',
        'provider_id'
    ];

    /**
     * ユーザー
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
