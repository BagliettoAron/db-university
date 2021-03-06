<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Department.php";

//prelevo info singolo dipartimento dal database
//danger sql injection
// $id = $_GET["id"];
// $sql = "SELECT * FROM `departments` WHERE `id`= $id; ";
// $result = $conn->query($sql);

//preparazione dello statment
$stnt = $conn->prepare("SELECT * FROM `departments` WHERE `id =?`");
$stnt->bind_param('d', $id);
$id = $_GET["id"];

//esecuzione della query
$stnt->execute();
$result = $stnt -> get_result();

$departments = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $curr_department = new Department($row["id"], $row["name"]);
        $curr_department->setContactData($row["adress"], $row["phone"], $row["email"], $row["website"],);
        $curr_department->head_of_department=$row ("head_of_department");
        $departments[]=$curr_department;
    }
} elseif ($result) {
    echo 'il dipartimento non è stato trovato';
} else {
    echo 'errore nel query';
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

    <a href="index.php">Ritorna all'elenco dei dipartimenti</a>

<?php foreach ($departments as $department) { ?>
<h1> <?php echo $department->name; ?> </h1>
<p> <?php echo $department->head_of_department; ?></p>
<?php } ?>

<h2> </h2>
<ul>
    <?php foreach($department->getContactsAsArray() as $key=> $value) { ?>

    <li> <?php echo "$key: $value" ?> </li>
</ul>
<?php } ?>
    
</body>

</html>