<?php

/**
 * @file views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */

?>

<div class="item-list">
	<?php if (!empty($title)) : ?>
		<h3><?php print $title; ?></h3>
	<?php endif; ?>
	<<?php print $options['type']; ?> class="<?php print $class; ?>">
		<?php foreach ($rows as $id => $row): ?>
			<li><?php print $row; ?></li>
		<?php endforeach; ?>
	</<?php print $options['type']; ?>>
</div>