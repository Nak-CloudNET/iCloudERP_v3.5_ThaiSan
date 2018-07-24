<?php
	//$this->erp->print_arrays($invs);
	$note_arr = explode('/',$biller->phone);
	//$this->erp->print_arrays($note_arr[0],$note_arr[1],$note_arr[2]);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
	<meta charset="UTF-8">
	<title>Credit Note</title>
	<link href="<?php echo $assets ?>styles/theme.css" rel="stylesheet">
	<link href="<?php echo $assets ?>styles/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $assets ?>styles/custome.css" rel="stylesheet">
    <link href="<?= $assets ?>styles/helpers/bootstrap.min.css" rel="stylesheet"/>
</head>
<style>
	.container {
		width:18cm;
		margin: 20px auto;
		/*padding: 10px;*/
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
	}
	tbody{
		font-family:khmer Os;
		font-family:Times New Roman !important;
	}
	.table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th {
			background-color: #444 !important;
			color: #FFF !important;
		}
	.table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
		border: 1px solid #000 !important;
	}
	#tels span {
		padding-left: 23px;
	}
	#tels span:first-child {
		padding-left: 0 !important;
	}
	@media print {
		thead th,b {
			font-size: 12px !important;
		}
		tr td{
			font-size: 13px !important;
		}
		#footer {
			bottom:70px !important;
			position: absolute !important;
			width:100% !important;
		}
		#btn_print{
			display:none;
		}
        .noPadding tr td{
            padding-left: 30px !important;

        }
	}
    .noPadding tr{
        padding: 0px 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border: none;
    }
    .noPadding tr td{
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border:1px solid white;
    }
	.table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th {
			background-color: #444 !important;
			color: #FFF !important;
		}
	.table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
		border: 1px solid #000 !important;
	}
    @media print {
        .no-print {
            display:none !important;
        }
    }
</style>
<body>
    <div class="container">
        <div class="row" style="margin-top: 0px !important;">
            <div class="col-sm-3 col-xs-3 " style="margin-top: 0px !important;">
                <br>
                <?php if(!empty($biller->logo)) { ?>
                    <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"id="hidedlo" style="width: 140px; margin-top: -10px;" />
                <?php } ?>
            </div>
            <div  class="col-sm-7 col-xs-7 company_addr "  style="">
                <div class="myhide">
                    <center >
                        <?php if($biller->company) { ?>
                            <h3 class="header"><?= $biller->company ?></h3>
                        <?php } ?>

                        <div style="margin-top: 15px;">
                            <?php if(!empty($biller->vat_no)) { ?>
                                <p>លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->address)) { ?>
                                <p style="margin-top:-10px !important;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->phone)) { ?>
                                <p style="margin-top:-10px ;">Tel:&nbsp;<?= $biller->phone; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->email)) { ?>
                                <p style="margin-top:-10px !important;">E-mail:&nbsp;<?= $biller->email; ?></p>
                            <?php } ?>
                        </div>

                    </center>
                </div>

            </div>
            <div class="col-sm-2 col-xs-2 pull-right">
                <div class="row">
                    <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;margin-top: 10px !important;" onclick="window.print();">
                        <i class="fa fa-print"></i> <?= lang('print'); ?>
                    </button>
                </div>

                <div class="row">
                    <button type="button" class="btn btn-xs btn-default no-print pull-right " id="hide" style="margin-right:15px;" onclick="">
                        <i class="fa"></i> <?= lang('Hide/Show_header'); ?>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12" style="margin-top:10px;">
                <center>
                    <h4 class="title" style="margin-top: 3px;">Return Sale</h4>
                </center>

            </div>
        </div>

        <div class="row" style="text-align: left;">
            <div class="col-sm-6 col-xs-6">
                <table >
                    <?php

                    if(!empty($customer->company)) { ?>
                        <tr>
                            <td style="width: 40%;">ក្រុមហ៊ុន​​​​​​ / Company</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 30%;"><?= $customer->company ?></td>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->name_kh || $customer->name)) { ?>
                        <tr>
                            <td>អតិថិជន / Customer </td>
                            <td>:</td>
                            <?php if(($customer->name_kh)) { ?>
                                <td><?= $customer->name_kh ?></td>
                            <?php }else { ?>
                                <td><?= $customer->name ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td>អាសយដ្ឋាន / Address </td>
                            <td>:</td>
                            <?php if(!empty($customer->address_kh)) { ?>
                                <td><?= $customer->address_kh?></td>
                            <?php }else { ?>
                                <td><?= $customer->address ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td>ទូរស័ព្ទលេខ (Tel)</td>
                            <td>:</td>
                            <td><?= $customer->phone ?></td>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->vat_no)) { ?>
                        <tr>
                            <td style="width: 20% !important">លេខអត្តសញ្ញាណកម្ម អតប </td>
                            <td>:</td>
                            <td><?= $customer->vat_no ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="col-sm-6 col-xs-6" style="padding-left: 60px !important;">
                <table class="noPadding" border="none">
                    <tr>
                        <td style="width: 45%;">លេខរៀង / N<sup>o</sup></sup></td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 50%;"><?= $inv->reference_no ?></td>
                    </tr>
                    <tr>
                        <td>កាលបរិច្ឆេទ / Date</td>
                        <td>:</td>
                        <td><?= $this->erp->hrld($inv->date); ?></td>
                    </tr>
                    <tr>
                        <td>អ្នកលក់ / Sale Man</td>
                        <td>:</td>
                        <td><?= $inv->saleman; ?></td>
                    </tr>

                    <?php if ($inv->payment_term) { ?>
                        <tr>
                            <td>រយៈពេលបង់ប្រាក់ </td>
                            <td>:</td>
                            <td><?= $inv->payment_term ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30% !important">កាលបរិច្ឆេទនៃការបង់ប្រាក់ </td>
                            <td>:</td>
                            <td><?= $this->erp->hrsd($inv->due_date) ?></td>
                        </tr>
                    <?php }
                    $dis=0;
                    $taxx=0;
                    foreach ($rows as $row2) {
                        $dis+=$row2->item_discount;
                        $taxx+=$row2->item_tax;
                    }?>
                </table>
            </div>
        </div>
<br>

        <div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12" >
					<table class="table table-bordered table-hover" border="1">
				<thead>
					<tr>
						<th style="font-size:13px !important;" class="text-center">ល.រ</br><?=lang('Nº')?></th>
						<th style="font-size:13px !important;"class="text-center">លេខកូដ</br><?=lang('CODE')?></th>
						<th style="width:100% !;font-size:13px !important;"class="text-center">បរិយាយមុខទំនិញ</br><?=lang('DESCRIPTION')?></th>
						<th style="font-size:13px !important;"class="text-center">ខ្នាត</br><?=lang('UNIT')?></th>
						<th style="font-size:13px !important;"class="text-center">ចំនូន</br><?=lang('QUANTITY')?></th>
						<th style="font-size:13px !important;"class="text-center">តម្លៃ</br><?=lang('PRICE')?></th>
                        <?php if ($dis>0 ){ ?>
                            <th>បញ្ចុះតម្លៃ<br />Discount</th>
                        <?php }  ?>

                        <?php if ($taxx>0) { ?>
                            <th style="width: 10%; display: none;">ពន្ធទំនិញ<br />Tax</th>
                        <?php } ?>
						<th style="font-size:13px !important;"class="text-center">តម្លៃសរុប</br><?=lang(' AMOUNT')?></th>
					</tr>
				</thead>
				<tbody>
					<?php //for($i=0; $i<20; $i++){
						$i=1;$erow=1;
						if(is_array($rows)){
							$total = 0;
							foreach ($rows as $row):
							//$this->erp->print_arrays($row);
							$free = lang('free');
							$product_unit = '';
							
							
							if($row->variant){
								$product_unit = $row->variant;
							}else{
								$product_unit = $row->uname;
							}
							$product_name_setting;
							if($Settings->show_code == 0) {
								$product_name_setting = $row->product_name ;
							}else {
								if($Settings->separate_code == 0) {
									$product_name_setting = $row->product_name . " (" . $row->product_code . ")";
								}else {
									$product_name_setting = $row->product_name;
								}
							}

							if($row->option_id){
										
							   $getvar = $this->sales_model->getAllProductVarain($row->product_id);
									 foreach($getvar as $varian){
										 if($varian->product_id){
											 if($varian->qty_unit == 0){
												$var = $this->sales_model->getVarain($row->option_id);
												$str_unit = $var->name;
											 }else{
												$var = $this->sales_model->getMaxqtyByProID($row->product_id);
												$var1 = $this->sales_model->getVarain($var->product_id);									
												$str_unit = $var1->name;
											}
										 }else{
											$str_unit = $row->uname;
										}
									}
							}else{
								$str_unit = $row->uname;
							}

					?>
					<tr>
						<td style=" text-align:center; vertical-align:middle;"><?=$i;?></td>
						<td style="text-align:left; vertical-align:middle;"><?= $row->product_code ?></td>
						<td style="text-align:left; vertical-align:middle;width:200px;">
								<?= $product_name_setting ?>
								<?= $row->details ? '<br>' . $row->details : ''; ?>
								<?= $row->serial_no ? '<br>' . $row->serial_no : ''; ?>
						</td>
						<td style="text-align:center; vertical-align:middle;">
							<?php
								if($row->piece != 0){
									echo $str_unit;
								}else{ 
									echo $row->product_unit;
								}

							?>
						</td>
						<td style=" text-align:center; vertical-align:middle;">
							<?php 
								if($row->piece != 0){ 
									echo $row->piece; 
								}else{ 
									echo $this->erp->formatQuantity($row->quantity);}
							?>
						</td>
						
						<td style="text-align:center; vertical-align:middle;">
							
							<div class="col-xs-6 text-right">
								<?=$this->erp->formatMoney($row->unit_price); ?>
							</div>
						</td>
                        <?php if ($dis!=0) {?>
                            <td style="vertical-align: middle; text-align: center">

                                <?php
                                if(strpos($row->discount,"%")){
                                    echo "<small style='font-size:10px;'>(".$row->discount.")</small>" ;
                                }
                                echo $this->erp->formatMoney($row->item_discount);
                                ?>
                            </td>
                        <?php } ?>
                        <?php if ($taxx!=0) {?>
                            <td style="display: none;"></td>
                            <td >
                                <?=$this->erp->formatMoney($row->item_tax);?></td>
                        <?php } ?>
						<td style=" vertical-align:middle;">
							<div class="col-xs-3 text-left">
								<?php
									if ($row->subtotal!=0) {
										echo '';
									} else {
										echo '';
									}
								?>
							</div>
							<div class="col-xs-7 text-left">
								<?= $row->subtotal!=0 ? $this->erp->formatMoney($row->subtotal):$free; 
										$total += $row->subtotal;
										?>
							</div>
							
						</td>
					</tr>
					<?php 
						$i++;$erow++;
						endforeach;
					}
						$rSpan = 0;
						if ($total != $inv->grand_total) {
							$rSpan = 5;
						}
						if ($inv->paid != 0)  {
							$rSpan = 7;
						}
						
					?>
					<?php
						if($erow<10){
							$k=10 - $erow;
							for($j=1;$j<=$k;$j++){
                                if($dis != 0 ) {

                                    echo  '<tr class="border">
                                    <td height="34px" style="text-align: center; vertical-align: middle">'.$i.'</td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                             
                                    
                                </tr>';
                                }else{
                                    echo  '<tr class="border">
                                    <td height="34px" style="text-align: center; vertical-align: middle">'.$i.'</td>                                     
                                   
                                     <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>';
                                }
								$i++;
							}
						}
					?>

                    <?php
                    $row = 1;
                    $col =4;
                    $col2 = 4;
                    if($inv->total_discount){$col=4;$col2=3;}
                    if($inv->product_tax){$col=4;$col2=3;}
                    if($inv->total_discount>0 && $inv->product_tax>0 ){$col=5;$col2=3;}
                    if($inv->total_discount==0 && $inv->product_tax==0 ){$col=4;$col2=2;}
                    if ($discount != 0) {
                        $col =3;
                    }
                    if ($inv->grand_total != $inv->total) {
                        $row++;
                    }
                    if ($inv->order_discount != 0) {
                        $row++;
                        $col =3;
                    }
                    if ($inv->shipping != 0) {
                        $row++;
                        $col =3;
                    }
                    if ($inv->order_tax != 0) {
                        $row++;
                        $col =3;
                    }
                    if($inv->paid != 0 && $inv->deposit != 0) {
                        $row += 3;
                    }elseif ($inv->paid != 0 && $inv->deposit == 0) {
                        $row += 2;
                    }elseif ($inv->paid == 0 && $inv->deposit != 0) {
                    }
                    ?>

                    <?php

                    if ($inv->grand_total != $inv->total) { ?>
                        <tr class="border-foot">
                            <td rowspan = "<?= $row; ?>" colspan="<?= $col2; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                                <?php if (!empty($inv->invoice_footer)) { ?>
                                    <p ><strong><u>Note:</u></strong></p>
                                    <p style="margin-top:-5px !important; line-height: 2"><?= $inv->invoice_footer ?></p>
                                <?php } ?>
                            </td>
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុប​ / <?= strtoupper(lang('total')) ?>
                                (<?= $default_currency->code; ?>)
                            </td>
                            <td align="right"><?=$this->erp->formatMoney($invs->total); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if ($inv->order_discount != 0) : ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បញ្ចុះតម្លៃ / <?= strtoupper(lang('order_discount')) ?></td>
                            <td align="right"><small style='font-size:10px;'>(<?php echo $inv->order_discount_id; ?>%)</small>&nbsp;<?php echo $this->erp->formatMoney($inv->order_discount); ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php if ($inv->shipping != 0) : ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">ដឹកជញ្ជូន / <?= strtoupper(lang('shipping')) ?></td>
                            <td align="right"><?php echo $this->erp->formatMoney($inv->shipping); ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php if ($inv->order_tax != 0) : ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">ពន្ធអាករ / <?= strtoupper(lang('order_tax')) ?></td>
                            <td align="right"><?= $this->erp->formatMoney($inv->order_tax); ?></td>
                        </tr>
                    <?php endif; ?>

                    <tr class="border-foot">
                        <?php if ($inv->grand_total == $inv->total) { ?>
                            <td rowspan="<?= $row; ?>" colspan="<?= $col2; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                                <?php if (!empty($inv->invoice_footer)) { ?>
                                    <p><strong><u>Note:</u></strong></p>
                                    <p><?= $inv->invoice_footer ?></p>
                                <?php } ?>
                            </td>
                        <?php } ?>
                        <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុបរួម / <?= strtoupper(lang('total_amount')) ?>
                            (<?= $default_currency->code; ?>)
                        </td>
                        <td align="right">
                            <?php
                            if($inv->grand_total==0){echo "Free";}
                            else{
                                echo $this->erp->formatMoney($inv->grand_total);
                            }
                            ?>
                        </td>
                    </tr>
                    <?php if($inv->paid != 0 || $inv->deposit != 0){ ?>
                        <?php if($inv->deposit != 0) { ?>
                            <tr class="border-foot">
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បានកក់ / <?= strtoupper(lang('deposit')) ?>
                                    (<?= $default_currency->code; ?>)
                                </td>
                                <td align="right"><?php echo $this->erp->formatMoney($inv->deposit); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if($inv->paid != 0) { ?>
                            <tr class="border-foot">
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បានបង់ / <?= strtoupper(lang('paid')) ?>
                                    (<?= $default_currency->code; ?>)
                                </td>
                                <td align="right"><?php echo $this->erp->formatMoney($inv->paid-$inv->deposit); ?></td>
                            </tr>
                        <?php } ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">នៅខ្វះ / <?= strtoupper(lang('balance')) ?>
                                (<?= $default_currency->code; ?>)
                            </td>
                            <td align="right"><?= $this->erp->formatMoney($inv->grand_total - (($inv->paid-$inv->deposit) + $inv->deposit)); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
                        <?php if(trim(htmlspecialchars_decode($invs->note))){ ?>
                            <div style="border-radius: 5px 5px 5px 5px;border:1px solid black;height: auto;" id="note" class="col-md-12 col-xs-12">
                                <p style="margin-left: 10px;margin-top:10px;"><?php echo strip_tags($invs->note); ?></p>
                            </div>
                            <br><br><br><br>
                        <?php }else{ ?>
                            <div class="clear-both">
                                <div style="width:100%;height:110px"></div>
                            </div>
                        <?php } ?>
                        <div class="row" >
                            <div class="col-sm-4 col-xs-4">
                                <center>
                                    <hr style="margin:0; border:1px solid #000; width: 80%">
                                    <p>Customer</p>
                                </center>
                            </div>
                            <div class="col-sm-4 col-xs-4">

                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <center>
                                    <hr style="margin:0; border:1px solid #000; width: 80%">
                                    <p>Stock Controller</p>
                                </center>
                            </div>
                        </div>
                </div>
            </div>
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-xs-4" >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-warning no-print" href="<?= site_url('sales/return_sales'); ?>" style="margin-left: -20px; border-radius: 0">
                <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;Back        </a>
            <br><br>

        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    if(!<?=$inv->total_discount?$inv->total_discount:0 ; ?>){
        $('td:nth-child(8),th:nth-child(8)').hide();
    }
    if(!<?=$inv->product_tax?$inv->product_tax:0; ?>){
        $('td:nth-child(9),th:nth-child(9)').hide();
    }
</script>