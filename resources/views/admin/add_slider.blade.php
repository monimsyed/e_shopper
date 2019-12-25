@extends('admin.admin_layout')
@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li>
    <i class="icon-edit"></i>
    <a href="#">Forms</a>
  </li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Add slider</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <p class="alert-success">
        <?php
        if(Session::get('message'))
        {
          echo Session::get('message');
          Session::put('message', null);
        }
        ?>
      </p>
      <form class="form-horizontal" action="{{ url('/save-slider') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="fileInput">Slider image</label>
          <div class="controls">
            <input class="input-file uniform_on" type="file" name="slider_image" id="fileInput">
          </div>
        </div>
        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Publication status</label>
          <div class="controls">
          <input type="checkbox" name="publication_status" value="1">
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Add slider</button>
          <button type="reset" class="btn">Cancel</button>
        </div>
        </fieldset>
      </form>

    </div>
  </div><!--/span-->

</div><!--/row-->
@endsection
