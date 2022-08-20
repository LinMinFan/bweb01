<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
    $shads=$ad->all($sh);
    foreach ($shads as $key => $shad) {
        echo $shad['text']."&nbsp;&nbsp;&nbsp;";
    }
?>
</marquee>