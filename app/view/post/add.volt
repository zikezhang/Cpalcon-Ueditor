......

<form method="post"  role="form" class="editform">
    <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}" />
    <input type="hidden" name="excerpt" value="" id="text" />
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="title" value="{{ formData['title'] is defined ? formData['title']:'' }}" class="form-control"
                   required="required" />
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" >
            <textarea name="content" required="required" id="content" class="haseditor" >{{ formData['content'] is defined ? formData['content']:'' }}</textarea>
            <br>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Section Info</div>
                <div class="panel-body">
                    <select name="catalog" class="form-control" required="required" >
                        <option value="">--Please Choose a Section</option>
                        {{ formData['catalog'] is defined ? formData['catalog']:'' }}
                    </select>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Tags Info</div>
                <div class="panel-body">
                    <input name="articletag" type="text"
                           value="{{ formData['tags'] is defined ? formData['tags']:'' }}"
                           class="form-control" />
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Original Source URL</div>
                <div class="panel-body">
                    <input name="source" type="url"
                           value="{{ formData['source'] is defined ? formData['source']:'' }}"
                           class="form-control" />
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">
                <i class="icon-user icon-ok"></i> Update
            </button>
            &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
</form>

<script type="text/javascript" src="/path/to/jquery.js"></script>
<script type="text/javascript" src="/path/to/ueditor.config.js"></script>
<script type="text/javascript" src="/path/to/ueditor.all.js"></script>
<script type="text/javascript" >

    $(document).ready(function(){
        var ue = UE.getEditor('content',{
            serverUrl:'{{ url.get("upload") }}'
        });

        function getPlainTxt() {
            return ue.getPlainTxt();
        }

        $('form.editform button[name="submit"]').click(function(){
            var articletext = getPlainTxt();
            $('input[name=excerpt]').val(articletext);
        });

    });
</script>
......