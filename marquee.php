<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$marqs=$ad->all(['sh'=> 1]);
foreach ($marqs as $key => $marq) {
?>
<span><?=$marq['text'];?>&nbsp;&nbsp;&nbsp;</span>
<?php
}
?>
</marquee>