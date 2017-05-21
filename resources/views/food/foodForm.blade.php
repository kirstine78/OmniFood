<!--

Name:		Kirstine Broerup Nielsen
Date:       14.05.2017
Project:    OmniFood
Version:    1.0

-->

{!! csrf_field() !!}

<!-- food date -->
<div class="form-group">
    <label for="date" class="col-sm-2 control-label">Date *</label>

    <div class="col-sm-4">
        <input type="date" name="date" id="date" class="form-control" maxlength="254" value="" />
    </div>
</div>

<!-- food country, dropdown? -->
<div class="form-group">
    <label for="country" class="col-sm-2 control-label">Country *</label>

    <div class="col-sm-4">
        <input type="text" name="country" id="country" class="form-control" maxlength="100" value=""  />
    </div>
</div>

<!-- food rating  -->
<div class="form-group">
    <label for="rating" class="col-sm-2 control-label">Rating *</label>

    <div class="col-sm-4">
        <input name="rating" type="radio" value="0" >0   
		<input name="rating" type="radio" value="1" >1
		<input checked="checked" name="rating" type="radio" value="0">2
		<input name="rating" type="radio" value="0">3
		<input name="rating" type="radio" value="0">4
		<input name="rating" type="radio" value="0">5
    </div>
</div>


<!-- food comment -->
<div class="form-group">
    <label for="comment" class="col-sm-2 control-label">Comment</label>

    <div class="col-sm-4">
<!--         <input type="text" name="comment" id="comment" class="form-control" maxlength="254"  value="" /> -->
        <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
    </div>
</div>
