<div class="form-filter">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Sắp xếp theo</label>
        <select class="form-control" ng-options="sort.code as sort.name for sort in sortOptions" ng-model="filter.order_by" ng-change="find()">
            <option value="">Sắp xếp theo</option>
        </select>
    </div>
    <div class="form-group">
        <label>Danh mục</label>
        <select class="form-control" ng-options="category.id as category.name for category in categories" ng-model="filter.category_id" ng-change="find()">
            <option value="">Tất cả</option>
        </select>
    </div>
    <div class="form-group">
        <label>Ngày công bố:</label>
        <div class="input-group">
            <button type="button" class="btn btn-default float-right" id="daterange-btn">
                <i class="far fa-calendar-alt"></i> <span class="time-range-title">Chọn ngày công bố</span>
                <i class="fas fa-caret-down"></i>
                <input type="text" class="time-filter" hidden ng-model="filter.published_at" >
            </button>
        </div>

    </div>
    <div class="form-group table-search-input">
        <label for="exampleFormControlSelect1">Tìm kiếm theo tên</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" ng-model="filter.keyword">
            <div class="input-group-append">
                <span class="input-group-text" ng-click="find()"><i class="fas fa-search fa-fw"></i></span>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-outline-secondary">Xóa form <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
        fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
        <path
            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
        <path fill-rule="evenodd"
            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
    </svg></button>

