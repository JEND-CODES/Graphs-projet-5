<meta charset='utf-8' />
<?php 

$bdd = new PDO('mysql:host=localhost;dbname=bootmvc30;charset=utf8', 'root', '');

$posts = $bdd->query('SELECT title FROM chapters WHERE title LIKE "L\'inconnu des falaises" ORDER BY id DESC');


if(isset($_GET['q']) AND !empty($_GET['q'])) {
    
    $q = htmlspecialchars($_GET['q']);
    
    $posts = $bdd->query('SELECT title FROM chapters WHERE title LIKE "%'.$q.'%" ORDER BY id DESC');
}

?>

<form method="GET">
    <input type="search" name="q" placeholder="Rechercher..." />
    <input type="submit" value="Valider" />
</form>

<ul>
<?php while($a = $posts->fetch()) { ?>
    <li><?= $a['title'] ?></li>

<?php } ?>
</ul>    
   