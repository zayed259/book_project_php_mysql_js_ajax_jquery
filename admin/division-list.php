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
                <h4>Division List</h4>
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $serial = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$serial."</td>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td><button class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i> Edit</button> <button class='btn btn-danger'> <i class='fa-solid fa-trash-can'></i> Delete</button></td>";
                                        $serial++;
                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>#</th>
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
</script>
</body>

</html>