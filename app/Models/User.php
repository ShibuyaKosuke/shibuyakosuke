<?php

namespace App\Models;

use App\Scopes\UserScope;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use ShibuyaKosuke\LaravelCrudCommand\Traits\AuthorObservable;
use Watson\Rememberable\Rememberable;

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
 * @property LinkedSocialAccount[] linked_social_accounts ソーシャルログイン
 * @property Product[] products プロダクト
 * @method Builder search(Request $request)
 */
class User extends Authenticatable
{

    use Notifiable;
    use Timestamp;
    use SoftDeletes;
    
    use Rememberable;

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
     * Add global Scopes
     */
    protected static function booted()
    {
        parent::boot();
        static::addGlobalScope(new UserScope);
    }

    /**
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    public function scopeSearch($query, Request $request)
    {
        return $query->when($request->get('name'), function (Builder $query) use ($request) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        })->when($request->get('github_account'), function (Builder $query) use ($request) {
            $query->where('github_account', 'like', '%' . $request->get('github_account') . '%');
        })->when($request->get('email'), function (Builder $query) use ($request) {
            $query->where('email', 'like', '%' . $request->get('email') . '%');
        })->when($request->get('email_verified_at'), function (Builder $query) use ($request) {
            $query->whereDate('email_verified_at', $request->get('email_verified_at'));
        })->when($request->get('password'), function (Builder $query) use ($request) {
            $query->where('password', 'like', '%' . $request->get('password') . '%');
        })->when($request->get('remember_token'), function (Builder $query) use ($request) {
            $query->where('remember_token', 'like', '%' . $request->get('remember_token') . '%');
        })->when($request->get('sort') && $request->has('order'), function (Builder $query) use ($request) {
            $query->orderBy($request->get('sort'), $request->get('order'))
                ->when($request->get('sort') !== $this->primaryKey, function (Builder $query) {
                    $query->orderBy($this->primaryKey, 'asc');
                });
        });
    }

    /**
     * ソーシャルログイン
     * @return HasMany
     */
    public function linked_social_accounts(): HasMany
    {
        return $this->hasMany(LinkedSocialAccount::class);
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
