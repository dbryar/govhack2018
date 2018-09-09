<html lang="en">
  <head>
<?php
    $this->load->view('/startup/template/head');
?>
  </head>
  <body>
<?php
    if($v!='question') {
        $this->load->view('/startup/template/body');
    } else {
        $this->load->view('/startup/template/question');
    }
?>
  </body>
</html>