<html><body bgcolor=#000000><tt>
<?php
$im = imagecreatefrompng('../images/icons/close.png');
$dx = imagesx($im);
$dy = imagesy($im);
for($y = 0; $y < $dy; $y++) {
for($x=0; $x < $dx; $x++) {
$col = imagecolorat($im, $x, $y);
$rgb = imagecolorsforindex($im,$col);
printf('<font color=#%02x%02x%02x>k</font>',
$rgb['red'],$rgb['green'],$rgb['blue']);
}
echo "<br>\n";
}
imagedestroy($im);
?>
</tt></body></html>