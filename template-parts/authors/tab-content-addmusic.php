
<div class="row">
  <div class="col-md-12 uploadi">
    <span class="addnew">Add a new Track  <i class="fa fa-plus"></i></span></h2>
  </div>
</div> 
<div class="form-dropdown">
  <div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" id="cpt_music_save_meta_box_data">
        <fieldset>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="tracktitle">Track Title</label>  
            <div class="col-sm-2">
              <input id="tracktitle" name="tracktitle" type="text" value="" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="trackinformation">Track Information</label>
            <div class="col-sm-2">                     
              <textarea class="form-control" id="trackinformation" name="trackinformation" placeholder="Tell us something about this track." value=""/></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="genre">Genre</label>
            <div class="col-md-5" style="width:432px !important;">
              <?php $select_cats = wp_dropdown_categories( array( 'echo' => 0, 'taxonomy' => 'genre', 'hide_empty' => 0 ) );
              $select_cats = str_replace( "name='cat' id=", "name='cat[]' id=", $select_cats );
              echo $select_cats; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="tracksource">Music Upload</label>
            <div class="col-md-6">
              <input id="tracksource" name="tracksource" type="text" value="" />
              <input class="btn btn-primary upload_image_button" id="_btn" type="button" value="Upload" />
            </div>
          </div>   

          <div class="form-group">
            <label class="col-sm-2 control-label" for="trackcover">Cover Upload</label>
            <div class="col-sm-6">
              <input id="trackcover" name="trackcover" type="text" value="" />
              <input class="btn btn-primary upload_image_button" id="_btn" type="button" value="Upload" />
            </div>
          </div>     

          <div class="form-group">
            <label class="col-sm-2 control-label" for="singlebutton">Submit Track</label>
            <div class="col-sm-2">
              <input type="hidden" name="theuserID" value="<?php echo get_current_user_id(); ?>">
              <a id="addtrack" class="btn btn-primary">Add Track</a>
            </div>
          </div>

        </fieldset>
      </form>
    </div>
  </div>
</div>
<div class="success">
  <div class="row uploadcomplete">
    <div class="col-md-12">
      <center>
        <i class="fa fa-check"></i>
        <h2>Your Track has been uploaded</h2>
        <a href="<?php echo get_site_url().'/?author='.get_current_user_id(); ?>" class="btn btn-primary">Continue</a>
      </center>
    </div>
  </div>
</div>
















