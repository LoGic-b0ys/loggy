<main class="main-content container">
  <div class="row">
    <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>
    <div class="page-header">
      <h1><?php echo $page_info['title'] ?></h1>
    </div>
  </div>
  <?php
    if(isset($error)) $error;
  ?>
  <div class="col-lg-8">
    <div class="row">

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Profile Information
        </div>

        <div class="panel-body">

          <div class="form-group">
            <input class="form-control" name="name" type="text" placeholder="Name" value="<?php echo $this->session->userdata('name') ?>">
          </div>

          <div class="form-group">
            <input class="form-control" name="username" type="text" placeholder="Username" value="<?php echo $this->session->userdata('username') ?>">
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading clean">
          Password
        </div>

        <div class="panel-body">

          <div class="form-group">
            <input class="form-control" name="currPass" type="password" placeholder="Current Password" value="">
          </div>

          <div class="form-group">
            <input class="form-control" name="password" type="password" placeholder="New Password" value="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 pull-right">
    <div class="row">

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Profile Picture
        </div>

        <div class="panel-body">
          <img id="blah" class="img-responsive" src="<?php echo base_url('images/pp.png')  ?>" alt="your image" style="margin-bottom: 15px" />

          <div class="form-group">
            <input class="form-control" name="image" id="imgInp" type="file" value="">
          </div>

          <div class="form-group">
            <button class="submit btn btn-success pull-right" type="submit">Submit</button>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</main>