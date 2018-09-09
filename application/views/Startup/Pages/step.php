<div class="container">
    <div class="row">
        <div id="chat" class="col-4">
            <h2><?= $title;?></h2>
            <h3><?= $sub;?></h3>
            <?= $q;?>
        </div>
        <div id="visual" class="col-8">
            <?php 
            if($ctype) {
                $this->load->view('/startup/charts/'.$ctype,$cdata);
            } else {
                $this->load->view('/startup/charts/default');
            }
            ?>
        </div>
    </div>
</div>
    
