<form action="#" method="post" id="sebaContactForm" data-url="<?php echo admin_url('admin-ajax.php');?>">

    <div class="form-group">
    <input type="text" class="form-control" placeholder="Your name" id="name" name="name" required="required"> 
    </div>
      <div class="form-group">
    <input type="email" class="form-control" placeholder="Your email" id="email" name="email" required="required"> 
    </div>

       <div class="form-group">
            <textarea id="message" name="message" class="form-control" required="required" placeholder="Your Message"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>


</form>