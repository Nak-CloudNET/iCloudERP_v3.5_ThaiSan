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
        //font-size: 26px !important;
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
        font-size: 12px;
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
        <div class="row" style="margin-top: 20px !important;">

            <div class="col-sm-3 col-xs-3 " style="margin-top: 0px !important;">
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
                                <p style="font-size: 12px !important;">លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->address)) { ?>
                                <p style="margin-top:-10px !important;font-size: 12px !important;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->phone)) { ?>
                                <p style="margin-top:-10px ;font-size: 12px !important;">Tel:&nbsp;<?= $biller->phone; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->email)) { ?>
                                <p style="margin-top:-10px !important;font-size: 12px !important;">E-mail :&nbsp;<?= $biller->email; ?></p>
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
            <div class="col-sm-12 col-xs-12">
                <center>
                    <h4 style="font-size: 14px !important; font-weight: bold;font-family: 'Khmer OS Muol Light' !important;">វិក្កយបត្រផ្ទេរទំនិញ</h4>
                    <h4 style="font-size: 14px !important; font-weight: bold;">Invoice Transfer</h4>
                </center>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-7 col-xs-7">
                <table style="font-size: 12px;">

                        <tr>
                            <td><?= lang("from");?>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><span style="font-size:12px;"><?= $from_warehouse->name; ?></span></td>

                        </tr>
                        <tr>
                            <td><?= lang("Reference");?>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><span style="font-size:12px;"><?= $inv->transfer_no; ?></span></td>

                        </tr>
                </table>
            </div>
            <?php //$this->erp->print_arrays();?>
            <div class="col-sm-5 col-xs-5">
                <table style="font-size: 12px;">

                        <tr>
                            <td><?= lang("To");?>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><span style="font-size:12px;"><?= $to_warehouse->name; ?></span></td>

                        </tr>

                        <tr>
                            <td><?= lang("Date");?>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td><span style="font-size:12px;"><?= $this->erp->hrld($inv->date); ?></span></td>

                        </tr>
                </table>
            </div>

        </div>

        <?php
       //$this->erp->print_arrays($rows);
        $cols = 6;
        if ($discount != 0) {
            $cols = 7;
        }
        ?>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table table-bordered" style="width: 100%; margin-top: 10px;">
                    <tbody style="font-size: 12px !important;">
                    <tr class="thead" style="white-space: nowrap;background-color: #444 !important; color: #FFF !important;">
                        <th>ល.រ<br />No</th>
                        <th>លេខកូដទំនិញ<br />Product Code</th>
                        <th>ឈ្មោះទំនិញ<br />Product Name</th>
                        <th>ខ្នាត<br />Unit</th>
                        <th>ចំនួន<br />Qty</th>

                    </tr>
                    <?php

                    $no = 1;
                    $erow = 1;
                    $totalRow = 0;
                    foreach ($rows as $row) {
                        $free = lang('free');
                        $product_unit = '';
                        $total = 0;
                        //$this->erp->print_arrays($row);
                        if($row->variant){
                            $product_unit = $row->variant;
                        }else{
                            $product_unit = $row->name;
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
                        <tr>
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
                                <?= $this->erp->formatQuantity($row->quantity);?>
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
                            echo  '<tr>
                                        <td height="34px" style="text-align: center; vertical-align: middle">'.$no.'</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>';

                            $no++;
                        }
                    }
                    ?>

                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">សរុបរួម / <?= strtoupper(lang('total_amount')) ?>
                            (<?= $default_currency->code; ?>)
                        </td>
                        <td align="right"><?= $this->erp->formatQuantity($row->TQty); ?></td>
                    </tr>


                    </tbody>

                </table>
            </div>
        </div>
        <?php if($invs->note){ ?>
            <div style="border-radius: 5px 5px 5px 5px;border:1px solid black;font-size: 10px !important;margin-top: 10px;height: auto;" id="note" class="col-md-12 col-xs-12">
                <p style="margin-left: 10px;margin-top:10px;"><?php echo strip_tags($invs->note); ?></p>
            </div>
        <?php } ?>
        <br><br><br><br><br>
    </div>	<!--div col sm 6 -->

    <div id="footer" class="row">
        <div class="col-sm-4 col-xs-4">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px; margin-top: 4px !important">ហត្ថលេខាអ្នកកាន់ឃ្លាំង</p>
                <p style="margin-top:-10px; font-size: 14px">Stock Controller Signature</p>
            </center>
        </div>

        <div class="col-sm-4 col-xs-4">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px; margin-top: 4px !important">ហត្ថលេខាអ្នកដឹក</p>
                <p style="margin-top:-10px; font-size: 14px">Deliver's Signature</p>
            </center>
        </div>

        <div class="col-sm-4 col-xs-4">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px; margin-top: 4px !important">ហត្ថលេខាអ្នកទទួល</p>
                <p style="margin-top:-10px; font-size: 14px">Receiver's Signature</p>
            </center>
        </div>
    </div>

    <div style="width: 821px;margin: 20px">
        <?php
            if ($type == 'pos') {
        ?>
                <a class="btn btn-warning no-print" href="<?= site_url('pos/sales'); ?>" style="border-radius: 0">
                    <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
                </a>
        <?php
            } else {
        ?>
                <a class="btn btn-warning no-print" href="<?= site_url('transfers'); ?>" style="border-radius: 0">
                    <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
                </a>
        <?php
            }
        ?>

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