<section id="content">
  <div class="row wraper">
    <div class="container">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-menu pull-left">
                    <?php $this->load->view('frontend/modules/category'); ?> 
                </div>
                <?php $this->load->view('frontend/modules/news'); ?> 
            </div>
      <div class = "col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content" id="list-content">
        <div class="product-wrap">
                    <?php foreach ($list as $item) :?>
                        <div class="news">
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <a href="tin-tuc/<?php echo $item['alias']; ?>"><img src="public/images/posts/<?php echo $item['img']; ?>" alt=""></a>
                            </div>
                            <div class="col-md-9 entry">
                                <div class="entry-title">
                                    <a href="tin-tuc/<?php echo $item['alias']; ?>"><h3><?php echo $item['title']; ?></h3></a>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><i class="fa fa-calendar" style="margin-right: 5px !important"></i><?php echo $item['created']; ?></li>
                                </ul>
                                <p></p>
                                <div class="entry-content">
                                    <a href="tin-tuc/<?php echo $item['alias']; ?>" class="more-link">Xem tiếp</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>            
                </div>
        <div class = "row text-center">
          <ul class ="pagination">
            <?php echo $strphantrang; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>