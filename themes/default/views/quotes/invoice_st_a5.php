<?php //$this->erp->print_arrays($discount['discount']) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice&nbsp;<?= $invs->reference_no ?></title>
    <link href="<?php echo $assets ?>styles/theme.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/custome.css" rel="stylesheet">
</head>
<style>
    body {
        font-size: 12px !important;
    }

    .container {
        width: 19.3cm;
    }
    .title{
        font-family:"Khmer OS Muol Light";
        -mox-font-family:"Khmer OS Muol Light";
        font-size: 15px;
    }
    @page {
        size: 8.5in 11in;
        margin: 2%;

        @top-left {
            content: "Hamlet";
        }
        @top-right {
            content: "Page " counter(page);
        }
    }


    @media print {
        .pageBreak {
            page-break-after: always;
        }
        .container {
            height: 20.5cm !important;
            margin-left: -11px !important;

        }
        .customer_label {
            padding-left: 0 !important;
        }

        .invoice_label {
            padding-left: 0 !important;
        }

        .row table tr td {
            font-size: 12px !important;
        }

        .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th {
            background-color: #444 !important;
            color: #FFF !important;
        }

        .row .col-xs-7 table tr td, .col-sm-5 table tr td{
            font-size: 12px !important;
        }
        #note{
            max-width: 95% !important;
            margin: 0 auto !important;
            border-radius: 5px 5px 5px 5px !important;
            margin-left: 26px !important;
        }
    }

    .thead th {
        text-align: center !important;
    }

    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
        border: 1px solid #000 !important;
    }

    .company_addr h3:first-child {
        font-family: Khmer OS Muol !important;
    //padding-left: 12% !important;
    }

    .company_addr h3:nth-child(2) {
        margin-top:-2px !important;
    //padding-left: 130px !important;
        font-size: 26px !important;
        font-weight: bold;
    }

    .company_addr h3:last-child {
        margin-top:-2px !important;
    //padding-left: 100px !important;
    }

    .company_addr p {
        font-size: 12px !important;
        margin-top:-10px !important;
        padding-left: 20px !important;
    }

    .inv h4:first-child {
        font-family: Khmer OS Muol !important;
        font-size: 12px !important;
    }

    .inv h4:last-child {
        margin-top:-5px !important;
        font-size: 12px !important;
    }

    button {
        border-radius: 0 !important;
    }
    .header{
        font-family:"Khmer OS Muol Light";
        -moz-font-family: "Khmer OS System";
        font-size: 18px;
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#hide").click(function(){
            $(".myhide").toggle();
        });
    });
</script>

<body>
<div class="container" style="margin: 0 auto;">
    <div class="col-xs-12" style="padding: 0">
        <div class="row" style=" margin-top: 20px !important;">
            <div class="col-sm-3 col-xs-3 " style=" margin-top: 0px !important;">
                <br>
                <?php if(!empty($biller->logo)) { ?>
                    <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"id="hidedlo" style="width: 140px; margin-top: -10px;" />
                <?php } ?>
            </div>
            <div  class="col-sm-7 col-xs-7 company_addr "  style="margin-top: -20px !important;margin-left:-20px !important;">
                <div class="myhide">
                    <center >
                        <?php if($biller->company) { ?>
                            <h3 class="header"><?= $biller->company ?></h3>
                        <?php } ?>

                        <div style="margin-top: 15px;">
                            <?php if(!empty($biller->vat_no)) { ?>
                               <p style="font-size: 14px !important;">លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->address)) { ?>
                                <p style="margin-top:-10px !important;font-size: 14px !important;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                            <?php } ?>

                           <?php if(!empty($biller->phone)) { ?>
                                <p style="margin-top:-10px ;font-size: 14px !important;">Tel:&nbsp;<?= $biller->phone; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->email)) { ?>
                                <p style="margin-top:-10px !important;font-size: 14px !important;">E-mail :&nbsp;<?= $biller->email; ?></p>
                            <?php } ?>
                        </div>

                    </center>
                </div>

            </div>
            <div class="col-sm-2 col-xs-2 pull-right">
                <div class="row">
                    <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
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
            <div class="invoice" style="margin-top: -10px !important">
                <center>
                    <h4 class="title">បញ្ជីសម្រង់តម្លៃ</h4>
                    <h4 class="title" style="margin-top:-10px !important;">QUOTATION</h4>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <table style="font-size: 14px;">
                    <?php if(!empty($customer->company)) { ?>

                        <tr>
                            <td style="width: 15%;">ក្រុមហ៊ុន </td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 20%;"><?= $customer->company ?></td>
                        </tr>
                    <?php } ?>

                    <?php if(!empty($customer->name_kh || $customer->name)) { ?>
                        <tr>
                            <td>អតិថិជន </td>
                            <td>:</td>
                            <?php if(!empty($customer->name_kh)) { ?>
                                <td><?= $customer->name_kh ?></td>
                            <?php }else { ?>
                                <td><?= $customer->name ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td>អាសយដ្ឋាន </td>
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
                            <td>ទូរស័ព្ទលេខ </td>
                            <td>:</td>
                            <td><?= $customer->phone ?></td>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->vat_no)) { ?>
                        <tr>
                            <td style="width: 25% !important">លេខអត្តសញ្ញាណកម្ម អតប </td>
                            <td>:</td>
                            <td><?= $customer->vat_no ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col-sm-6 col-xs-6">
                <table style="font-size: 14px;">
                    <tr>
                        <td style="width: 20%;">លេខរៀង  </td>
                        <td style="width: 5%;">:</td>
                        <td style="width: 30%;"><?= $invs->reference_no ?></td>
                    </tr>
                    <tr>
                        <td>កាលបរិច្ឆេទ </td>
                        <td>:</td>
                        <td><?= $this->erp->hrld($invs->date); ?></td>
                    </tr>
                    <tr>
                        <td>អ្នកលក់ </td>
                        <td>:</td>
                        <td><?= $invs->username; ?></td>
                    </tr>
                    <?php if ($invs->payment_term) { ?>
                        <tr>
                            <td>រយៈពេលបង់ប្រាក់ </td>
                            <td>:</td>
                            <td><?= $invs->payment_term ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30% !important">កាលបរិច្ឆេទនៃការបង់ប្រាក់ </td>
                            <td>:</td>
                            <td><?= $this->erp->hrsd($invs->due_date) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <?php
        $cols = 6;
        if ($discount != 0) {
            $cols = 7;
        }
        ?>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table table-bordered" style=" white-space: nowrap;width: 100%; margin-top: 10px;">
                    <tbody style="font-size: 14px;">
                    <tr class="thead" style="background-color: #444 !important; color: #FFF !important;">
                        <th>ល.រ<br />No</th>
                        <th>លេខកូដទំនិញ<br />Product Code</th>
                        <th>ឈ្មោះទំនិញ<br />Product Name</th>
                        <th>ខ្នាត<br />Unit</th>
                        <th>ចំនួន<br />Qty</th>
                        <th>តម្លៃ<br />Unit Price</th>

                        <?php if ($Settings->product_discount) { ?>
                            <th>បញ្ចុះតម្លៃ<br />Discount</th>
                        <?php } ?>
                        <?php if ($Settings->tax1) { ?>
                            <th>ពន្ធទំនិញ<br />Tax</th>
                        <?php } ?>
                        <th>តម្លៃសរុប<br />Subtotal</th>
                    </tr>
                    <?php

                    $no = 1;
                    $erow = 1;
                    $totalRow = 0;
                    foreach ($rows as $row) {
                        $free = lang('free');
                        $product_unit = '';
                        $total = 0;

                        if($row->variant){
                            $product_unit = $row->variant;
                        }else{
                            $product_unit = $row->uname;
                        }
                        $product_name_setting;
                        if($setting->show_code == 0) {
                            $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                        }else {
                            if($setting->separate_code == 0) {
                                $product_name_setting = $row->product_name . " (" . $row->product_code . ")" . ($row->variant ? ' (' . $row->variant . ')' : '');
                            }else {
                                $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                            }
                        }
                        $balance=$invs->grand_total - (($invs->paid-$invs->deposit) + $invs->deposit);

                        ?>
                        <tr class="border" style="font-size: 16px">
                            <td style="vertical-align: middle; text-align: center"><?php echo $no ?></td>
                            <td style="vertical-align: middle;">
                                <?=$row->product_code;?>
                            </td>
                            <td style="vertical-align: middle;">
                                <?=$row->product_name;?>
                            </td>

                            <td style="vertical-align: middle; text-align: center">
                                <?= $product_unit ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center">
                                <?=$this->erp->formatQuantity($row->quantity);?>
                            </td>
                            <td style="vertical-align: middle; text-align: right">
                                <?php
                                if($row->real_unit_price==0){echo "Free";}
                                else{
                                    echo $this->erp->formatMoney($row->real_unit_price);
                                }
                                ?>
                            </td>
                            <?php if ($row->item_discount) {?>
                                <td style="vertical-align: middle; text-align: center">
                                    <?=$this->erp->formatMoney($row->item_discount);?></td>
                            <?php } ?>
                            <?php if ($row->item_tax) {?>
                                <td style="vertical-align: middle; text-align: center">
                                    <?=$this->erp->formatMoney($row->item_tax);?></td>
                            <?php } ?>
                            <td style="vertical-align: middle; text-align: right">
                                <?php
                                if($row->subtotal==0){echo "Free";}
                                else{
                                    echo $this->erp->formatMoney($row->subtotal);
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        $erow++;
                        $totalRow++;
                        if ($totalRow % 25 == 0) {
                            echo '<tr class="pageBreak"></tr>';
                        }

                    }
                    ?>
                    <?php
                    if($erow<8){
                        $k=8 - $erow;
                        for($j=1;$j<=$k;$j++) {
                            if($discount != 0) {
                                echo  '<tr>
													<td height="34px" style="text-align: center; vertical-align: middle">'.$no.'</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>';
                            }else {
                                echo  '<tr>
													<td height="34px" style="text-align: center; vertical-align: middle">'.$no.'</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>';
                            }
                            $no++;
                        }
                    }
                    ?>
                    <?php

                    $row = 1;
                    $col =3;
                    $col2 = 5;
                    if($invs->total_discount){$col=3;$col2=4;}
                    if($invs->product_tax){$col=3;$col2=4;}
                    if($invs->total_discount>0 && $invs->product_tax>0 ){$col=4;$col2=4;}
                    if($invs->total_discount==0 && $invs->product_tax==0 ){$col=4;$col2=2;}
                    if ($discount != 0) {
                        $col =3;
                    }
                    if ($invs->grand_total != $invs->total) {
                        $row++;
                    }

                    if ($invs->order_discount != 0) {
                        $row++;
                        $col =3;
                    }
                    if ($invs->shipping != 0) {
                        $row++;
                        $col =3;
                    }
                    if ($invs->order_tax != 0) {
                        $row++;
                        $col =3;
                    }
                    if($invs->paid != 0 && $invs->deposit != 0) {
                        $row += 3;
                    }elseif ($invs->paid != 0 && $invs->deposit == 0) {
                        $row += 2;
                    }elseif ($invs->paid == 0 && $invs->deposit != 0) {
                    }

                    ?>

                    <?php //$this->erp->print_arrays($biller);
                    if ($invs->grand_total != $invs->total) { ?>
                        <tr>
                            <td rowspan = "<?= $row; ?>" colspan="<?= $col2; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                                <?php if (!empty($biller->invoice_footer)) { ?>
                                    <p style="font-size:14px !important;"><strong><u>Note:</u></strong></p>
                                    <p style="margin-top:-5px !important; line-height: 2"><?= $biller->invoice_footer ?></p>
                                <?php } ?>
                            </td>
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុប​ / <?= strtoupper(lang('total')) ?>
                                (<?= $default_currency->code; ?>)
                            </td>
                            <td align="right"><?=$this->erp->formatMoney($invs->total); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if ($invs->order_discount != 0) : ?>
                        <tr>
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បញ្ចុះតម្លៃ / <?= strtoupper(lang('order_discount')) ?></td>
                            <td align="right">$<?php echo $this->erp->formatQuantity($invs->order_discount).' $'; ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php if ($invs->shipping != 0) : ?>

                    <?php endif; ?>

                    <?php if ($invs->order_tax != 0) : ?>

                    <?php endif; ?>

                    <tr>
                        <?php if ($invs->grand_total == $invs->total) { ?>

                            <td rowspan="<?= $row; ?>" colspan="<?= $col2; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                                <?php  if (!empty($biller->invoice_footer)) { ?>
                                    <p><strong><u>Note:</u></strong></p>
                                    <p><?= $biller->invoice_footer ?></p>
                                <?php } ?>
                            </td>
                        <?php } ?>
                        <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុបរួម / <?= strtoupper(lang('total_amount')) ?>
                            (<?= $default_currency->code; ?>)
                        </td>
                        <td align="right"><?= $this->erp->formatMoney($invs->grand_total); ?></td>
                    </tr>
<!--                    --><?php //if($invs->paid != 0) { ?>
<!--                    <tr>-->
<!--                        <td colspan="--><?//= $col; ?><!--" style="text-align: right; font-weight: bold;">DEPOSIT (--><?//= strtoupper(lang('ប្រាក់កក់')) ?><!--)-->
<!---->
<!--                        </td>-->
<!--                        <td align="right">--><?php //echo $this->erp->formatMoney($invs->paid-$invs->deposit); ?><!--</td>-->
<!--                    </tr>-->
<!--                    --><?php //} ?>
<!--                    --><?php //if($balance != 0) { ?>
<!--                    <tr>-->
<!--                        <td colspan="--><?//= $col; ?><!--" style="text-align: right; font-weight: bold;">នៅខ្វះ / --><?//= strtoupper(lang('balance')) ?>
<!--                            (--><?//= $default_currency->code; ?><!--)-->
<!--                        </td>-->
<!--                        <td align="right">--><?//= $this->erp->formatMoney($balance); ?><!--</td>-->
<!--                    </tr>-->
<!--                    --><?php //} ?>
<!--                    --><?php //if($invs->paid != 0 || $invs->deposit != 0){ ?>
<!--                        --><?php //if($invs->deposit != 0) { ?>
<!---->
<!--                        --><?php //} ?>
<!--                        --><?php //if($invs->paid != 0) { ?>
<!---->
<!--                    --><?php //} ?>
<!---->
<!--                    --><?php //} ?>

                    </tbody>

                </table>
            </div>
        </div>
        <?php if($invs->note){ ?>
            <div style="border-radius: 5px 5px 5px 5px;border:1px solid black;font-size: 10px !important;margin-top: 10px;height: auto;" id="note" class="col-md-12 col-xs-12">
                <p style="margin-left: 10px;margin-top:10px;"><?php echo strip_tags($invs->note); ?></p>
            </div>
        <?php } ?>
        <br> <br> <br> <br>
    </div>	<!--div col sm 6 -->

    <div id="footer" class="row">
        <div class="col-sm-4 col-xs-4">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px; margin-top: 4px !important">ហត្ថលេខាអ្នកលក់</p>
                <p style="margin-top:-10px; font-size: 14px">Seller's Signature</p>
            </center>
        </div>
        <div class="col-sm-4 col-xs-4">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px; margin-top: 4px !important">ហត្ថលេខាអ្នកដឹក</p>
                <p style="margin-top:-10px; font-size: 14px">Delivery's Signature</p>
            </center>
        </div>
        <div class="col-sm-4 col-xs-4">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px; margin-top: 4px !important">ហត្ថលេខាអ្នកទិញ</p>
                <p style="margin-top:-10px; font-size: 14px">Customer's Signature</p>
            </center>
        </div>
    </div>
    <div style="width: 821px;margin: 20px">
        <a class="btn btn-warning no-print" href="<?= site_url('quotes'); ?>" style="border-radius: 0">
            <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
        </a>
    </div>
</div>
</body>
<script type="text/javascript">
    if(!<?=$invs->total_discount?$invs->total_discount:0; ?>){
        $('td:nth-child(7),th:nth-child(7)').hide();
    }
    if(!<?=$invs->product_tax?$invs->product_tax:0; ?>){
        $('td:nth-child(8),th:nth-child(8)').hide();
    }
</script>
</html>