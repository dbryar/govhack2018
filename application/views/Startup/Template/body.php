<?php
    $this->load->view('startup/template/header');
?>
    <main role="main" class="container top-margin">

      <div class="starter-template">
<?php
        $this->load->view('startup/pages/'.$v);
?>
      </div>

    </main><!-- /.container -->
    <footer>
<?php
        $this->load->view('startup/template/footer');
?>
    </footer>