<section class="bg-light page-section" id="news">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">ข่าวสารประชาสัมพันธ์</h2>
              <h3 class="section-subheading text-muted">กิจกรรมภาพรวม</h3>
            </div>
          </div>
         
          <div class="row">
          <?
           if($news_coop){
            foreach ($news_coop as $val){
              $news_id = !empty($val['news_id'])? $val['news_id'] : '';
              $news_topic = !empty($val['news_topic'])? $val['news_topic'] : '';
              $news_picture = !empty($val['news_picture'])? $val['news_picture'] : '';
              $news_detail = !empty($val['news_detail'])? $val['news_detail'] : '';
              $news_create_date = !empty($val['news_create_date'])? $val['news_create_date'] : '';
              $news_create_by = !empty($val['news_create_by'])? $val['news_create_by'] : '';
              $news_update_date = !empty($val['news_update_date'])? $val['news_update_date'] : '';
            ?> 

            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" data-toggle="modal" href="<?php echo "#portfolioModal".$news_id; ?>">
                <img class="img-fluid" src="<?php echo "img/news/".$news_picture; ?>" alt="">
              </a>
              <div class="portfolio-caption">
                <h5><?php echo $news_topic;  ?></h5>
                <p class="text-muted"><?php echo "เขียนโดย คุณ ".$news_create_by;?></p>
              </div>
              <div><button class="btn btn-warning" onclick="window.open('../page_news.php?news=<?php echo $news_id; ?>');">อ่านเพิ่มเติม</button></div>
            </div>

         
            <? }} ?>
      </section>


<!-- News Modals -->

<!-- Call Modal 1 by 1 -->
<?
           if($news_coop){
            foreach ($news_coop as $val){
              $news_id = !empty($val['news_id'])? $val['news_id'] : '';
              $news_topic = !empty($val['news_topic'])? $val['news_topic'] : '';
              $news_picture = !empty($val['news_picture'])? $val['news_picture'] : '';
              $news_detail = !empty($val['news_detail'])? $val['news_detail'] : '';
              $news_create_date = !empty($val['news_create_date'])? $val['news_create_date'] : '';
              $news_create_by = !empty($val['news_create_by'])? $val['news_create_by'] : '';
              $news_update_date = !empty($val['news_update_date'])? $val['news_update_date'] : '';
            ?> 
<div class="portfolio-modal modal fade" id="<?php echo "portfolioModal".$news_id?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <!-- ส่วนนี้ใส่ข่าวสาร ชื่อ คำอธิบาย ดึงภาพ และ เนื้อหาลงได้ -->
                    <h2 class="text-uppercase"><?php echo $news_topic;  ?></h2>
                    <p class="item-intro text-muted"><?php echo $news_detail;  ?></p>
                    <img class="img-fluid d-block mx-auto" src="<?php echo "img/news/".$news_picture; ?>" alt="">
                    <img class="img-fluid d-block mx-auto" src="img/news/2.jpg" alt="">
                    <img class="img-fluid d-block mx-auto" src="img/news/3.jpg" alt="">
                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                    <ul class="list-inline">
                      <li>วันที่ลง: <? echo $news_update_date; ?></li>
                      <li>อัพเดทล่าสุด: Threads</li>
                      <li>เขียนโดย:คุณ <? echo " ".$news_create_by; ?></li>
                    </ul>
                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                      <i class="fas fa-times"></i>
                      ปิดเนื้อหา</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <? }} ?>
      
