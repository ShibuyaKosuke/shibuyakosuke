<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use function request;

/**
 * User ユーザー
 * @property int id ID
 * @property string name 氏名
 * @property string github_account Githubアカウント名
 * @property string email メールアドレス
 * @property Carbon email_verified_at メール認証日時
 * @property string password パスワード
 * @property string remember_token リメンバートークン
 * @property Carbon created_at 作成日時
 * @property Carbon updated_at 作成日時
 * @property Carbon deleted_at 削除日時
 * @property Product[] products プロダクト
 * @method search
 */
class User extends Authenticatable
{

    use Notifiable;
    use Timestamp;
    use SoftDeletes;

    protected $perPage = 15;

    protected $fillable = [
        'name', 
        'github_account', 
        'email', 
        'email_verified_at', 
        'password', 
        'remember_token'
    ];

    protected $dates = [
        'email_verified_at',
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeSearch($query)
    {
        return $query->when(request('name'), function (Builder $query) {
            $query->where('name', 'like', '%' . request('name') . '%');
        })->when(request('github_account'), function (Builder $query) {
            $query->where('github_account', 'like', '%' . request('github_account') . '%');
        })->when(request('email'), function (Builder $query) {
            $query->where('email', 'like', '%' . request('email') . '%');
        })->when(request('email_verified_at'), function (Builder $query) {
            $query->whereDate('email_verified_at', request('email_verified_at'));
        })->when(request('password'), function (Builder $query) {
            $query->where('password', 'like', '%' . request('password') . '%');
        })->when(request('remember_token'), function (Builder $query) {
            $query->where('remember_token', 'like', '%' . request('remember_token') . '%');
        })->when(request('sort') && request('order'), function (Builder $query) {
            $query->orderBy(request('sort'), request('order'))
                ->when(request('sort') !== 'id', function (Builder $query) {
                    $query->orderBy('id', 'asc');
                });
        });
    }

    /**
     * プロダクト
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
