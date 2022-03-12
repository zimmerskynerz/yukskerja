<?php $this->load->view('Cs/include/header') ?>
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN SIDEBAR  -->
    <?php $this->load->view('Cs/include/menubar') ?>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <?php $this->load->view('Cs/' . $folder . '/' . $halaman . '') ?>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->
<?php $this->load->view('Cs/include/footer') ?>