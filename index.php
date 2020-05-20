<?php
$filenames = [];
foreach(glob("data/*.png") as $entry){
    $filenames[] = $entry;
}
function compare($a,$b){
  if(filemtime($a) == filemtime($b)){
    return 0;
  }
  return (filemtime($a) < filemtime($b)) ? 1 : -1;
}
usort($filenames,'compare');
?>
<style>
* { margin: 0;padding:0}
li { list-style : none;}
img { opacity: 0.8}
img:hover { opacity: 1}
</style>
<?php foreach($filenames as $filename) { ?>
    <li><a target="_blank" href="<?php echo $filename ?>" ><img src="<?php echo $filename ?>" /></a>
<?php } ?>
