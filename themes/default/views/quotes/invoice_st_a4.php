<?php //$this->erp->print_arrays($invs) ?>

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
    .container {
        width: 22.3cm;
        margin: 20px auto;
        padding: 10px;
        font-size: 14px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        position:relative;
    }
    .title-header tr{
        border: 1px solid #000 !important;
    }
    .border td,.border th{
        border: 1px solid #000 !important;
        border-top: 1px solid #000 !important;
    }

    @media print {
        .pageBreak {
            page-break-after: always;
            -webkit-page-break-after: always;
        }
        .container {

        }
        .row{
            margin: 10px auto !important;
        }
        .customer_label {
            padding-left: 0 !important;
        }
        .print th{
            color:white !important;
            background: #444 !important;

        }

        tbody{
            display:table-row-group;
        }
        thead {
            display: table-header-group;
            overflow: visible !important;
        }
        thead tr{
            break:inside: auto;
            clear:both;
        }
        tfoot {
            display: table-footer-group;
            -webkit-display: table-footer-group;
            page-break-after: always;
        }
        .invoice_label {
            padding-left: 0 !important;
        }

        #note{
            max-width: 95% !important;
            margin: 0 auto !important;
            border-radius: 5px 5px 5px 5px !important;
            margin-left: 26px !important;
        }
        .col-xs-12, .col-sm-12{
            padding-left:1px;
            padding-right:1px;
            margin-left:0px;
            margin-right:0px;
        }
        table {border-collapse: collapse;}
        tr {
            page-break-inside: avoid;
            -webkit-page-break-inside: avoid;
        }
    }

    body{
        font-size: 12px !important;
        font-family: "Khmer OS System";
        -moz-font-family: "Khmer OS System";
    }
    .header{
        font-family:"Khmer OS Muol Light" !important;
        -moz-font-family: "Khmer OS System";
        font-size: 18px;
    }


    .table > thead > tr > th,.table > thead > tr > td, tbody > tr > th, .table > tfoot > tr > th, .table > tbody > tr > td, .table > tfoot > tr > td{
        padding:5px;
    }
    .title{
        font-family:"Khmer OS Muol Light" !important;
        -mox-font-family:"Khmer OS Muol Light";
        font-size: 15px;
    }
    h4{
        margin-top: 0px;
        margin-bottom: 0px;
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
    .border-foot td{
        border: 1px solid #000 !important;
    }
    thead tr th{
        font-weight: normal;
        text-align: center;
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
        <?php
        $cols = 6;
        if ($discount != 0) {
            $cols = 7;
        }
        ?>
            <div class="row" style="margin-top: 20px !important;">
                <div class="col-sm-3 col-xs-3 " style="margin-top: 0px !important;">
                    <br>
                    <?php if(!empty($biller->logo)) { ?>
                        <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"id="hidedlo" style="width: 140px; margin-top: -10px;" />
                    <?php } ?>
                </div>
                <div  class="col-sm-7 col-xs-7 company_addr "  style="margin-top: -20px !important;">
                        <div class="myhide">
                            <center >
                                <?php if($biller->company) { ?>
                                    <h3 class="header "><?= $biller->company ?></h3>
                                <?php } ?>

                                <div style="margin-top: 15px; font-size: 12px">
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
                        <div class="invoice" style="margin-top:20px;">
                        <center>
                            <h4 class="title">បញ្ជីសម្រង់តម្លៃ</h4>
                            <h4 class="title" style="margin-top: 3px;">QUOTATION</h4>
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
            </div><br>
            <div class="row" style="text-align: left;">
                <div class="col-sm-6 col-xs-6" style="font-size: 12px">
                    <table >
                        <?php

                        if(!empty($customer->company)) { ?>
                            <tr>
                                <td style="width: 50%; font-weight: bold">ក្រុមហ៊ុន​​​​​​ / Company</td>
                                <td style="width: 5%;font-weight: bold">:</td>
                                <td style="width: 50%;"><?= $customer->company ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($customer->name_kh || $customer->name)) { ?>
                            <tr>
                                <td style="font-weight: bold">អតិថិជន / Customer </td>
                                <td style="font-weight: bold">:</td>
                                <?php if(($customer->name_kh)) { ?>
                                    <td><?= $customer->name_kh ?></td>
                                <?php }else { ?>
                                    <td><?= $customer->name ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                            <tr>
                                <td style="font-weight: bold">អាសយដ្ឋាន / Address </td>
                                <td style="font-weight: bold">:</td>
                                <?php if(!empty($customer->address_kh)) { ?>
                                    <td><?= $customer->address_kh?></td>
                                <?php }else { ?>
                                    <td><?= $customer->address ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                            <tr>
                                <td style="font-weight: bold">ទូរស័ព្ទលេខ (Tel)</td>
                                <td style="font-weight: bold">:</td>
                                <td><?= $customer->phone ?></td>
                            </tr>
                        <?php } ?>
                        <?php if(!empty($customer->vat_no)) { ?>
                            <tr>
                                <td style="width: 20% !important; font-weight: bold">លេខអត្តសញ្ញាណកម្ម អតប </td>
                                <td style="font-weight:bold">:</td>
                                <td><?= $customer->vat_no ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-sm-6 col-xs-6" style="padding-left: 110px !important; font-size: 12px">
                    <table class="noPadding" border="none">
                        <tr>
                            <td style="width: 50%; font-weight: bold">លេខរៀង / N<sup>o</sup></sup></td>
                            <td style="width: 5%;font-weight: bold">:</td>
                            <td style="width: 50%;"><?= $invs->reference_no ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">កាលបរិច្ឆេទ / Date</td>
                            <td style="font-weight: bold">:</td>
                            <td><?= $this->erp->hrld($invs->date); ?></td>
                        </tr>

                        <?php if ($invs->payment_term) { ?>
                            <tr>
                                <td style="font-weight: bold">រយៈពេលបង់ប្រាក់ </td>
                                <td style="font-weight: bold">:</td>
                                <td><?= $invs->payment_term ?></td>
                            </tr>
                            <tr>
                                <td style="width: 30% !important; font-weight: bold">កាលបរិច្ឆេទនៃការបង់ប្រាក់ </td>
                                <td style="font-weight: bold">:</td>
                                <td><?= $this->erp->hrsd($invs->due_date) ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            <div class="row test">
                <div class="col-sm-12 col-xs-12">
                    <table class="table table-bordered" style=" white-space: nowrap;width: 100%; margin-top: 10px;">
                        <tbody style="font-size: 14px;">
                            <tr class="border thead print" style="white-space: nowrap;background-color: #444 !important; color: #FFF !important;">
                                <th style="width: 50px">ល.រ<br />No</th>
                                <th style="width: 100px">លេខកូដទំនិញ<br />Product Code</th>
                                <th style="text-align: center">ឈ្មោះទំនិញ<br />Product Name</th>
            <!--                        <th>ការបញ្ជាក់<br />--><?//= strtoupper(lang('specification')) ?><!--</th>-->
                                <th>ខ្នាត<br />Unit</th>
                                <th>ចំនួន<br />Qty</th>
                                <th>តម្លៃ<br />Price</th>

                                <?php if ($Settings->product_discount) { ?>
                                    <th>បញ្ចុះតម្លៃ<br />Discount</th>
                                <?php } ?>
                                <?php if ($Settings->tax1) { ?>
                                    <th style="width: 10%">ពន្ធទំនិញ<br />Tax</th>
                                <?php } ?>
                                <th>តម្លៃសរុប<br />Subtotal</th>
                            </tr>

                <?php
               // $this->erp->print_arrays($rows);
                $no = 1;
                $erow = 1;
                $totalRow = 0;
                foreach ($rows as $row) {
                    $free = lang('free');
                    $product_unit = '';
                    $total = 0;

                    if($row->product_variant){
                        $product_unit = $row->product_variant;
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
                    ?>
                    <tr class="border">
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
                                if($row->unit_price==0){echo "Free";}
                                else{
                                    echo $this->erp->formatMoney($row->unit_price);
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
//                    if ($totalRow % 25 == 0) {
//                        echo '<tr class="pageBreak"></tr>';
//                    }

                }
                ?>
                <?php
                if($erow<12){
                    $k=12 - $erow;
                    for($j=1;$j<=$k;$j++) {
                        if($discount != 0) {
                            echo  '<tr class="border">
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
                            echo  '<tr class="border">
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
                    $col = 3;
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
                    $row += 2;
                }
                ?>

                <?php
                //$this->erp->print_arrays($invs);
                if ($invs->grand_total != $invs->total) { ?>
                    <tr class="border-foot">
                        <td rowspan = "<?= $row; ?>" colspan="<?= $col2; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                            <?php if (!empty($invss->invoice_footer)) { ?>
                                <p ><strong><u>Note:</u></strong></p>
                                <p style="margin-top:-5px !important; line-height: 2"><?= $invss->invoice_footer ?></p>
                            <?php } ?>
                        </td>
                        <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុប​ / <?= strtoupper(lang('total')) ?>
                            (<?= $default_currency->code; ?>)
                        </td>
                        <td align="right"><?=$this->erp->formatMoney($invs->total); ?></td>
                    </tr>
                <?php } ?>

                <?php if ($invs->order_discount != 0) : ?>
                    <tr class="border-foot">
                        <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បញ្ចុះតម្លៃ / <?= strtoupper(lang('order_discount')) ?></td>
                        <td align="right"><?php echo $this->erp->formatQuantity($invs->order_discount); ?></td>
                    </tr>
                <?php endif; ?>

                <?php if ($invs->shipping != 0) : ?>
                    <tr class="border-foot">
                        <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">ដឹកជញ្ជូន / <?= strtoupper(lang('shipping')) ?></td>
                        <td align="right"><?php echo $this->erp->formatQuantity($invs->shipping); ?></td>
                    </tr>
                <?php endif; ?>

                <?php if ($invs->order_tax != 0) : ?>
                    <tr class="border-foot">
                        <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">ពន្ធអាករ / <?= strtoupper(lang('order_tax')) ?></td>
                        <td align="right"><?= $this->erp->formatQuantity($invs->order_tax); ?></td>
                    </tr>
                <?php endif; ?>

                <tr class="border-foot">
                    <?php if ($invs->grand_total == $invs->total) { ?>
                        <td rowspan="<?= $row; ?>" colspan="<?= $col2; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                            <?php if (!empty($invss->invoice_footer)) { ?>
                                <p><strong><u>Note:</u></strong></p>
                                <p><?= $invss->invoice_footer ?></p>
                            <?php } ?>
                        </td>
                    <?php } ?>
                    <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុបរួម / <?= strtoupper(lang('total_amount')) ?>
                        (<?= $default_currency->code; ?>)
                    </td>
                    <td align="right">
                        <?php
                            if($invs->grand_total==0){echo "Free";}
                            else{
                                echo $this->erp->formatMoney($invs->grand_total);
                            }
                        ?>
                    </td>
                </tr>
                <?php if($invs->paid != 0 || $invs->deposit != 0){ ?>
                    <?php if($invs->deposit != 0) { ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">DEPOSIT (<?= strtoupper(lang('ប្រាក់កក់')) ?>)

                            </td>
                            <td align="right"><?php echo $this->erp->formatMoney($invs->deposit); ?></td>
                        </tr>
                    <?php } ?>
                    <?php if($invs->paid != 0) { ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">DEPOSIT (<?= strtoupper(lang('ប្រាក់កក់')) ?>)

                            </td>
                            <td align="right"><?php echo $this->erp->formatMoney($invs->paid-$invs->deposit); ?></td>
                        </tr>
                    <?php } ?>
                    <tr class="border-foot">
                        <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">នៅខ្វះ / <?= strtoupper(lang('balance')) ?>
                            (<?= $default_currency->code; ?>)
                        </td>
                        <td align="right"><?= $this->erp->formatMoney($invs->grand_total - (($invs->paid-$invs->deposit) + $invs->deposit)); ?></td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
            <?php if($invs->invoice_footer){ ?>
                <div style="height: auto; font-size: 12px" id="note" class="col-md-12 col-xs-12">
                    <p ><strong><u>Note:</u></strong></p>
                    <p style="margin-left: 10px;margin-top:10px;"><?php echo($invs->invoice_footer); ?></p>
                </div>
                <br><br><br>
            <?php }else{?>
            <div class="clear-both">
                <div style="width:100%;height:130px"></div>
            </div>
            <?php } ?>

            <div id="footer" class="row" >
                <div class="col-sm-4 col-xs-4">
                    <br><br>
                    <center>
                        <hr style="margin:0; border:1px solid #000; width: 80%">
                        <p style=" margin-top: 4px !important">ហត្ថលេខាអ្នកលក់</p>
                        <p style="margin-top:-10px;">Seller's Signature</p>
                    </center>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <center>

                    </center>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <br><br>
                    <center>
                        <hr style="margin:0; border:1px solid #000; width: 80%">
                        <p style=" margin-top: 4px !important">ហត្ថលេខាអ្នកទិញ</p>
                        <p style="margin-top:-10px; ">Customer's Signature</p>
                    </center>
                </div>
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