<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
foreach ($ad->all($sh) as $key => $aa) {
?>
<span><?=$aa['text'];?> &nbsp;&nbsp;</span>
<?php
}    
?>
    </marquee>