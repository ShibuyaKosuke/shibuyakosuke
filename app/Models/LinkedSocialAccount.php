<?php

namespace App\Models;

use App\Scopes\LinkedSocialAccountScope;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use ShibuyaKosuke\LaravelCrudCommand\Traits\AuthorObservable;
use Watson\Rememberable\Rememberable;

/**
 * LinkedSocialAccount ソーシャルログイン
 * @property int id ID
 * @property int user_id ユーザーID
 * @property string provider_name プロバイダー名
 * @property string provider_id プロバイダーID
 * @property Carbon created_at 作成日時
 * @property Carbon updated_at 更新日時
 * @property User id ユーザー
 * @method Builder search(Request $request)
 */
class LinkedSocialAccount extends Model
{

    use Timestamp;
    
    
    use Rememberable;

    protected $perPage = 15;

    protected $fillable = [
        'user_id', 
        'provider_name', 
        'provider_id'
    ];

    /**
     * Add global Scopes
     */
    protected static function booted()
    {
        parent::boot();
        static::addGlobalScope(new LinkedSocialAccountScope);
    }

    /**
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    public function scopeSearch($query, Request $request)
    {
        return $query->when($request->get('user_id'), function (Builder $query) use ($request) {
            $query->where('user_id', '=', $request->get('user_id'));
        })->when($request->get('provider_name'), function (Builder $query) use ($request) {
            $query->where('provider_name', 'like', '%' . $request->get('provider_name') . '%');
        })->when($request->get('provider_id'), function (Builder $query) use ($request) {
            $query->where('provider_id', 'like', '%' . $request->get('provider_id') . '%');
        })->when($request->get('sort') && $request->has('order'), function (Builder $query) use ($request) {
            $query->orderBy($request->get('sort'), $request->get('order'))
                ->when($request->get('sort') !== $this->primaryKey, function (Builder $query) {
                    $query->orderBy($this->primaryKey, 'asc');
                });
        });
    }

    /**
     * @return string|null
     */
    public function getNameAttribute()
    {
        return $this->title;
    }

    /**
     * ユーザー
     * @return BelongsTo
     */
    public function id(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
}
