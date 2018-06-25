
<div class="dashboard">
<span class="label_title">Dashboard</span>
<span class="label_btn">Start/Stop Your Script</span>
<!-- Rounded switch -->
 <label class="switch">
 <input type="checkbox">
  <div class="slider round"></div>
</label>





</div>
<style>
.label_title
{
	text-align:center;
	font-family: fantasy;
	font-size:30px;
	color: #334396;
}

.label_btn
{
	text-align:left;
	font-family: fantasy;
	font-size:20px;
	padding-bottom:10px;
}
.dashboard span{
	display:block;
}
.dashboard{
	
	
	border: solid 1px #000;
padding: 28px;
margin: 131px 250 0 250;
min-height: 300px;
}
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
 height: 28px;
width: 27px;
left: 2px;
bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(48px);
  -ms-transform: translateX(48px);
  transform: translateX(48px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
  width: 80px;

}

.slider.round:before {
  border-radius: 50%;
}

</style>