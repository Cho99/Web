!-- head -->
<?php $this->load->view('admin/tour/head',$this->data); ?>
<div class="line"></div>
<div class="wrapper">

	<!-- Form -->
	<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?= public_url('admin/') ?>images/icons/dark/add.png" class="titleIcon">
					<h6>Cập nhật Sản phẩm</h6>
				</div>

				<ul class="tabs">
					<li><a href="#tab1">Thông tin chung</a></li>
				</ul>

				<div class="tab_container">
					<div id="tab1" class="tab_content pd0">
						<div class="formRow">
							<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value="<?= $tour->name ?>"></span>
								<span name="name_autocheck" class="autocheck"></span>
								<div name="name_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
							<div class="formRight">
								<div class="left">
									<input type="file" id="image" name="image">
									<img style="width: 100px; height: 70px;" src="<?= base_url('upload/tour/'.$tour->image_link) ?>">
								</div>
								<div name="image_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label class="formLeft">Số lượng người:</label>
							<div class="formRight">
								<div class="left">
									<select name="amount">
										<?php $i = 1 ?>
										<?php for($i = 1; $i <= 30; $i++){ ?>
										<option value="<?= $i ?>" ><?= $i ?></option>
									    <?php } ?>
									</select>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="formRow">
							<label class="formLeft">Ngày bắt đầu:</label>
							<div class="formRight">
								<div class="left">
									<input type="date" id="ngay_di" name="ngay_di" multiple="">
								</div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label class="formLeft">Ngày kết thúc:</label>
							<div class="formRight">
								<div class="left">
									<input type="date" id="ngay_ve" name="ngay_ve" multiple="">
								</div>
							</div>
							<div class="clear"></div>
						</div> 


						<!-- Price -->
						<div class="formRow">
							<label class="formLeft" for="param_price">
								Giá :
								<span class="req">*</span>
							</label>
							<div class="formRight">
								<span class="oneTwo">
									<input name="price" style="width:100px" id="param_price" class="format_number" _autocheck="true" type="text" value="<?= $tour->price ?>">
									<img class="tipS" title="Giá bán sử dụng để giao dịch" style="margin-bottom:-8px" src="<?= 	public_url('admin/') ?>crown/images/icons/notifications/information.png">
								</span>
								<span name="price_autocheck" class="autocheck"></span>
								<div name="price_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>

						<!-- Price -->
						<div class="formRow">
							<label class="formLeft" for="param_discount">
								Giảm giá (%) 
								<span></span>:
							</label>
							<div class="formRight">
								<span>
									<input value="<?= $tour->discount ?>" name="discount" style="width:100px" id="param_discount" class="format_number" type="text">
									<img class="tipS" title="Phần trăm giảm giá" style="margin-bottom:-8px" src="<?= 	public_url('admin/') ?>crown/images/icons/notifications/information.png">
								</span>
								<span name="discount_autocheck" class="autocheck"></span>
								<div name="discount_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>


						<div class="formRow">
							<label class="formLeft" for="param_cat">Vùng:<span class="req">*</span></label>
							<div class="formRight">
								<select name="catalog"  class="left" >
									<option value=""></option>
									<!-- kiem tra danh muc co danh muc con hay khong -->
									<?php foreach ($catalogs as $row):?>
										<?php if(count($row->subs) > 1):?>
											<optgroup label="<?php echo $row->name?>">
												<?php foreach ($row->subs as $sub):?>
													<option value="<?php echo $sub->id?>"<?php if ($sub->id == $tour->catalog_id) echo 'selected';?>> <?php echo $sub->name?> </option>
												<?php endforeach;?>
											</optgroup>
											<?php else:?>
												<option value="<?php echo $row->id?>"<?php if ($row->id == $tour->catalog_id) echo 'selected';?>><?php echo $row->name?></option>
											<?php endif;?>
										<?php endforeach;?>
									</select>
									<span name="cat_autocheck" class="autocheck"></span>
									<div name="cat_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="formRow">
								<label class="formLeft">Nội dung:</label>
								<div class="formRight">
									<textarea name="content" id="param_content" class="editor"><?= $tour->content ?></textarea>
									<div name="content_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>
					</div><!-- End tab_container-->

					<div class="formSubmit">
						<input type="submit" value="Cập nhật" class="redB">
						<input type="reset" value="Hủy bỏ" class="basic">
					</div>
					<div class="clear"></div>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="clear"></div>