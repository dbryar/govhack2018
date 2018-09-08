<div class="container">
    <div class="row">
        <div id="chat" class="col-4">
            <h1><?= $title;?></h1>
            <p class="lead">This is step <?= $step;?></p>
        </div>
        <div class="col-8">
            <?php $this->load->view('/startup/visuals'); ?>
        </div>
    </div>
</div>
    
