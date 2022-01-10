<section class="logo-search">
<div class="container">
  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 logo">
    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>public/images/logoHN.png" alt="Green Construction" ></a>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 search">
    <form action="search" method="get" role="form">
      <div class="input-search">
        <input type="text" class="form-control" name="search" placeholder="Nhập từ khóa để tìm kiếm...">
        <button>
            <i class="fa fa-search"></i>
          </button>
          <!-- <form action="search" method= "get">
                        <input type="text" placeholder="Tìm kiếm..." name="search" id='autocomplete' required>
                        <button type="submit"><i class="fa fa-search"></i></button>
                      </form> -->
      </div>
    </form>
  </div>
  <div class="col-md-2 cart hidden-xs hidden-sm">
    <a href="gio-hang">
      <img src="<?php echo base_url() ?>public/images/cart.jpg" alt="Cart">
      <span>
        <?php  
          if($this->session->userdata('cart')){
            $val = $this->session->userdata('cart');
            echo count($val);
          }else{
            echo 0;
          }
        ?>
      </span>
    </a>
  </div>
</div>
</section>