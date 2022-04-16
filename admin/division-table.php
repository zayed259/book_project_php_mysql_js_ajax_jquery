<?php
require "partial/header.php";
require "../connection.php";
$query = "SELECT * FROM `division` WHERE 1";
$result = $conn->query($query);
$conn->close();
?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Division Table</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <span><i class="bi bi-table me-2"></i></span> Data Table
                        </span>
                        <span>
                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#completeModal">
                                <i class="fa fa-plus"></i> Add New
                            </button>
                        </span>

                        <!-- Modal -->
                        <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Division</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="completeName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="completeName" placeholder="Enter Division Name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" onclick="addDivision()">Submit</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- update modal -->
                        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Division</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="updateName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="updateName" placeholder="Update Division Name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <input type="hidden" id="hiddendata">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require "partial/footer.php" ?>
<script>
    $(document).ready(function() {
        displayDivision();
    });
    //display function
    function displayDivision() {

        $.ajax({
            url: 'division/show.php',
            type: 'POST',
            data: {
                displaySend: true
            },
            success: function(data) {
                $('#example').html(data);
            }
        });
    }
    //add function
    function addDivision() {
        if($('#completeName').val() == ''){
            alert('Please enter division name');
            return false;
        }
        var nameAdd = $('#completeName').val();
        $.ajax({
            url: 'division/add.php',
            type: 'POST',
            data: {
                nameSend: nameAdd
            },
            success: function(data, response) {
                // console.log(response);
                location.reload();
                $('#completeModal').modal('hide');
                displayDivision();
            }
        });
    }
    //delete function
    function deleteDivision(deleteid) {
        var confirm = window.confirm("Are you sure you want to delete?");
        if (confirm) {
            $.ajax({
                url: 'division/delete.php',
                type: 'POST',
                data: {
                    deletesend: deleteid
                },
                success: function(data, response) {
                    displayDivision();
                }
            });
        } else {
            return false;
        }
    }
    //update function
    function getUpdate(updateid) {
        $('#hiddendata').val(updateid);
        $.post('division/update.php', {
            updateid: updateid
        }, function(data, status) {
            var obj = JSON.parse(data);
            $('#updateName').val(obj.name);
        });
        $('#updateModal').modal('show');
    }
    // onclick event function
    function updateDetails() {
        var updatename = $('#updateName').val();
        var hiddendata = $('#hiddendata').val();
        $.post('division/update.php', {
            updatename: updatename,
            hiddendata: hiddendata
        }, function(data, status) {
            $('#updateModal').modal('hide');
            displayDivision();
        });
    }
</script>
</body>

</html>