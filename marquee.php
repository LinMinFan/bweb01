<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$ads = $ad->all(['sh'=>1]);
foreach ($ads as $value) {
    echo $value['text']."&nbsp;&nbsp;&nbsp;";
}
?>
                    	                    </marquee>