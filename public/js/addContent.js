$(function () {
	$("#addContentButton").click(function () {
		var content = `
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung</h3>
                        <input type="hidden" name="new_content[]" value="true">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputDescription">Project Description</label>
                            <textarea id="inputDescription" class="form-control summernote" rows="4" name="content[]"></textarea>
                        </div>
                
                        <div class="form-group">
                            <label for="img_dir">Ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="img_dir" name="img_dir[]">
                                </div>
                            </div>
                        </div>

                        <div class="form_group">
                            <label for="img_descrip">Miêu tả</label>
                            <input type="text" class="form-control" id="img_descrip" placeholder="Miêu tả ảnh" name="img_descrip[]">
                        </div>
                    </div>
                </div>
            `
		$(content).appendTo($("#addContent"));
		$('.summernote').summernote();
    })
})