<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Katherine-->
<!-- * Date: 2019-09-11-->
<!-- * Time: 13:42-->
<!-- */-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
<meta charset="utf-8">
<meta name="description" content="Cesi Vroum est le site de covoiturage officiel des étudiants et des professionnels du Cesi !"  />
<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=yes"  />

<link rel="stylesheet" type="text/css" href="" />
<link rel="manifest" href="manifest.json"  />
<link rel="apple-touch-icon" href="icon.png"  />
<link rel="icon" href="" /> <!-- Favicon -->

<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>  <!-- JQuery -->
<script></script>
</head>

<body id="<?= $bodyId ?>">
<?php include("navbar.php");?>
<?php echo  $content; ?>
</body>
</html>