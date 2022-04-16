<?php
include '../../connection.php';
if (isset($_POST['displaySend'])) {
  $table = '<table class="table table-striped data-table example" style="width: 100%">
    <thead>
      <tr>
        <th>Serial</th>
        <th>Division ID</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
  $sql = "SELECT * FROM `division`";
  $result = $conn->query($sql);
  $serial = 1;
  while ($row = $result->fetch_assoc()) {
    $table .= '<tr><td>' . $serial . '</td> <td>' . $row['id'] . '</td> <td>' . $row['name'] . '</td><td> <button class="btn btn-dark btn-sm" onclick="getUpdate(' . $row['id'] . ')">Update</button>
        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDivision(' . $row['id'] . ')";>Delete</button></td></tr>';
    $serial++;
  }
  $table .= '</tbody></table><tfoot>
  <tr>
    <th>Serial</th>
    <th>Division ID</th>
    <th>Name</th>
    <th>Action</th>
  </tr>
</tfoot>';
  echo $table;
}
