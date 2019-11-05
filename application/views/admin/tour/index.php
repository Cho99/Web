   <!-- head -->
<?php $this->load->view('admin/tour/head',$this->data); ?>

<div class="line"></div>

<div id="main_tour" class="wrapper">
  <?php $this->load->view('admin/message', $this->data); ?>
  <div class="widget">
  
    <div class="title">
      <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
      <h6>
        Danh sách Tour du lịch    
      </h6>
      <div class="num f12">Số lượng: <b><?php echo $total_rows?></b></div>
    </div>
    
    
    <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
      
      <thead class="filter"><tr><td colspan="8">
        <form method="get" action="<?php echo admin_url('tour')?>" class="list_filter form">
          <table cellspacing="0" cellpadding="0"><tbody>
          
            <tr>
              <td  class="label"><label for="filter_id">Mã số</label></td>
              <td class="item"><input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('id')?>" name="id"></td>
              
              <td style="width:40px;" class="label"><label for="filter_id">Tên</label></td>
              <td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('name')?>" name="name"></td>
              
              <td style="width:60px;" class="label"><label for="filter_status">Thể loại</label></td>
              <td class="item">
                <select name="catalog">
                  <option value=""></option>
                    <!-- kiem tra danh muc co danh muc con hay khong -->
                    <?php foreach ($catalogs as $row):?>
                    <?php if(count($row->subs) > 1):?>
                          <optgroup label="<?php echo $row->name?>">
                              <?php foreach ($row->subs as $sub):?>
                                <option value="<?php echo $sub->id?>" <?php echo ($this->input->get('catalog') == $sub->id) ? 'selected' : ''?>> <?php echo $sub->name?> </option>
                                <?php endforeach;?>
                          </optgroup>
                              <?php else:?>
                                <option value="<?php echo $row->id?>" <?php echo ($this->input->get('catalog') == $row->id) ? 'selected' : ''?>><?php echo $row->name?></option>
                    <?php endif;?>
                    <?php endforeach;?>
                </select>
              </td>
              
              <td style="width:150px">
              <input type="submit" value="Lọc" class="button blueB">
              <input type="reset" onclick="window.location.href = '<?php echo admin_url('tour')?>'; " value="Reset" class="basic">
              </td>
              
            </tr>
          </tbody></table>
        </form>
      </td></tr></thead>
      
      <thead>
        <tr>
          <td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
          <td style="width:60px;">Mã số</td>
          <td>Tên Tour</td>
          <td>Giá Tour</td>
          <td style="">Số lượng người</td>
          <td style="width:75px;">Ngày đi</td>
          <td style="width:75px;">Ngày về</td>
          <td style="width:120px;">Hành động</td>
        </tr>
      </thead>
      
      <tfoot class="auto_check_pages">
        <tr>
          <td colspan="8">
             <div class="list_action itemActions">
                <a url="<?php echo admin_url('tour/delete_all')?>" class="button blueB" id="submit" href="#submit">
                  <span style="color:white;">Xóa hết</span>
                </a>
             </div>
              
               <div class="pagination">
                    <?php echo $this->pagination->create_links()?>
                   </div>
          </td>
        </tr>
      </tfoot>
      
      <tbody class="list_item">
           <?php foreach ($list as $row):?>
          <tr class="row_<?php echo $row->id?>">
          <td><input type="checkbox" value="<?php echo $row->id?>" name="id[]"></td>
          
          <td class="textC"><?php echo $row->id?></td>
          
          <td>
          <div class="image_thumb">
            <img height="50" src="<?php echo base_url('upload/tour/'.$row->image_link)?>">
            <div class="clear"></div>
          </div>
          
          <a target="_blank" title="" class="tipS" href="">
              <b><?php echo $row->name?></b>
          </a>
          
          <div class="f11">
            Đã bán: <?php echo $row->buyed?>  | Xem: <?php echo $row->view?>          
           </div>
            
          </td>
          
          <td class="textR">
              <?php if($row->discount > 0):?>
                 <?php $price_new = $row->price - $row->discount;?>
                 <b style="color:red"><?php echo number_format($price_new)?> đ</b>
                 <p style="text-decoration:line-through"><?php echo number_format($row->price)?> đ</p>
              <?php else:?>
                  <b style="color:red"><?php echo number_format($row->price)?> đ</b>
              <?php endif;?>          
          </td>
           <td class="textC"><?= $row->amount ?></td>
          <td class="textC"><?php echo get_date($row->ngay_di)?></td>
          <td class="textC"><?php echo get_date($row->ngay_ve)?></td>
          
          <td class="option textC">
            <a title="Xem chi tiết sản phẩm" class="tipS" target="_blank" href="tour/view/9.html">
                <img src="<?php echo public_url('admin/images')?>/icons/color/view.png">
             </a>
             
             <a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('tour/edit/'.$row->id)?>">
              <img src="<?php echo public_url('admin/images')?>/icons/color/edit.png">
            </a>
            
            <a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('tour/del/'.$row->id)?>">
                <img src="<?php echo public_url('admin/images')?>/icons/color/delete.png">
            </a>
          </td>
        </tr>
        <?php endforeach;?>
       </tbody>
      
    </table>
  </div>
  
</div>


