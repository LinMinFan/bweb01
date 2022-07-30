
<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$textads=$ad->all($sh);
foreach ($textads as $textad) {
    echo $textad['text']."&nbsp;&nbsp;&nbsp;";
}
?>
    
    </marquee>