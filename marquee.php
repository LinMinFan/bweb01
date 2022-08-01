<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$adts=$ad->all($sh);
foreach ($adts as $adt) {
echo $adt['text']."&nbsp;&nbsp;&nbsp;";    
}
?>
</marquee>