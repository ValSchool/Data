<?php

include 'db.php';
$database = new Database();
$data = $database->selectData();
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Kolom1</th>
            <th>Kolom2</th>
            <th>Kolom3</th>
            <th>Acties</th>
        </tr>";
foreach ($data as $row) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['kolom1']}</td>
            <td>{$row['kolom2']}</td>
            <td>{$row['kolom3']}</td>
            <td>
                <button>Bewerken</button>
                <button>Verwijderen</button>
            </td>
          </tr>";
}
echo "</table>";

?>
