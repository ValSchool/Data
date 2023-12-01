<?php

include 'db.php';
$database = new Database();
$data = $database->selectData();
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Column1</th>
            <th>Column2</th>
            <th>Column3</th>
            <th>Actions</th>
        </tr>";
foreach ($data as $row) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['column1']}</td>
            <td>{$row['column2']}</td>
            <td>{$row['column3']}</td>
            <td>
                <button>Edit</button>
                <button>Delete</button>
            </td>
          </tr>";
}
echo "</table>";

?>
