<?php $this->load->view('Customer/include/header') ?>
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN SIDEBAR  -->
    <?php $this->load->view('Customer/include/menubar') ?>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <?php $this->load->view('Customer/' . $folder . '/' . $halaman . '') ?>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->
<?php $this->load->view('Customer/include/footer') ?>