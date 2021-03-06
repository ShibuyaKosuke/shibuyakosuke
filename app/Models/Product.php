<?php

namespace App\Models;

use App\Scopes\ProductScope;
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
 * Product プロダクト
 * @property int id ID
 * @property int author_id 作者ID
 * @property string name プロダクト名
 * @property string repository_url レポジトリURL
 * @property Carbon created_at 作成日時
 * @property Carbon updated_at 作成日時
 * @property Carbon deleted_at 削除日時
 * @property User author ユーザー
 * @method Builder search(Request $request)
 */
class Product extends Model
{

    use Timestamp;
    use SoftDeletes;
    
    use Rememberable;

    protected $perPage = 15;

    protected $fillable = [
        'author_id', 
        'name', 
        'repository_url'
    ];

    /**
     * Add global Scopes
     */
    protected static function booted()
    {
        parent::boot();
        static::addGlobalScope(new ProductScope);
    }

    /**
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    public function scopeSearch($query, Request $request)
    {
        return $query->when($request->get('author_id'), function (Builder $query) use ($request) {
            $query->where('author_id', '=', $request->get('author_id'));
        })->when($request->get('name'), function (Builder $query) use ($request) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        })->when($request->get('repository_url'), function (Builder $query) use ($request) {
            $query->where('repository_url', 'like', '%' . $request->get('repository_url') . '%');
        })->when($request->get('sort') && $request->has('order'), function (Builder $query) use ($request) {
            $query->orderBy($request->get('sort'), $request->get('order'))
                ->when($request->get('sort') !== $this->primaryKey, function (Builder $query) {
                    $query->orderBy($this->primaryKey, 'asc');
                });
        });
    }

    /**
     * ユーザー
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
