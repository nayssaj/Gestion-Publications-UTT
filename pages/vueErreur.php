<?php 
    $titreEntete = 'Erreur';
    $titrePage = 'ERREUR !';
?>

<?php ob_start() ?>
    <p>Une erreur est survenue : <?= $msgErreur ?></p> 
<?php $contenuCentral = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
