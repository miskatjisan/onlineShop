<?php 
    include "inc/header.php";
?>
<div class="container_full">
    <div class="container">
        <div class="content_wrapper">
            <div class="middle_content floatleft">
                <div class=" not-found ">
                         <p><span>404</span>!Not Found. </p>
        		</div>
    		</div>
    	</div>
    </div>
</div>
                
<?php
   $filepath = realpath(dirname(__FILE__));
   include ($filepath."/inc/footer.php");
?>