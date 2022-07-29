<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$aas=$ad->all(['sh'=>1]);
foreach ($aas as $aa) {
echo $aa['text'];
}
?>
    </marquee>