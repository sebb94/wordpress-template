<form action="#" method="post" class="needs-validation" id="sebaContactForm" data-url="<?php echo admin_url('admin-ajax.php');?>" novalidate>

    <div class="form-group">
    <input type="text" class="form-control" placeholder="Your name" id="name" name="name" required="required" value=""> 
    <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
      Error!
      </div>
    </div>
      <div class="form-group">
    <input type="email" class="form-control" placeholder="Your email" id="email" name="email" required="required" value=""> 
       <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
      Error!
      </div>
    </div>

       <div class="form-group">
            <textarea id="message" name="message" class="form-control" required="required" placeholder="Your Message" value="123"></textarea>
               <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
      Error!
      </div>
    </div>
    <div class="form-group">
    <p id="form-sent-message"></p>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>


</form>