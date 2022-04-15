<fieldset>
    <div class="form-group">
        <label for="InputTitle" class="col-sm-4 control-label">
            Title:
        </label>
        <div class="col-md-8">
            <input name="title" value="@if(!empty($url->title)){{$url->title}}@endif" class="form-control" type="text" id="InputTitle">
        </div>
    </div>
    <div class="form-group">
        <label for="InputUrl" class="col-sm-4 control-label">
            Url:
        </label>
        <div class="col-md-8">
            <input name="url" value="@if(!empty($url->url)){{$url->url}}@endif" class="form-control" type="url" id="InputUrl">
        </div>
    </div>
</fieldset>
