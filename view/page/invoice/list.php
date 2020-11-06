<div class="container">

	<h2>Liste des clients</h2>
	<div class="row">
		<table class=" table table-striped">
		<tr>
			<th>Numéro</th>
			<th>Quantité</th>
			<th>Prix</th>
			<th>Contact (ID)</th>
			<th>Contact (Nom)</th>
		</tr>
		<?php
		    // Affichage de chaque client
			foreach ($invoices as $invoice) {
				echo '<tr>';
				echo '<td>' . htmlspecialchars($invoice['idInvoice']) . '</td>';
				echo '<td>' . htmlspecialchars($invoice['invQuantity']) . '</td>';
				echo '<td>' . htmlspecialchars($invoice['invPrice']) . '</td>';
				echo '<td>' . htmlspecialchars($invoice['fkContact']) . '</td>';
				echo '<td>' . htmlspecialchars($invoice['conLastName'] . ' ' . $invoice['conFirstName']) . '</td>';
				echo '</tr>';
			}
		?>
		</table>
	</div>
</div>