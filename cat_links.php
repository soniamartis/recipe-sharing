<?php

   $get_cat_query="select category_type,category_addr from category join category_pages using(category_id) where category_page_id=1 and category_id!=".$category_id."";
   $res_links=$db->query($get_cat_query);
   

?>