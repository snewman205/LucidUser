<h1><?php echo '<?php echo $'.$single.'->isNew() ? "New" : "Edit" ?>' ?> <?php echo StringFormat::titleCase($table_name, ' ') ?></h1>
<form method="post" action="<?php echo "<?php echo site_url('".$plural_url."/save') ?>" ?>">
	<div class="ui-widget-content ui-corner-all ui-helper-clearfix">
<?php
if ($pk) {
?>
		<input type="hidden" name="<?php echo $pk ?>" value="<?php echo '<?php echo htmlentities($' . $single . '->' . "get" . StringFormat::titleCase($pk) . '()) ?>' ?>" />
<?php
}
foreach ($this->getColumns($table_name) as $column) {
	$column_name = $column->getName();
	if ($column_name == $pk)
		continue;

	if ($column->isTemporalType() && in_array(strtolower($column_name), array('created', 'updated'))) {
		continue;
	}

	$method = 'get' . StringFormat::titleCase($column_name);
	switch($column->getType()){
		case PropelTypes::TIMESTAMP:
			$format = 'VIEW_TIMESTAMP_FORMAT';
			break;
		case PropelTypes::DATE:
			$format = 'VIEW_DATE_FORMAT';
			break;
		default:
			$format = null;
			break;
	}
	$output = '<?php echo htmlentities($' . $single . '->' . $method . '(' . $format . ')) ?>';
	$label = $column_name;
	if ($column->isForeignKey()) {
		$fk = reset($column->getForeignKeys());
		$foreign_table_name = $fk->getForeignTableName();
		$label = ucfirst($foreign_table_name);
		$fk_single = strtolower($foreign_table_name);
		$foreign_method = 'get' . $foreign_table_name . 's';
		$foreign_column_name = reset($fk->getForeignColumns());
		$foreign_column_method = 'get' . StringFormat::titleCase($foreign_column_name);
		$foreign_open_foreach = '<?php foreach(' . $this->getModelName($foreign_table_name) . '::doSelect() as $' . $fk_single . '): ?>';
		$foreign_option = '<option <?php if($' . $single . '->get' . StringFormat::titleCase($column_name) . '() === $' . $fk_single . '->' . $foreign_column_method . '()) echo \'selected="selected"\' ?> value="<?php echo $' . $fk_single . '->' . $foreign_column_method . '() ?>"><?php echo $' . $fk_single . '?></option>';
		$foreign_close_foreach = '<?php endforeach ?>';
	}
	$label = StringFormat::titleCase($label, ' ');
	$input_id = strtolower($single . '_' . $column_name);
?>
		<div class="form-field-wrapper">
			<label class="form-field-label" for="<?php echo $input_id ?>"><?php echo $label ?></label>
<?php
	switch ($column->getType()) {
		case Model::COLUMN_TYPE_BOOLEAN:
?>
			<label>
				<input <?php echo '<?php if ($' . $single . '->' . $method . '() === 1) echo \'checked="checked"\' ?>' ?> name="<?php echo $column_name ?>" type="radio" value="1" />
				True
			</label>

			<label>
				<input <?php echo '<?php if ($' . $single . '->' . $method . '() === 0) echo \'checked="checked"\' ?>' ?> name="<?php echo $column_name ?>" type="radio" value="0" />
				False
			</label>
<?
			break;
		case Model::COLUMN_TYPE_LONGVARCHAR:
?>
			<textarea id="<?php echo $input_id ?>" name="<?php echo $column_name ?>"><?php echo $output ?></textarea>
<?php
			break;
		case PropelTypes::DATE:
?>
			<input id="<?php echo $input_id ?>" class="datepicker" type="text" name="<?php echo $column_name ?>" value="<?php echo $output ?>" />
<?php
			break;
		default:
			if($column->isForeignKey()){
?>
			<select id="<?php echo $input_id ?>" name="<?php echo $column_name ?>">
			<?php echo $foreign_open_foreach ?>

				<?php echo $foreign_option ?>

			<?php echo $foreign_close_foreach ?>

			</select>
<?php
			}
			else{
?>
			<input id="<?php echo $input_id ?>" type="text" name="<?php echo $column_name ?>" value="<?php echo $output ?>" />
<?php
			}
			break;
	}
?>
		</div>
<?php
}
?>
	</div>
	<div class="form-action-buttons ui-helper-clearfix">
		<span class="ui-state-default ui-corner-all ui-button-link">
			<span class="ui-icon ui-icon-disk"></span>
			<input type="submit" value="<?php echo '<?php echo $'.$single.'->isNew() ? "Save" : "Save Changes" ?>' ?>" />
		</span>
		<?php echo '<?php if (isset($_SERVER[\'HTTP_REFERER\'])): ?>' ?>

		<a class="ui-state-default ui-corner-all ui-button-link" href="<?php echo '<?php echo $_SERVER[\'HTTP_REFERER\'] ?>' ?>">
			<span class="ui-icon ui-icon-cancel"></span>
			Cancel
		</a>
		<?php echo '<?php endif ?>' ?>

	</div>
</form>