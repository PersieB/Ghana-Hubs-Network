<!-- Forms to add and update hub -->
<form class="form_contant" METHOD = "POST" enctype="multipart/form-data">
  <fieldset>
  <div class="row">
    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <input class="field_custom" placeholder="Hub name" id = "name" name = "name"  value="<?php if(isset($hubName)){echo $hubName;} ?>" type="text"
      onblur = "validateName(this)" required />
      <?php if(isset($nameError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid</p>";}?>
      <p id="1" style="color: rgb(199, 90, 90);"></p>
    </div>
    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <input class="field_custom" placeholder="Address" id = "address" name = "address"  value="<?php if(isset($address)){echo $address;} ?>" type="text" required />
    </div>
    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <input class="field_custom" placeholder="Phone number" id = "phone" name = "phone"  value="<?php if(isset($telephone)){echo $telephone;} ?>" type="text"
      onblur = "validatePhone(this)" required />
      <?php if(isset($phoneError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid contact</p>";}?>
      <p id="2" style="color: rgb(199, 90, 90);"></p>
    </div>
    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <input class="field_custom" placeholder="Gmail address" id = "email" name = "email"  value="<?php if(isset($gmail)){echo $gmail;} ?>" type="email"
      onblur = "validateEmail(this)" required />
      <?php if(isset($emailError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid GMAIL</p>";}?>
      <p id="3" style="color: rgb(199, 90, 90);"></p>
    </div>
      <div class="field col-lg-12 col-md-6 col-sm-12 col-xs-12">
        <input class="field_custom" placeholder="website home url" id="link"  value="<?php if(isset($website)){echo $website;} ?>" name="link" type="text"
        onblur = "validateUrl(this)" required />
        <?php if(isset($urlError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid url</p>";}?>
        <p id="4" style="color: rgb(199, 90, 90);"></p>
      </div>
      <div class="field col-lg-12 col-md-6 col-sm-12 col-xs-12">
        <textarea class="field_custom" placeholder="Brief Description"  value="<?php if(isset($description)){echo $description;} ?>" name = "description" required ></textarea>
    </div>
    <div class="field col-lg-12 col-md-6 col-sm-12 col-xs-12">
        <label>Hub Logo</label>
        <input class="field_custom" placeholder="Logo" type="file" accept=".jpg,.jpeg,.png" name="image"  required />
    </div>
    <?php 
    if(isset($update)){
        ?>
        <div class="center"><button class="btn main_bt" name = "add">Update</button></div>
    <?php
    }else{
        ?>
        <div class="center"><button class="btn main_bt" name = "add">Add</button></div>
    <?php
    }
    ?>
    
  </div>
  </fieldset>
</form>