<style>
h1 {
  font-size: 2.5em;
  /* 40px/16=2.5em */
}


.detail {
  font-size: 1.5rem;
  color: #ffffff;
  text-shadow: -2px 0 black, 0 1px black, 1px 0 black, 0 -2px black;

}

.a a:link,
la:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover,
a:active {
  background-color: #B772CC;
}
</style>
<section class="bg-light page-section" id="ourwork">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide" id="carousel-944376">
        <ol class="carousel-indicators">
          <li data-slide-to="0" data-target="#carousel-944376" class="active">
          </li>
          <?
					if($ourwork_num){
            foreach ($ourwork_num as $val){
              $ourwork_id = !empty($val['ourwork_id'])? $val['ourwork_id'] : '';
					?>
          <li data-slide-to="<? echo $ourwork_id; ?>" data-target="#carousel-944376">
          </li>
          <? }}?>
        </ol>

        <?php if($ourwork_first){
            foreach ($ourwork_first as $val){
			  $ourwork_id = !empty($val['ourwork_id'])? $val['ourwork_id'] : ''; 
			  $ourwork_id = !empty($val['ourwork_id'])? $val['ourwork_id'] : '';
              $ourwork_title = !empty($val['ourwork_title'])? $val['ourwork_title'] : '';
              $ourwork_photo = !empty($val['ourwork_photo'])? $val['ourwork_photo'] : '';
			  $ourwork_detail = !empty($val['ourwork_detail'])? $val['ourwork_detail'] : ''; 
			  ?>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" alt="Carousel Bootstrap First" src="<? echo " img/ourwork/" .$ourwork_photo; ?>"
            />
            <div class="carousel-caption">
              <h4>
                <? echo $ourwork_title; ?>
              </h4>

              <a href="page_ourwork.php?ourwork=<?php echo $ourwork_id;?>" target="_blank">ตรวจสอบ</a>
            </div>
          </div>
          <? }}?>
          <?
           	if($find_ourwork_coop){
            foreach ($find_ourwork_coop as $val){
              $ourwork_id = !empty($val['ourwork_id'])? $val['ourwork_id'] : '';
              $ourwork_title = !empty($val['ourwork_title'])? $val['ourwork_title'] : '';
              $ourwork_photo = !empty($val['ourwork_photo'])? $val['ourwork_photo'] : '';
              $ourwork_detail = !empty($val['ourwork_detail'])? $val['ourwork_detail'] : '';
              $ourwork_create_date = !empty($val['ourwork_create_date'])? $val['ourwork_create_date'] : '';
              $ourwork_create_by = !empty($val['ourwork_create_by'])? $val['ourwork_create_by'] : '';
              
            ?>
          <div class="carousel-item">
            <img class="d-block w-100" alt="Carousel Bootstrap Second" src="<? echo " img/ourwork/" .$ourwork_photo; ?>"
            stype="">
            <div class="carousel-caption">
              <div id="datail">
                <? echo $ourwork_title; ?>
              </div>


              <a href="page_ourwork.php?ourwork=<?php echo $ourwork_id;?>" target="_blank">ตรวจสอบ</a>

            </div>
          </div>
          <?php }} ?>
        </div> <a class="carousel-control-prev" href="#carousel-944376" data-slide="prev"><span
            class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a
          class="carousel-control-next" href="#carousel-944376" data-slide="next"><span
            class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
      </div>
    </div>
  </div>
</section>