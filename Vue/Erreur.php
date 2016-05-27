<?php 
    $this->titreEntete = 'Erreur';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
           <h1 class="page-header"><?= $titrePage ?></h1><!-- ELEMENT SPECIFIQUE -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div id="contenu">
		<p>Une erreur est survenue : <?= $msgErreur ?></p> 
	</div>
</div>
