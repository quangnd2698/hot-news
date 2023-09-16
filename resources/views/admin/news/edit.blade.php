<div class="card" ng-show="action != 'LIST'">
    <div class="card-header">
        <h3 class="card-title">Thêm mới tin tức</h3>

        <div class="card-tools">

        </div>
    </div>
    <div class="card-body pl-5 pr-5">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tiêu đề<span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" placeholder="Tổng hợp tin hot...." ng-model="news.title">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Danh mục</label>
                    <div class="select2-purple">
                        <select  id="category_ids" chosen multiple="multiple" data-placeholder="Chọn danh mục"
                            data-dropdown-css-class="select2-purple" style="width: 100%;"
                            ng-options="category.id as category.name for category in categories"
                            ng-model="news.category_ids">
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tags</label>
                    <input type="text" class="form-control" placeholder="Các tag cách nhau bởi dấu ','"
                        ng-model="news.tags">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Ngày đăng:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                            data-target="#reservationdatetime" ng-model="news.published_at" />
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-form-label">Ảnh:</label>
            
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="my-file"
                    accept="image/*" ngf-select ng-model="imageFile" name="file" required ngf-select
                    ngf-max-size="20MB" ngf-pattern="'.png,.jpg,.jgpe'" ngf-accept="'.png,.jpg,.jgpe'"
                    ng-change="uploadFile()" ngf-model-invalid="errorFile">
                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
            </div>
            <img id="image-selected" ng-src="@{{ selectedImage }}">
        </div>
        <div class="form-group">
            <label>Mô tả ngắn<span class="text-danger"> (*)</span></label>
            <textarea class="form-control" rows="3" placeholder="Tóm tắt nội dung của tin tức...."
                ng-model="news.short_description"></textarea>
        </div>
        <div class="form-group">
            <label>Nội dung<span class="text-danger"> (*)</span></label>
            <textarea froala="froalaOptions" ng-model="news.content" class="new-content"></textarea>
        </div>
    </div>
    <div class="p-3 text-center footer-action">
        <button class="btn btn-secondary" ng-click="changeAction('LIST')">
            Quay lại
        </button>
        <button class="btn btn-success" ng-click="save()">
            Lưu
        </button>
    </div>
</div>
