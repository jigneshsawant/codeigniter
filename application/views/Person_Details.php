<html>
<head>
    <title>
        Details Page
    </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $(".insert-color").click(function () {
                var pid = $("#pid").val();
                $("#pid1").val(pid);
                console.log($("#colorForm").serialize());

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "P_C_Details_Control/add_color",
                    dataType: 'json',
                    data: $("#colorForm").serialize(),
                    success: function (res)
                    {
                        $.each(res,function (i,val) {
                            row = "<tr><td>" + val.cname + "</td><td><a href='http://localhost/codeigniter/P_C_Details_Control/delete_person/" + val.cid +"'>Delete</a></td></tr>";
                        })
                        $("#tbl1 tbody").append(row);
                    }
                });
            });
        });
        </script>
</head>

<body>
<div class="container">
<div class="well text-center">
<h1>Person Name:<?php
    foreach ($color as $c){
        echo $c->pname;?>
        <input type="hidden" id="pid" name="pid" value="<?php echo $c->pid; ?>">
    <?php } ?></h1>
</div>

<div class="row">
<div class="col-sm-4 form-group">
<table id="tbl1" class="table table-bordered">
    <thead>
    <tr><td>Colors</td></tr>
    </thead>
    <tbody>
    <?php foreach ($Colors as $color){?>
        <tr><td><?php echo $color->cname?></td><td><a href="http://localhost/codeigniter/P_C_Details_Control/delete_person/<?php echo $color->cid ?>">Delete</a></td></tr>
    <?php } ?>
    </tbody>
</table>
</div>

    <div class="col-sm-4 form-group">
    <table id="tbl2" class="table table-bordered">
        <thead>
        <tr><td>Persons</td><td>Colors</td></tr>
        </thead>
        <tbody>
        <?php foreach ($Person_Color as $pc){?>
            <tr><td><?php echo $pc->pname?></td><td><?php echo $pc->cname?></td><td><a href="http://localhost/codeigniter/P_C_Details_Control/delete_details/<?php echo $pc->id ?>">Delete</a></td></tr>
        <?php } ?>
        </tbody>
    </table>
        </div>

    <div class="col-sm-4 form-group">
        <label class="form-control col-sm-4">Add More Colors : </label>
        <div class="col-sm-6">
        <form id="colorForm" action="" method="post">
            <input type="hidden" id="pid1" name="pid1">
        <select id="cid" name="cid" class="form-control">
    <?php foreach ($RemainingColors as $rc){?>
        <option value="<?php echo $rc->cid; ?>"><?php echo $rc->cname; ?></option>
    <?php } ?>
    </select>
    </div>
    <div class="col-sm-6">
    <input type="button" class="btn btn-success insert-color" value="Insert Color"></div></form>
    </div>
</div>
</div>
</body>
</html>