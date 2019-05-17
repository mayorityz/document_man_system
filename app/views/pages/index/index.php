<div class="jumbotron" style="margin: 0px -15px 18px;">
    <div class="container">
        <h1 class="display-4 text-center"><i class="fas fa-file-upload"></i> Add New Documents</h1>
        <p class="text-center">Only Doc, Docx and PDF extensions are accepted</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 logpage">
            <!-- new files -->
            <form action="<?php echo ROOT ?>index/uploadfile" method="POST"  enctype= "multipart/form-data">
                <!-- <h3 class="text-center">UPLOAD NEW FILE</h3> -->
                <label for="">Document Title : </label>
                <input type="text" name="file_name" class="form-control" placeholder="Enter Title ..." />
                <label for="">Select Document : </label>
                <input type="file" name="dox" class="form-control" />
                <label for="">Office Category : </label>
                <select name="category" id="" class="form-control">
                    <option value="">SELECT CATEGORIES</option>
                    <option value="receipt">RECEIPT</option>
                    <option value="admin files">ADMIN FILES</option>
                    <option value="travel documents">TRAVEL DOCUMENTS</option>
                </select>
                <hr>
                <button class="btn btn-success btn-block"><i class="far fa-save"></i> SUBMIT FILE</button>
            </form>
        </div>
    </div>
</div>
<hr>