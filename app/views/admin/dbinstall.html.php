<h1><?=$message;?></h1>

<?=$this->form->create(); ?>
    <?=$this->form->field('poweruser');?>
    <?=$this->form->field('powerpass');?>
    <?=$this->form->submit('Install'); ?>
<?=$this->form->end(); ?>
