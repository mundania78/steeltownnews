<?php

/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 */

?>

<?php if ($css_class || $css_name) : ?>
<div id="<?php print $css_name; ?>" class="view <?php print $css_class; ?>">
<?php endif; ?>

	<?php if (isset($admin_links)): ?>
		<div class="views-admin-links views-hide">
			<?php print $admin_links; ?>
		</div>
	<?php endif; ?>
	
	<?php if ($header): ?>
		<div class="row-fluid">
            <div class="span12 content-header">
				<?php print $header; ?>
            </div>
        </div>
	<?php endif; ?>

	<?php if ($exposed): ?>
		<?php print $exposed; ?>
	<?php endif; ?>

	<?php if ($attachment_before): ?>
		<?php print $attachment_before; ?>
	<?php endif; ?>

	<?php if ($rows): ?>
		<?php print $rows; ?>
	<?php elseif ($empty): ?>
		<?php print $empty; ?>
	<?php endif; ?>

	<?php if ($pager): ?>
		<?php print $pager; ?>
	<?php endif; ?>

	<?php if ($attachment_after): ?>
		<?php print $attachment_after; ?>
	<?php endif; ?>

	<?php if ($more): ?>
		<?php print $more; ?>
	<?php endif; ?>

	<?php if ($footer): ?>
	<footer>
		<?php print $footer; ?>
	</footer>
	<?php endif; ?>

<?php if ($css_class || $css_name) : ?>
</div>
<?php endif; ?>
