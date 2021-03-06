<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('define_public_charge_amount'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo form_open("system_settings/define_public_charge_amount/".$id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
			<input type="hidden" name="pub_id" value="<?=$id?>">
            <div class="form-group">
                <label><?= lang("period", "period"); ?></label>
                <?php echo form_input('period',$inc+1, 'class="form-control" id="period" required="required"'); ?>
            </div>
			<div class="form-group">
                <label> <?= lang("description", "description"); ?></label>
                <?php echo form_input('description', '', 'class="form-control" id="description" required="required"'); ?>
            </div>
			<div class="form-group">
                <label> <?= lang("dateline", "dateline"); ?></label>
                <?php echo form_input('dateline', '', 'class="form-control date" id="dateline" required="required"'); ?>
            </div>
			
			<div class="form-group">
                 <label><?= lang("amount", "amount"); ?></label>
                <?php echo form_input('amount', '', 'class="form-control" id="amount" '); ?>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('define_public_charge_amount', lang('save'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
