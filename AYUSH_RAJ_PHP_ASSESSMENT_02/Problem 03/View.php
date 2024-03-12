<?php

class View {
    public static function displayRecords($records) {
        echo "<h2>Updated Table:</h2>";
        echo "<table border='1'>";
        echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        </tr>";
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>".$record['id']."</td>";
            echo "<td>".$record['name']."</td>";
            echo "<td>".$record['description']."</td>";
            echo "<td>".$record['price']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
