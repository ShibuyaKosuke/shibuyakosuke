<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function request;

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
 * @method search
 */
class Product extends Model
{

    use Timestamp;
    use SoftDeletes;

    protected $perPage = 15;

    protected $fillable = [
        'author_id',
        'name',
        'repository_url'
    ];

    /**
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    public function scopeSearch($query, Request $request)
    {
        return $query->when($request->has('author_id'), function (Builder $query) use ($request) {
            $query->where('author_id', '=', $request->get('author_id'));
        })->when($request->has('name'), function (Builder $query) use ($request) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        })->when($request->has('repository_url'), function (Builder $query) use ($request) {
            $query->where('repository_url', 'like', '%' . $request->get('repository_url') . '%');
        })->when($request->has('sort') && $request->has('order'), function (Builder $query) use ($request) {
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

    /**
     * @return HasMany
     */
    public function dependencies(): HasMany
    {
        return $this->hasMany(Product::class, 'id', 'depending_id');
    }
}
