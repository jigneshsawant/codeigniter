<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript">
		var counter = 2;

		$(document).ready(function() {
			$(".ajax_insert").click(function () {
				var eid = $("#eid").val();
				var ename = $("#ename").val();
				var eaddr = $("#eaddr").val();
				var ephone = $("#ephone").val();

				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "Welcome/ajax_insert",
					dataType: 'json',
					data: {eid: eid, ename: ename, eaddr: eaddr, ephone: ephone},
					success: function (res)
					{
						console.log(res);
					}
				});
				});
			});

		//Add fields using jquery
		$(document).ready(function() {
			//var counter = 2;
			$(".add-fields").click(function () {
			if(counter>10){
				alert("Only 10 textboxes allow");
				return false;
			}

			var empid = $(document.createElement('div'))
				.attr("id", 'empid' + counter,"class", "form-group");
			empid.after().html('<label class="col-sm-3 col-sm-offset-3 text-left">Enter the Employee ID'+ counter + ' : </label>' +
				'<div class="col-sm-4"><input type="text" class="form-control" name="eid' + counter +
				'" id="eid' + counter + '" value="" ></div>');
			empid.appendTo("#TextBoxesGroup");

			var empname = $(document.createElement('div'))
				.attr("id", 'empname' + counter,"class", "form-group");
			empname.after().html('<label class="col-sm-3 col-sm-offset-3 text-left">Enter the Employee Name'+ counter + ' : </label>' +
				'<div class="col-sm-4"><input type="text" class="form-control" name="ename' + counter +
				'" id="ename' + counter + '" value="" ></div>');
			empname.appendTo("#TextBoxesGroup");

				var empaddr = $(document.createElement('div'))
					.attr("id", 'empaddr' + counter);
				empaddr.after().html('<label class="col-sm-3 col-sm-offset-3 text-left">Enter the Employee Address'+ counter + ' : </label>' +
					'<div class="col-sm-4"><input type="text" class="form-control" name="eaddr' + counter +
					'" id="eaddr' + counter + '" value="" ></div>');
				empaddr.appendTo("#TextBoxesGroup");

				var empphone = $(document.createElement('div'))
					.attr("id", 'empphone' + counter);
				empphone.after().html('<label class="col-sm-3 col-sm-offset-3 text-left">Enter the Employee Phone'+ counter + ' : </label>' +
					'<div class="col-sm-4"><input type="text" class="form-control" name="ephone' + counter +
					'" id="ephone' + counter + '" value="" ></div>');
				empphone.appendTo("#TextBoxesGroup");

			counter++;
				});
			});

		$(document).ready(function() {
			$(".insert_all").click(function () {
				var eid = $("#eid1").val();
				var ename = $("#ename1").val();
				var eaddr = $("#eaddr1").val();
				var ephone = $("#ephone1").val();

				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "Welcome/insert_all",
					dataType: 'json',
					data: {eid: eid, ename: ename, eaddr: eaddr, ephone: ephone},
					success: function (res)
					{
						console.log(res);
					}
				});
			});
		});
	</script>
</head>
<body>
<div class="container">
	<div class="well text-center">
		<h1>Employee database</h1>
	</div>
		<form class = "form-horizontal" action="http://localhost/codeigniter/Welcome/insert_all" method="post">
			<div id='TextBoxesGroup'>
			<div id="empid1" class = "form-group">
				<label class="col-sm-3 col-sm-offset-3 text-left">Enter the Employee id: </label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="eid1" name="eid1"/>
				</div>
			</div>
			<div id="empname1" class = "form-group">
				<label class="col-sm-3 col-sm-offset-3 text-left">Enter the Employee name: </label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="ename1" name="ename1"/>
				</div>
			</div>
			<div id="empaddr1" class = "form-group">
				<label class="col-sm-3 col-sm-offset-3 text-left">Enter the Employee address: </label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="eaddr1" name="eaddr1"/>
				</div>
			</div>
			<div id="empphone" class = "form-group">
				<label class="col-sm-3 col-sm-offset-3 text-left">Enter the Employee phone: </label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="ephone1" name="ephone1"/>
				</div>
			</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6"></div>
				<div class="col-sm-1">
					<input type="submit" class="insert_all btn btn-success" value="Submit"/>
				</div>
				<div class="col-sm-1">
					<input type="button" class="ajax_insert btn btn-success" value="Ajax Insert"/>
				</div>
				<div class="col-sm-1">
					<input type="button" class="add-fields btn btn-success" value="Add Fields"/>
				</div>
			</div>
		</form>

		<form action="http://localhost/codeigniter/Batch/" method="post">
			<div class="col-sm-offset-6">
				<input type="submit" class="btn btn-success" id="insertAll" value="Batch Insert"/>
			</div>
		</form>
	</div>
</body>
</html>