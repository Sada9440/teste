<?php
    
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $date = $_POST["date"];
    $age = $_POST["age"];
    $newsletter= $_POST["newsletter"];

    $dsn = 'mysql:dbname=sada;host=127.0.0.1';
    $user = 'root';
    $password = '';

    try{
        $dbh = new PDO($dsn, $user, $password);
    }
    catch(Exception $e){
        echo $e;
        die();
    }

    $request = "INSERT INTO `formulaire` (prenom, `nom`, `date_naissance`, `age`, `newsletter`) VALUES ('".$prenom."', '".$nom."', '".$date."', '".$age."', '".$newsletter."');";


    $dbh->exec($request);
    $lastId=$dbh->lastInsertId();


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Projet Sada en HTML et CSS</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
    <a href="page.html">Page suivante</a>
        <h1>Projet de <?php echo $prenom; ?> en HTML et CSS</h1>
        <a href="https://www.adimeo.com/blog/devops-une-r-evolution-en-marche/" target="_blank" class="lien">Dvops la revolution !!</a><br/>
<?php


//   ' OR '1=1
//   SELECT prenom as pr, nom as nm FROM formulaire where prenom = '\' OR \'1=1'

    // $rqselect = "SELECT id, prenom as pr, nom as nm FROM formulaire where id = '".$lastId."'";
    $rqselect = "SELECT id, prenom as pr, nom as nm FROM formulaire";
    $query=$dbh->query($rqselect);

    foreach( $query as $row){
        // extract($row);
        // echo "Personne $id : ".$pr." ".$nm."<br/>";
        echo "Personne ".$row["id"]." : ".$row["pr"]." ".$row["nm"]."<br/>";
    }

    



?>
        <img src="devops.png" alt="Dvops" width="700" height="345"/><br>
    </body>
</html>