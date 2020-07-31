<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
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
     * @return Builder
     */
    public function scopeSearch($query)
    {
        return $query->when(request('author_id'), function (Builder $query) {
            $query->where('author_id', '=', request('author_id'));
        })->when(request('name'), function (Builder $query) {
            $query->where('name', 'like', '%' . request('name') . '%');
        })->when(request('repository_url'), function (Builder $query) {
            $query->where('repository_url', 'like', '%' . request('repository_url') . '%');
        })->when(request('sort') && request('order'), function (Builder $query) {
            $query->orderBy(request('sort'), request('order'))
                ->when(request('sort') !== 'id', function (Builder $query) {
                    $query->orderBy('id', 'asc');
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
