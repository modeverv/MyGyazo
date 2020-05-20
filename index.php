<?php
$filenames = glob("data/*.png");
?>
<?php foreach($filenames as $filename) { ?>
    <li><a target="_blank" href="<?php echo $filename ?>" ><img src="<?php echo $filename ?>" /></a>
<?php } ?>
