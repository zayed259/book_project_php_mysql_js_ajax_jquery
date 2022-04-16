<?php
require "partial/header.php";
require "../connection.php";
$query = "SELECT * FROM `subcategories` WHERE 1";
$result = $conn->query($query);
$conn->close();
?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Subcategory List</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Data Table
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Id</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td>". $row['id'] . "</td>";
                                            echo "<td>". $row['category_id'] . "</td>";
                                            echo "<td>". $row['name'] . "</td>";
                                            echo "<td><button class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i> Edit</button> <button class='btn btn-danger'> <i class='fa-solid fa-trash-can'></i> Delete</button></td>";
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Id</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
        //add
        $('#add').click(function() {
           
        });

        //edit
        $('#edit').click(function() {
           
        });

        //delete
        $('#delete').click(function() {
           
        });


        //show
        } );
</script>
</body>

</html>