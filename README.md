###Cpalcon-Ueditor
===================
 

##Usage
 

* download urditor plugin to /public/pugins/ueditor/。

* configurate file is located at /app/config/ueditor.php
* upload controller is /controller/UploadContoller.php
* @/app/view/post/add.volt
* 
```javascript
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
```

 
##todo
 
* upload video
* google map

## Other
 
@see https://github.com/fex-team/ueditor

 
