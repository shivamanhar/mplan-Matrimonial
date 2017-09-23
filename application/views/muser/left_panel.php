<div class="col-md-3 col-sm-5 mobile_none">
	<div class="panel panel-default">
	<div class="panel-heading">
		
	   <h3 style="padding-top:5px;padding-bottom:5px;"> 
		<center> Filter Search  </center>
	   </h3>
		
	</div>
	<div class="panel-body">
		<form action="<?php echo base_url();?>muser/filter_data" method="post" id="mfilter">
			<input type="hidden" value="<?php echo $this->muse->sex_match($this->tank_auth->get_user_id()); ?>" name="gender" id="gender">
			<select name="martial_status" onchange="filter_data(this.value)" id="martial_status">
				<option value=""> Marital Status </option>
				<option value="never married"> Never Married </option>
				<option value="divorced"> Divorced  </option>
				<option value="awaiting divorced"> Awaiting Divorced </option>
				<option value="widowed"> Widowed </option>
			</select>
			<?php $this->muse->get_religion("onchange='filter_data(this.value)'");?>
			<div id="community"> <select> <option value=""> Community </option></select></div>
			<?php $this->address->country(); ?>
			<?php $this->address->state(); ?>
			<?php $this->address->city(); ?>
			<?php $this->muse->mother_tongue("onchange='filter_data(this.value)'");?>
			<?php echo $this->muse->edu_level("onchange='filter_data(this.value)'"); ?>
			
			<h4 style="margin-top:10px;"> Diet</h4>
			<ul style="list-style:none;margin-top:8px;margin-left:10px;">
					<li>    <input type="radio" name="diet" value="veg" title="Diet" onclick="filter_data(this.value)" <?php echo set_radio('diet', 'veg'); ?>> Veg &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="diet" value="non veg" title="Diet" onclick="filter_data(this.value)" <?php echo set_radio('diet', 'non veg'); ?>> Non-Veg 
					<li>	<input type="radio" name="diet" value="jain" title="Diet" onclick="filter_data(this.value)" <?php echo set_radio('diet', 'jain'); ?>> Jain &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="diet" value="vegan" title="Diet" onclick="filter_data(this.value)" <?php echo set_radio('diet', 'vegan'); ?>> Vegan
			
			
			
             
			</ul-->
			
			<h4 style="margin-top:10px;"> Disability </h4>
			<ul style="list-style:none;margin-top:8px;margin-left:10px;">
			<li>	<input type="radio" name="disability" value="yes" onchange="filter_data(this.value)"> Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="disability" value="no" onchange="filter_data(this.value)" checked>No   
			</ul>
			
			<h4 style="margin-top:10px;"> HIV Positive</h4>
			<ul style="list-style:none;margin-top:8px;margin-left:10px;">
			<li><input type="radio" name="hiv_positive" value="yes" onchange="filter_data(this.value)"> Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="hiv_positive" value="no" onchange="filter_data(this.value)" checked>No  
			</ul>
			<ul style="list-style:none;margin-top:8px;">
				<li> <input type="submit" value="Filter" class="btn btn-success"></li>
			</ul>
		</form>
	</div>
	</div>
</div>



<input type="hidden" id="url" value="<?php echo base_url();?>">

