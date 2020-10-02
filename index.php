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
li { list-style : none;}
img { opacity: 0.5}
img:hover { opacity: 1; border: 10px solid lightblue}
img { border: 10px solid #ffffff }
</style>
<h1>おれのGyazo</h1>
<?php foreach($filenames as $f) { ?>
<li>
    <a target="_blank" href="<?php echo $f ?>" >
      <img src="<?php echo $f ?>" title="<?php echo $f?>" />
    </a>
<?php } ?>

