<!-- Form to add and update events -->
<form class="form_contant" METHOD="POST" enctype="multipart/form-data">
    <fieldset>
    <div class="row">
    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <input class="field_custom" placeholder="Title" id="name" name = "name" value="<?php if(isset($title)){echo $title;} ?>"
        type="text"
        onblur = "validateName(this)" required />
        <?php if(isset($nameError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid title</p>";}?>
        <p id="1" style="color: rgb(199, 90, 90);"></p>
    </div>
    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <input class="field_custom" placeholder="Date: YYYY-MM-DD" id="date" name="date" value="<?php if(isset($date)){echo $date;} ?>" type="text"
        onblur = "validateDate(this)" required />
        <?php if(isset($dateError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid date format</p>";}?>
        <p id="9" style="color: rgb(199, 90, 90);"></p>
        </div>
        <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <input class="field_custom" placeholder="Start time 24hr: 15:15" name="start" id="start" value="<?php if(isset($start)){echo $start;} ?>" type="text"
        onblur = "validateStartTime(this)"  required />
        <?php if(isset($startError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid time format</p>";}?>
        <p id="7" style="color: rgb(199, 90, 90);"></p>
        </div>
        <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <input class="field_custom" placeholder="End time 24hr: 12:15" name="end" id="end" value="<?php if(isset($end)){echo $end;} ?>" type="text"
        onblur = "validateEndTime(this)" required />
        <?php if(isset($endError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid time format</p>";}?>
        <p id="8" style="color: rgb(199, 90, 90);"></p>
        </div>
        <div class="field col-lg-12 col-md-6 col-sm-12 col-xs-12">
            <input class="field_custom" placeholder="Venue" name = "venue" value="<?php if(isset($venue)){echo $venue;} ?>" type="text" required />
        </div>
        <div class="field col-lg-12 col-md-6 col-sm-12 col-xs-12">
            <textarea class="field_custom" placeholder="Brief Description" name="description" value="<?php if(isset($description)){echo $description;} ?>" required ></textarea>
        </div>
        <div class="field col-lg-12 col-md-6 col-sm-12 col-xs-12">
            <label>Event flyer</label>
            <input class="field_custom" placeholder="Flyer" type="file" accept=".jpg,.jpeg,.png" name="image" required />
        </div>
        <?php 
        if(isset($update)){
            ?>
            <div class="center"><button class="btn main_bt" name = "add">Update</button></div>
        <?php
        }else{
            ?>
            <div class="center"><button class="btn main_bt" name = "add">Post</button></div>
        <?php
        }
        ?>
    </div>
    </fieldset>
</form>