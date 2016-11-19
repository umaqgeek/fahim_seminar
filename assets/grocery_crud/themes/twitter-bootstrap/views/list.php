<?php
if(!empty($list)){ ?>
<div class="span11" >
	<table class="table table-bordered tablesorter table-striped">
		<thead>
			<tr class="table-striped-custom">
				<?php foreach($columns as $column){?>
				<th>
					<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>"
						rel="<?php echo $column->field_name?>">
						<?php echo $column->display_as; ?>
					</div>
				</th>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
				<th class="no-sorter">
						<?php echo $this->l('list_actions'); ?>
				</th>
				<?php }?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($list as $num_row => $row){ ?>
			<tr class="<?php echo ($num_row % 2 == 1) ? 'erow' : ''; ?>">
				<?php foreach($columns as $column){?>
					<td class="<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>">
						<div class="text-left"><?php echo ($row->{$column->field_name} != '') ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
					</td>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !empty($actions)){?>
				<td align="left">
					<div class="tools">
						<div class="btn-group">

								<?php
								if(!$unset_edit){?>
										<a style="padding:10%" href="<?php echo $row->edit_url?>" title="<?php echo $this->l('list_edit')?> <?php echo $subject?>">
											<i class="icon-pencil"></i>
											<?php echo $this->l('list_edit') . ' ' . $subject; ?>
										</a>
								<?php
								}
								if(!$unset_delete){?>
									
										<a onclick="javascript: return confirmationModalDialog('Delete','Are you sure you want to delete?','<?php echo $row->delete_url?>')" data-target-url="<?php echo $row->delete_url?>" title="<?php echo $this->l('list_delete')?> <?php echo $subject?>" class="delete-row" >
											<i class="icon-trash"></i>
											<?php echo $this->l('list_delete') . ' ' . $subject; ?>
										</a>
	

										<!--<a onclick = "javascript: return deteleGroceryCrudInformation('<?php echo $row->delete_url?>')" href="javascript:void(0);" data-target-url="<?php echo $row->delete_url?>" title="<?php echo $this->l('list_delete')?> <?php echo $subject?>" class="delete-row" >
											<i class="icon-trash"></i>
											<?php echo $this->l('list_delete') . ' ' . $subject; ?>
										</a>-->
									
								<?php
								}
								if(!empty($row->action_urls)){
									foreach($row->action_urls as $action_unique_id => $action_url){
										$action = $actions[$action_unique_id];
										?>
										
											<a href="<?php echo $action_url; ?>" tooltip="<?=$action->label;?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>"><?php
											if(!empty($action->image_url)){ ?>
												<img src="<?php echo $action->image_url; ?>" alt="" />
											<?php
											}
											
											?>
											</a>
										
									<?php
									}
								}
								?>
								
							</div>
							<div class="clear"></div>
						</div>
					</td>
					<?php }?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php }else{ ?>
	<br/><?php echo $this->l('list_no_items'); ?><br/><br/>
<?php }?>