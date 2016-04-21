<article class="hreview open special">
    <link rel="stylesheet" href="/Projekt-K/view/css/style.css">
          <?php require_once 'model/KundenModel.php';
    require_once 'model/WarenModel.php';
     require_once 'model/FilialenModel.php';
    require_once 'model/EinkaufslistenModel.php';
            $einkaufslistenModel = new EinkaufslistenModel();
        $kundenModel = new KundenModel();
    //kundenid wird ermittelt
    $kunden = $kundenModel->readIdByName($_SESSION['nutzer']);
    //array wird erstellt
    $kundenwaren = $einkaufslistenModel->show($kunden->id);
    $summe = 0;
    ?>
    <p><?= $_SESSION['nutzer'];?></p>
		<?php foreach ($kundenwaren as $liste): ?>
    <?php 
      $warenModel = new WarenModel();
    $ware = $warenModel->readById($liste->warenid);
      $filialenModel = new FilialenModel();
      if($ware->filialenid != null)
      {$filiale = $filialenModel->readById($ware->filialenid);
    $filialenname = $filiale->name ;}
      else{$filialenname = "";}
        $summe += $ware->preis;?>
      <form>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $ware->name;?>  <?= $liste->datum?></div>
				<div class="panel-body">
					<p class="description"><?= $ware->preis;?> CHF<br><?= $filialenname;?><br><?= $ware->menge;?></p>
                    <p>
                    <a title="Löschen" href="/Projekt-K/einkaufslisten/remove?id=<?= $liste->kundenid ?>?datum=<?= $liste->datum?>">Entfernen</a></p>
				</div>
			</div>
    					   </form>
		<?php endforeach ?>
        <p>Summe: <?= $summe;?> CHF</p>
</article>
