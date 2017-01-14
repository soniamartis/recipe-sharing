<?php

   $get_reg_query="select region_name,region_addr from region where region_id!=".$region_id."";
   $res_links=$db->query($get_reg_query);
   

?>