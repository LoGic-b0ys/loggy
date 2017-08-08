<main class="main-content container">
  <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>
  <div class="row">
    <div class="page-header">
      <h1><?php echo $page_info['title'] ?></h1>
    </div>
  </div>
  <?php
    if(isset($error)) echo $error;
  ?>
    <div class="row">

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Site Information
        </div>

        <div class="panel-body">
          <div class="form-group">
            <input class="form-control" name="host_name" type="text" placeholder="Hostname" value="">
          </div>

          <div class="form-group">
            <input class="form-control" name="db_user" type="text" placeholder="Database Username" value="">
          </div>

          <div class="form-group">
            <input class="form-control" name="db_pass" type="text" placeholder="Database Password" value="">
          </div>

          <div class="form-group">
            <input class="form-control" name="db_name" type="text" placeholder="Database Name" value="">
          </div>

          <div class="form-group">
            <input class="form-control" name="base_url" type="text" placeholder="URL" value="">
          </div>

          <div class="form-group">
            <button class="submit btn btn-success pull-right" type="submit">Install</button>
          </div>
        </div>
      </div>

    </div>
  </form>
</main>