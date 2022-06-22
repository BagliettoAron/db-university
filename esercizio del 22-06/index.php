<?php
require_once __DIR__ . 'database.php';
require_once __DIR__ . 'department.php';

//query database

$sql = "SELECT 'id', 'name' FROM 'departments';";
$result = $conn->query($sql);

$departments = [];

// controllo se il risultato esiste e non è vuoto
if($result && $result->num_rows > 0) {
    //ci sono i risultati
    while ($row = $result ->fetch_assoc()) {
        $curr_department = new Department($row["id"], $row["name"]);
        $departments[] = $row;
    }
} elseif($result) {
    //query andata a buon fine ma non ci sono risultati
} else {
    //query non è andata a buon fine (errore di sintassi)
    echo "query error";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Lista di dipartimenti</h1>

<?php foreach($departments as $department) { ?>


<div class="">
    <h2> <?php echo $department->name; ?></h2>
    <a href="single-department.php?id=<?php echo $department->id; ?>">Vedi informazioni</a>
</div>

<?php } ?>
    
</body>
</html>