<article class="hreview open special">
    <link rel="stylesheet" href="/Projekt-K/view/css/style.css">
	<?php 
    
    if (empty($kunden)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine User gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($kunden as $kunde): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $kunde->benutzername;?></div>
				<div class="panel-body">
					<p class="description">In der Datenbank existiert ein User mit dem Namen <?= $kunde->benutzername;?></p>
					<p>
						<a title="Löschen" href="/kunden/delete?id=<?= $kunde->id ?>">Löschen</a>
					</p>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>
</article>
