<?php
$data = file_get_contents('array.json');
$data = json_decode($data, true);
?>
<?php
// function to generate Table
function generateTable($data)
{
  echo "<table border='1'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th rowspan='3'>Time</th>";
  foreach ($data as $quarter => $inquarter) {
    foreach ($inquarter as $location => $inlocation) {
      echo "<th colspan = '3'> Location : $location </th>";
    }
    echo "</tr>";
    break;
  }
  echo "</tr> <tr></tr> <tr>";

  foreach ($data as $quarter => $inquarter) {
    foreach ($inquarter as $location => $inlocation) {
      foreach ($inlocation as $item => $count) {
        echo "<th> $item </th>";
      }
    }
    echo "</tr>";
    break;
  }
  echo "</tr> </thead>";

  echo "<tbody>";
  foreach ($data as $quarter => $inquarter) {
    echo "<tr> <td> $quarter </td>";
    foreach ($inquarter as $location => $inlocation) {
      foreach ($inlocation as $item => $count) {
        echo "<td> $count </td>";
      }
    }
    echo "</tr>";
  }
  echo "</tbody></table>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="data.js"></script>
  <link rel="stylesheet" href="./CSS/style.css">
  <title>Multidimensional Array</title>
</head>

<body>
  <!-- 1. Display the data in tabular form -->
  <h2> Display the data in tabular form</h2>
  <?php generateTable($data); ?>
  <!-- 2. Identify the quarter with maximum sale of egg. -->
  <hr>
  <h2>Identify the quarter with maximum sale of egg.</h2>
  <?php
  $max_egg = 0;
  $egg = "Q1";

  foreach ($data as $quarter => $inQuarter) {
    $temp_quarter = $quarter;
    $temp_egg = 0;
    foreach ($inQuarter as $location => $inLocation) {
      $temp_egg += $inLocation['Egg'];
    }
    if ($temp_egg > $max_egg) {
      $max_egg = $temp_egg;
      $egg = $temp_quarter;
    }
  }
  echo "Quarter with maximum sales of egg is : <b> $egg
   </b> with total of <b> $max_egg </b> sales <br>";
  ?>
  <!-- 3.Identify the location with minimum consumption of milk. -->
  <hr>
  <h2>Identify the location with minimum consumption of milk.</h2>
  <?php
  $milk_sales = array(
    "Kolkata" => 0,
    "Delhi" => 0,
    "Mumbai" => 0
  );
  foreach ($data as $quarter => $inQuarter) {
    foreach ($inQuarter as $location => $inLocation) {
      $milk_sales[$location] += $inLocation['Milk'];
    }
  }
  $milk_loc = array_search(min($milk_sales), $milk_sales);
  echo "Location with minimum consumptioin of milk is : <b>
   $milk_loc </b> with total of <b> $milk_sales[$milk_loc] </b>l. <br>";
  ?>

  <!-- Delete location with minimum sale of bread. -->
  <hr>
  <h2>Delete location with minimum sale of bread.</h2>
  <?php
  $bread_sales = array(
    "Kolkata" => 0,
    "Delhi" => 0,
    "Mumbai" => 0
  );
  foreach ($data as $quarter => $inQuarter) {
    foreach ($inQuarter as $location => $inLocation) {
      $bread_sales[$location] += $inLocation['Bread'];
    }
  }
  $bread_loc = array_search(min($bread_sales), $bread_sales);
  echo "Location with minimum sales of bread is : <b> $bread_loc
   </b> with total of <b> $bread_sales[$bread_loc] </b>l. <br>";
  foreach ($data as $quarter => $inQuarter) {
    unset($data[$quarter][$bread_loc]);
  }
  generateTable($data);
  ?>
</body>

</html>