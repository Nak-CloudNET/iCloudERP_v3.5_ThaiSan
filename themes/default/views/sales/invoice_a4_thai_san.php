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
        width: 100%;
        margin: 20px auto;
        padding: 15px;
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
        .container{
            padding: 15px !important;
        }
        .pageBreak {
            page-break-after: always;
            -webkit-page-break-after: always;
        }
        .address {
            margin-left: -7px !important;
        }
        .fax_phone {
            margin-left: -22px !important;
        }
        .phone {
            margin-left: -75px !important;
        }
        .email {
            margin-left: -90px !important;
        }
        .customer_label {
            padding-left: 0 !important;
        }
        tbody{
            display:table-row-group;
            -webkit-print-color-adjust: exact;
        }
        .print th{
            color:white !important;
            background: #444 !important;

        }
        tfoot {
            display: table-footer-group;
            -webkit-display: table-footer-group;
            page-break-after: always;
        }
        .invoice_label {
            padding-left: 0 !important;
        }
        #footer {
            bottom: 10px !important;
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


    }

    body{
        font-size: 12px !important;
        font-family: "Khmer OS System";
        -moz-font-family: "Khmer OS System";
    }
    .header{
        font-family:"Khmer OS Muol Light";
        -moz-font-family: "Khmer OS System";
        font-size: 18px;
    }

    .table > thead > tr > th,.table > thead > tr > td, tbody > tr > th, .table > tfoot > tr > th, .table > tbody > tr > td, .table > tfoot > tr > td{
        padding:5px;
    }
    .title{
        font-family:"Khmer OS Muol Light";
        -mox-font-family:"Khmer OS Muol Light";
        font-size: 20px;
    }
    .p{
        font-family: Khmer OS Muol Light;
        -mox-font-family: Khmer OS Muol Light;
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
<div class="container" style="width: 821px;margin: 0 auto;">
    <div class="col-xs-12">
        <?php

        $cols = 6;
        if ($discount != 0) {
            $cols = 7;
        }
        ?>

        <div class="row">
            <table class="table">
                <thead>
                <tr class="thead" style="border-left:none;border-right: none;border-top:none;">
                    <th colspan="9" style="border-left:none;border-right: none;border-top:none;border-bottom: 1px solid #000 !important;">
                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-sm-3 col-xs-3 " style="margin-top: 0px !important;">
                                <br>
                                <?php if(!empty($biller->logo)) { ?>
                                    <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"id="hidedlo" style="width: 140px; margin-left: 25px;margin-top: -10px;" />
                                <?php } ?>
                            </div>
                            <div  class="col-sm-7 col-xs-7 company_addr "  style="margin-top: -20px !important;">
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
                                <div class="invoice" style="margin-top:20px;">
                                    <center>
                                        <h4 class="title">វិក្កយបត្រ</h4>
                                        <h4 class="title" style="margin-top: 3px;">Invoice</h4>
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

                        <div class="row" style="text-align: left;">
                            <div class="col-sm-7 col-xs-7">
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

                            <div class="col-sm-5 col-xs-5">
                                <table class="noPadding" border="none">
                                    <tr>
                                        <td style="width: 45%;">លេខរៀង / N<sup>o</sup></sup></td>
                                        <td style="width: 5%;">:</td>
                                        <td style="width: 50%;"><?= $invs->reference_no ?></td>
                                    </tr>
                                    <tr>
                                        <td>កាលបរិច្ឆេទ / Date</td>
                                        <td>:</td>
                                        <td><?= $this->erp->hrld($invs->date); ?></td>
                                    </tr>
                                    <tr>
                                        <td>អ្នកលក់ / Sale Man</td>
                                        <td>:</td>
                                        <td><?= $invs->saleman; ?></td>
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
                    </th>
                </tr>

                <tr class="border thead print">
                    <th style="width:50px !important;"><b>ល.រ<br>No</b></th>
                    <th style="width:300px !important;"><b>បរិយាយមុខទំនិញ<br>Description</b></th>
                    <th style="width:150px !important;"><b>ទំហំ<br>Size</b></th>
                    <th style="width:70px !important;"><b>ចំនួន<br>Qty</b></th>
                    <th style="width:70px !important;"><b>ខ្នាត<br>U/N</b></th>
                    <th style="width:80px !important;"><b>តម្លៃ<br>U/Price</b></th>
                    <?php
                    if($invs->product_discount > 0){ ?>
                        <th style="width:80px !important;"><b>បញ្ចុះតម្លៃ<br>Dis</b></th>
                    <?php } ?>
                    <th style="width:100px !important;"><b>តម្លៃសរុប<br>Amount</b></th>
                </tr>
                </thead>
                <tbody>

                <?php

                $no = 1;
                $erow = 1;
                $totalRow = 0;
                $arr_product_name = array();
                $arr_count = array();
                $product_name = '';
                $pt_name = array();
                $cn = 1;
                $newArr = array();
                foreach ($rows as $count_row) {
                    $arr_count[$count_row->product_invoice]++;
                }
//$this->erp->print_arrays($rows);
                foreach ($rows as $row) {
                    $free = lang('free');
                    $product_unit = '';
                    $total = 0;
                    if($row->product_variant){
                        $product_unit = $row->product_variant;
                    }else{
                        $product_unit = $row->uname;
                    }
                    ?>
                    <tr class="border">

                        <?php

                        if(in_array($row->product_invoice, $arr_product_name)){
                            $product_name = '';
                        }else{
                            $product_name = $row->product_invoice;
                            $arr_product_name[] = $row->product_invoice;
                            ?>
                            <td style="vertical-align: top; text-align: center" rowspan="<?= $arr_count[$product_name]; ?>"><?php echo $no ?></td>
                            <td style="vertical-align: top;" rowspan="<?= $arr_count[$product_name]?>"><?= $product_name; ?></td>
                            <?php
                            $no++;
                        }

                        ?>
                        <td style="vertical-align: middle;text-align:center">
                            <?=$row->product_noted;?>
                        </td>
                        <td style="vertical-align: middle; text-align: center">
                            <?=$this->erp->formatQuantity($row->quantity);?>
                        </td>
                        <td style="vertical-align: middle; text-align: center; text-align:center">
                            <?= $product_unit; ?>
                        </td>
                        <td style="vertical-align: middle; text-align: right"><span style="float:left;"></span>
                            <?php
                            if($row->unit_price==0){
                                echo "Free";
                            }else
                            {
                                echo $this->erp->formatMoney($row->unit_price);
                            }
                            ?>
                        </td>
                        <?php if($invs->product_discount > 0){ ?>
                            <td style="vertical-align: middle; text-align: right"><span style="float:left;"></span>
                                <?php echo $this->erp->formatMoney($row->item_discount); ?>
                            </td>
                        <?php  } ?>

                        <td style="vertical-align: middle; text-align: right"><span style="float:left;"></span>
                            <?php
                            if($row->subtotal==0){
                                echo "Free";
                            }
                            else{
                                echo $this->erp->formatMoney($row->subtotal);
                            }
                            ?>
                        </td>
                    </tr>

                    <?php

                    $erow++;
                    $totalRow++;
                }

                ?>

                <?php
                $row = 1;
                $col =4;
                if ($invs->product_discount != 0) {
                    $col++;
                }/*
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
                } */
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="border-foot">
                    <td colspan="<?= $col; ?>" style="border-top: 1px solid #FFF !important; border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;"></td>
                    <td colspan="2" style="text-align: center; font-weight: bold;">TOTAL CASH</td>
                    <td align="right"><span style="float:left;"></span><?=$this->erp->formatMoney($invs->total); ?></td>
                </tr>
                <?php if($invs->order_discount != 0) { ?>
                    <tr class="border-foot">
                        <td colspan="<?= $col; ?>" style="border-top: 1px solid #FFF !important; border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;"></td>
                        <td colspan="2" style="text-align: center; font-weight: bold;">ORDER DISCOUNT</td>
                        <td align="right"><span style="float:left;"></span><?=$this->erp->formatMoney($invs->order_discount); ?></td>
                    </tr>
                <?php } ?>

                <?php if($invs->shipping != 0) { ?>
                    <tr class="border-foot">
                        <td colspan="<?= $col; ?>" style="border-top: 1px solid #FFF !important; border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;"></td>
                        <td colspan="2" style="text-align: center; font-weight: bold;">SHIPPING</td>
                        <td align="right"><span style="float:left;"></span><?=$this->erp->formatMoney($invs->shipping); ?></td>
                    </tr>
                <?php } ?>

                <tr class="border-foot">
                    <td colspan="<?= $col; ?>" style="border-top: 1px solid #FFF !important; border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;"></td>
                    <td colspan="2" style="text-align: center; font-weight: bold;">DEPOSIT</td>
                    <td align="right"><span style="float:left;"></span><?=$this->erp->formatMoney($invs->paid); ?></td>
                </tr>
                <tr class="border-foot">
                    <td colspan="<?= $col; ?>" style="border-top: 1px solid #FFF !important; border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;"></td>
                    <td colspan="2" style="text-align: center; font-weight: bold;">BALANCE</td>
                    <td align="right"><span style="float:left;"></span><?=$this->erp->formatMoney($invs->grand_total - $invs->paid); ?></td>
                </tr>
                </tbody>
                <tfoot class="tfoot">
                <tr>
                    <th colspan="8">
                        <div id="footer" class="row">
                            <br/>
                            <div class="col-sm-4 col-xs-4">
                                <center>
                                    <p>CUSTOMER</p>
                                    <br/><br/><br/><br/><br/>
                                    <hr style="margin:0; border:1px solid #000; width: 80%">
                                </center>
                            </div>
                            <div class="col-sm-4 col-xs-4">

                            </div>
                            <div class="col-sm-4 col-xs-4 pull-right">
                                <center>
                                    <p>THAI SAN GLASS</p>
                                    <br/><br/><br/><br/><br/>
                                    <hr style="margin:0; border:1px solid #000; width: 80%">
                                </center>
                            </div>
                        </div>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div style="width: 821px;margin: 20px">
            <a class="btn btn-warning no-print" href="<?= site_url('sales'); ?>" style="border-radius: 0">
                <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
            </a>
        </div>
    </div>

</body>
</html>