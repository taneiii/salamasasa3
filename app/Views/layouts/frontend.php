<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codeigniter 4</title>
   <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
   
</head> 
<body>

<div class="app">
    <?= $this->include('layouts/inc/navbar.php') ?>
    <?= $this->renderSection('content') ?>
</div>


<script src="<?= base_url('assets/js/jquery-3.7.1.js');?>"></script>
<script src="<?=base_url('assets/js/popper.min.js');?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>