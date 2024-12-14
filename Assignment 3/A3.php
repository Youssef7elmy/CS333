<?php
// Fetch data from the API
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($url);
$data = json_decode($response, true);
$records = $data['results'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University of Bahrain IT Bachelor's Students</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.5.6/css/pico.min.css">
    <style>
        .table-container {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>University of Bahrain IT Bachelor's Students</h1>
       <!-- creating the table to fetch the data -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nationality</th>
                        <th>College</th>
                        <th>Program</th>
                        <th>Academic Year</th>
                        <th>Semester</th>
                        <th>Number of students</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- fetching and displaying data -->
                    <?php
                    foreach ($records as $record) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($record['nationality'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($record['colleges'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($record['the_programs'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($record['year'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($record['semester'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($record['number_of_students'] ?? 'N/A') . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>