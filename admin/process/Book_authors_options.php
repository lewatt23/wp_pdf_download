<?php

function Books_author_options(){
  ?>
    
    <div class="form-group">
    <label>Ingredients</label>
    <input type="text" class="form-control input-lg" name="r_inp">
</div>
<div class="form-group">
    <label>Cooking Time Required</label>
    <input type="text" class="form-control input-lg" name="r_i">
</div>
<div class="form-group">
    <label>Utensils</label>
    <input type="text" class="form-control" name="r_ink">
</div>
<div class="form-group">
    <label>Cooking Experience</label>
    <select class="form-control" name="r_inputLev">
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Expert">Expert</option>
    </select>
</div>
<div class="form-group">
    <label>Meal Type</label>
    <input type="text" class="form-control" name="r_ikk">
</div> 
      <?php
}

