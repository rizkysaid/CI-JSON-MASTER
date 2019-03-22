<?php 
	$this->load->view('template/head-css_sources');
  if(isset($css)){
    $this->load->view($css);
  }
	$this->load->view('template/head-close')
?>

<div class="wrapper">

  <!-- SIDEBAR -->
  <?php 
  $this->load->view('template/header');
  $this->load->view('template/sidebar');
  ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
      </h1>
      <!-- breadcrumb -->
      <ol class="breadcrumb"> 
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $breadcrumb; ?></li>
      </ol>
    </section>

    <!-- Konten utama -->
    <section class="content">
    <?php  
      $this->load->view($pages);
    ?>
      
  	</section>
    
  </div> <!-- content-wrapper -->
  
  <?php  
	$this->load->view('template/footer');
	$this->load->view('template/control-sidebar');
  ?>

  
</div><!-- ./wrapper -->

<?php 
  $this->load->view('template/js_sources.php');
  if(isset($js)){
    $this->load->view($js);  
  }
  $this->load->view('template/close_end.php');
?>