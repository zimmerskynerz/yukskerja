<?php $this->load->view('Owner/include/header') ?>
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN SIDEBAR  -->
    <?php $this->load->view('Owner/include/menubar') ?>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <?php $this->load->view('Owner/' . $folder . '/' . $halaman . '') ?>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->
<?php $this->load->view('Owner/include/footer') ?>