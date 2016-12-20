<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
        var counter=1;
        //Add fields using jquery
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var wrapper = $('#TextBoxesGroup'); //Input field wrapper
            //var counter = 2;
            $('.add-fields').click(function(){

                var sid = '<div><label>Enter Student Id '+ counter + ' </label><input type="text" name="sid[]" id="sid[]" value=""/></div><br>'; //New input field html
                var sname = '<div><label>Enter Student Name '+ counter + ' </label><input type="text" name="sname[]" id="sname[]" value=""/></div><br>'; //New input field html

                if (counter < maxField) { //Check maximum number of input fields
                    counter++;
                    $('#count').val(counter);
                    $(wrapper).append(sid); // Add field html
                    $(wrapper).append(sname); // Add field html
                }
            });
        });

        $(document).ready(function() {
            $(".insert-all").click(function () {
                var serial=$('#studForm').serialize();
                console.log(serial);

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Batch/insert_all",
                    dataType: 'json',
                    data : $('#studForm').serialize(),
                    success: function (res)
                    {
                        $.each(res,function (i,val) {
                            var rowdata = "<tr><td>" + val.sid + "</td><td>" + val.sname + "</td></tr>";
                            $("table tbody").append(rowdata);
                        })
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
<form class="form-horizontal" action="" method="post" id="studForm">
    <div id="TextBoxesGroup">
        <div class="form-group">
        <input type="hidden" value="1" name="count" id="count">
        <label class="col-sm-2">Enter Student Id 1: </label>
        <div class="col-sm-4">
        <input class="form-control" type="text" id="sid[]" name="sid[]">
        </div>
        </div>
    <div class="form-group">
        <label class="col-sm-2">Enter Student Name 1: </label>
        <div class="col-sm-4">
        <input type="text" id="sname[]" name="sname[]"><br><br>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2">
        <input type="submit" value="Submit"><br></div>
        <div class="col-sm-2">
        <input type="button" class="add-fields" value="Add Fileds"></div>
        <div class="col-sm-2">
        <input type="button" class="insert-all" value="Insert All"></div>
    </div>
</form>
<table border="2">
    <thead>
    <tr>
        <td>Student Id</td>
        <td>Student Name</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($Students as $student){?>
        <tr>
            <td><?=$student->sid;?></td>
            <td><?=$student->sname;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>
</body>
</html>