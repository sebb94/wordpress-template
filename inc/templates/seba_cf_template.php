<h3 class="form-title">Send A messege!</h3>
<div class="form-icon text-center">
  <i class="fa fa-envelope-open" aria-hidden="true"></i>

</div>
<form action="#" method="post" class="needs-validation seba-contact-form" id="sebaContactForm"
  data-url="<?php echo admin_url('admin-ajax.php');?>" novalidate>
 
  <div class="form-group">
    <input type="text" class="form-control seba-form-control" placeholder="Your name" id="name" name="name"
      required="required" value="">
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Error!
    </div>
  </div>
  <div class="form-group">
    <input type="email" class="form-control seba-form-control" placeholder="Your email" id="email" name="email"
      required="required" value="">
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Error!
    </div>
  </div>

  <div class="form-group">
    <textarea id="message" name="message" class="form-control seba-form-control" required="required"
      placeholder="Your Message" value="123"></textarea>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Error!
    </div>
  </div>

  <div class="text-center">
    <div class="form-group">
      <p id="form-sent-message"></p>
      <button type="submit" class="btn btn-form-submit btn-lg">Submit</button>
    </div>

</form>