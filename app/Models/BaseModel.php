<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    protected $searchColumn = 'name';
    protected $unsetFilters = [
        'page_id',
        'page_site',
        'page',
        'auth_key'
    ];

    /**
     * Scope a query to filter by multiple fields.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  array  $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilters($query, $filters = [])
    {
        if (!empty($filters)) {
            $this->prepareFilters($filters);
            foreach ($filters as $field => $value) {
                if ($field == 'order_by') {
                    list($sortField, $sortValue) = $this->prepareSort($value);
                    if (!empty($sortField) && !empty($sortValue)) {
                        $query->orderBy($sortField, $sortValue);
                    }
                    continue;
                }
                if ($field == 'keyword') {
                    $query->where($this->searchColumn, 'LIKE', '%' . $value . '%');
                    continue;
                }
                if ($value && in_array($field, $this->fillable)) {
                    $query->where($field, $value);
                }
            }
        }

        return $query;
    }

    protected function prepareSort($value)
    {
        $field = $sort = '';
        switch ($value) {
            case 'newest':
                $field = 'id';
                $sort = 'DESC';
                break;
            case 'oldest':
                $field = 'id';
                $sort = 'ASC';
                break;
            case 'A-Z':
                $field = $this->searchColumn;
                $sort = 'ASC';
                break;
            case 'Z-A':
                $field = $this->searchColumn;
                $sort = 'DESC';
                break;
            default:
                $field = 'id';
                $sort = 'DESC';
                break;
        }
        return [$field, $sort];
    }

    public function scopeCustomPaginate($query, $request)
    {
        $pageId = !empty($request['page_id']) ? $request['page_id'] : 0;
        $pageSize = !empty($request['page_size']) ? $request['page_size'] : 20;
        return $query->paginate($pageSize, ['*'], 'page', $pageId);
    }

    protected function prepareFilters(&$filters)
    {
        if ($this->unsetFilters) {
            foreach ($this->unsetFilters as $field) {
                if (isset($filters[$field])) {
                    unset($filters[$field]);
                }
            }
        }
    }
}
