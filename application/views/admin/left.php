<div id="leftSide" style="padding-top:30px;">

   <!-- Account panel -->

   <div class="sideProfile">
      <a href="#" title="" class="profileFace"><img width="40" src="<?= public_url('admin') ?>/images/user.png">
      </a>
      <span>Xin chào: <strong>admin!</strong></span>
      <span>Chó</span>
      <div class="clear"></div>
   </div>
   <div class="sidebarSep"></div>
   <!-- Left navigation -->

   <ul id="menu" class="nav">

      <li class="home">
         <a href="<?= admin_url() ?>" class="active" id="current">
            <span>Bảng điều khiển</span>
            <strong></strong>
         </a>


      </li>
      <li class="tran">

         <a href="admin/tran.html" class="exp inactive">
            <span>Quản lý bán hàng</span>
            <strong>2</strong>
         </a>

         <ul class="sub" style="display: none;">
            <li>
               <a href="<?= admin_url('transaction') ?>">
								Giao dịch							</a>
            </li>
            <li>
               <a href="">
								Đơn hàng sản phẩm							</a>
            </li>
         </ul>

      </li>
      <li class="product">

         <a href="admin/product.html" class="exp inactive">
            <span>Tour Du lịch</span>
            <strong>2</strong>
         </a>

         <ul class="sub" style="display: none;">
            <li>
               <a href="<?= admin_url('tour') ?>">
								Tour						</a>
            </li>
            <li>
               <a href="<?= admin_url('catalog') ?>">
								Danh mục							</a>
            </li>
         </ul>

      </li>
      <li class="account">
         <a href="admin/account.html" class="exp inactive">
            <span>Tài khoản</span>
            <strong>1</strong>
         </a>

         <ul class="sub" style="display: none;">
            <li>
               <a href="<?= admin_url('admin') ?>">
								Ban quản trị							</a>
            </li>
         </ul>

      </li>
      <li class="content">

         <a href="admin/content.html" class="exp inactive">
            <span>Nội dung</span>
            <strong>4</strong>
         </a>

         <ul class="sub" style="display: none;">
            <li>
               <a href="<?= admin_url('slide') ?>">
								Banner
               </a>
            </li>
            <li>
               <a href="<?= admin_url('news') ?>">
								Tin tức							
               </a>
            </li>
         </ul>

      </li>

   </ul>

</div>
