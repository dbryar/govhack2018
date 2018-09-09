<body class="sky">
    <div id="app">
        <nav class="header">
            <div class="logo">
                <img src="/img/failicorn-logo-white.png">Failicorn
            </div>
            <div class="back"><a href="<?= $prev;?>"><i class="fas fa-arrow-circle-left"></i></a></div>
            <div class="next"><a href="<?= $next;?>"><i class="fas fa-arrow-circle-right"></i></a></div>
        </nav>
        <div class="question"><?= $qtext;?></div>
        <div class="answers">
<?php if($qansw) {
    foreach($qansw as $link) {
        echo $link;
    }
} else { ?>
            <a href="#visual"><i class="fa fa-thumbs-down fa-3x"></i></a>
            <a href="#visual"><i class="fa fa-question-circle fa-3x"></i></a>
            <a href="#visual"><i class="fa fa-thumbs-up fa-3x"></i></a>
<?php } ?>
        </div>
    </div>
    <div id="visual">
        <?php 
        if($ctype) {
            $this->load->view('/startup/charts/'.$ctype,$cdata);
        } else {
            $this->load->view('/startup/charts/default');
        }
        ?>        
    </div>
</body>
