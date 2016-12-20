<html>
<head>
<title>Person Color Details</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">

        var person_data;
        var color_data;
        $(document).ready(function() {
            $(".insert").click(function () {
                var pname = $("#pname").val();
                var cname = $("#cname").val();

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Person_Color_Control/data_submit",
                    dataType: 'json',
                    data: {pname: pname, cname: cname},
                    success: function (res)
                    {
                        $.each(res,function (i,val) {
                            person_data = "<tr><td><a href='Person_Color_Details.php'>" + val.pname + "</a></td></tr>";
                            color_data = "<tr><td><a href='Person_Color_Details.php'>" + val.cname + "</a></td></tr>";
                        })
                        $("#tbl1 tbody").append(person_data);
                        $("#tbl2 tbody").append(color_data);
                    }
                });
            });
        });

        </script>
</head>

<body>
<div class="container">
<div class="well text-center">
    <h1>Person Color Details</h1>
</div>
<form class="form-horizontal" action="" method="post">
    <div class="row form-group">
    <label class="col-sm-2 col-sm-offset-3">Enter Color: </label>
    <div class="col-sm-4">
    <input type="text" class="form-control" id="cname" name="cname">
    </div>
    </div>

    <div class="row form-group">
        <label class="col-sm-2 col-sm-offset-3">Enter Person: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="pname" name="pname">
        </div>
    </div>
    <div class="row form-group">
    <div class="col-sm-4"></div>
    <div class="col-sm-1"></div>
    <input type="button" class="insert btn btn-default" value="Submit">
    </div>
</form>

<div class="row ">
<div id="tbl1" class="col-sm-2 form-group">
<table border="2" id="tbl1" class="table table-striped col-sm-2">
    <thead>
    <tr>
        <td>Person Name</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($Details as $detail){?>
        <tr><td><a href="http://localhost/codeigniter/P_C_Details_Control/display_person/<?php echo $detail->pid?>"><?=$detail->pname;?></a></td></tr>
    <?php }?>
    </tbody>
</table>
</div>

    <div id="tbl2" class="col-sm-2 form-group">
    <table border="2" id="tbl2" class="table table-striped col-sm-2">
        <thead>
        <tr>
            <td>Color Name</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($Details as $detail){?>
            <tr><td><a href="http://localhost/codeigniter/P_C_Details_Control/display_color/<?php echo $detail->cid;?>"><?=$detail->cname;?></a></td></tr>
        <?php }?>
        </tbody>
</table>
</div>
</div>
</body>
</html>