var uploader = new plupload.Uploader({
    runtimes: 'gears,html5,html4,silverlight,flash',
    browse_button: 'cover_btn_big',
    url: "/admin/version/upload",
    flash_swf_url: 'js/plupload/Moxie.swf',
    silverlight_xap_url: 'js/plupload/Moxie.xap',
    filters: {
        max_file_size: '100mb',
        mime_types: [
            {title: "files", extensions: "jpg,png,gif,jpeg,zip"}
        ]
    },
    multi_selection: true,
    init: {
        FilesAdded: function(up, files) {
            $("#btn_submit").attr("disabled", "disabled").addClass("disabled").val("正在上传...");
            var item = '';
            plupload.each(files, function(file) { //遍历文件
                item += "<span class='item' id='" + file['id'] + "'><span class='progress_bar'><span class='bar'></span><span class='percent'>0%</span></span></span>";
            });
            $("#photos_area").prepend(item);
            uploader.start();
        },
        UploadProgress: function(up, file) { //上传中，显示进度条 
            var percent = file.percent;
            $("#" + file.id).find('.bar').css({"width": percent + "%"});
            $("#" + file.id).find(".percent").text(percent + "%");
        },
        FileUploaded: function(up, file, info) {
            var data = eval("(" + info.response + ")");
			console.log(data);
			var input = "";
			//input+="<a class='picture_delete' data-img='"+data.src+"'>×</a>";
			input+="<input type=hidden name='pics["+file.name+"]' value='" + data.src + "'>";
			input+="<img src='" + data.src + "' alt='" + data.name + "'>";
            $("#" + file.id).html(input);
			
            $("#btn_submit").removeAttr("disabled").removeClass("disabled").val("提 交");
            if (data.error != 0) {
                alert(data.error);
            }
        },
        Error: function(up, err) {
            if (err.code == -601) {
                alert("请上传jpg,png,gif,jpeg,zip或rar！");
                $("#btn_submit").removeAttr("disabled").removeClass("disabled").val("提 交");
            }
        }
    }
});
uploader.init();
//删除图片
$(function() {
    $("body").on("click", ".picture_delete", function() {
        $(this).parent(".item").remove();
		var imgurl = $(this).attr('data-img');
		$.post("/admin/uploadfile/deletefile",{"imgurl":imgurl}, function(data) {
			
		});
    });
})
function show_pics_box() {
    $("#modal_upload").modal();
}

