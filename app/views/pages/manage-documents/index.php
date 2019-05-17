<div class="jumbotron" style="margin: 0px -15px 18px;">
    <div class="container">
        <h1 class="display-4 text-center"><i class="fas fa-folder-open"></i> Manage Documents.</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover table-striped table-sm">
                <tr class="table-warning">
                    <td>Title</td>
                    <td>File</td>
                    <td>Category</td>
                    <td>Date Uploaded</td>
                    <td>Created By Whom</td>
                    <td>Date Updated</td>
                    <td>Updated By Whom</td>
                    <td>Action</td>
                </tr>

                <?php
                $files = $this->files;
                $count = count($files);
                if ($count == 0) {
                    echo "<div class='alert alert-warning'>There are currently no existing documents ... <strong><a href='" . ROOT . "'>Add New Document</a></strong> </div>";
                } else {
                    for ($i = 0; $i < $count; $i++) {
                        echo "<tr>";
                        echo "<td>" . $files[$i]['title'] . "</td>";
                        echo "<td>
                                <button data-toggle=\"modal\" data-target=\"#pdfviewer\" onClick=\"viewFile('" . ROOT . "public/files/" . $files[$i]['file_path'] . "')\"  class=\"btn btn-sm btn-block btn-light\"><i class=\"fas fa-eye\"></i></button>
                                </td>";
                        echo "<td>" . $files[$i]['category'] . "</td>";
                        echo "<td>" . $files[$i]['date_uploaded'] . "</td>";
                        echo "<td>" . $files[$i]['uploaded_by_whom'] . "</td>";
                        echo "<td>" . $files[$i]['date_updated'] . "</td>";
                        echo "<td>" . $files[$i]['updated_by_whom'] . "</td>";
                        echo "<td>
                            <a title='update file' data-toggle=\"modal\" data-target=\"#exampleModal\" class=\"btn btn-primary btn-sm\" onClick='fetchData(" . $files[$i]['fms_id'] . ", \"" . $files[$i]['title'] . "\")'><i class=\"far fa-edit\"></i></a>
                            <a 
                            href='" . ROOT . "managedocuments/removedoc/" . $files[$i]['fms_id'] . "' 
                            class='btn btn-danger btn-sm' 
                            data-toggle='tooltip' data-placement='bottom' title='remove file'
                            ><i class=\"fas fa-trash\"></i></a>
                            </td>";
                        echo "</tr>";
                    }
                }

                ?>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE DOCUMENT</h5>
                <span id="notification"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="fetch_data">
                    <form action="<?php echo ROOT . 'managedocuments/updatedox'; ?>" id="updateform" method="POST" enctype="multipart/form-data">
                    <label for="">New Document Title :</label>
                        <input type="text" name="title" class="form-control" id="doc_title" />
                        <hr>
                        <label for="">New Document :</label><br>
                        <input type="file" name="file" id="newdoc" />
                        <hr>
                        <label>Change Category :</label>
                        <select name="category" id="" class="form-control" required>
                            <option value="">SELECT CATEGORY</option>
                            <option value="receipt">RECEIPT</option>
                            <option value="admin files">ADMIN FILES</option>
                            <option value="travel documents">TRAVEL DOCUMENTS</option>
                        </select>
                        <hr>
                        <input type="hidden" name="id" id="dox_id" />
                        <button class="btn btn-success btn-block"><i class="far fa-save"></i> UPDATE</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2-->
<div class="modal fade bd-example-modal-xl" id="pdfviewer" tabindex="-1" role="dialog" aria-labelledby="pdfviewerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">View Document</h3>
                <span id="notification"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe class="doc"></iframe>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    // necessary DOMs.
    const displayInfo = document.querySelector("#fetch_data");
    const dox_id = document.querySelector("#dox_id");
    const notification = document.querySelector("#notification");
    const title_ = document.querySelector("#doc_title");
    const updateForm = document.querySelector("#updateform");
    const updatedFile = document.querySelector("#newdoc");

    fetchData = (id, title) => {
        dox_id.setAttribute('value', id);
        title_.setAttribute('value', title);
    }
    viewFile = (link) => {
        let frame = document.querySelector(".doc");
        frame.setAttribute('src', link);
    }
</script>

<script type="text/javascript">

</script>