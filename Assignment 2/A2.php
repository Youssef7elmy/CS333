<?php
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($url);
$data = json_decode($response, true);
$records = $data['records'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.5.6/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>Statistics of IT Bachelor's Students</h1>
        <table>
            <thead>
                <tr>
                    <th>Nationality</th>
                    <th>College</th>
                    <th>Program</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($records as $record) {
                    $fields = $record['fields'] ?? [];
                    $id = htmlspecialchars($record['id']); 
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fields['nationality'] ?? 'N/A') . "</td>";
                    echo "<td>" . htmlspecialchars($fields['colleges'] ?? 'N/A') . "</td>";
                    echo "<td>" . htmlspecialchars($fields['the_programs'] ?? 'N/A') . "</td>";
                    echo "<td><a href='details.php?id=$id'>View Details</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
