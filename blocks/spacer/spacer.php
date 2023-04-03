<?php
$height = ''; // set default value

switch (get_field('size')) {
	case 'xs':
		$height = 'h-4';
		break;
	case 'sm':
		$height = 'h-6';
		break;
	case 'base':
		$height = 'h-10';
		break;
	case 'lg':
		$height = 'h-20';
		break;
	case 'xl':
		$height = 'h-40';
		break;
}
?>
<?php if ( get_field( 'add_divider' ) == 1 ) :
	$divider = 'border-t border-gray-300';
else :
	$divider = '';
endif; ?>
<div class="bb-spacer-block <?php echo $height; ?> <?php echo $divider; ?>">
	
</div>

