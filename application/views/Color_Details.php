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
            $(".insert-person").click(function () {
                var cid = $("#cid").val();
                $("#cid1").val(cid);
                console.log($("#personForm").serialize());

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "P_C_Details_Control/add_person",
                    dataType: 'json',
                    data: $("#personForm").serialize(),
                    success: function (res)
                    {
                        $.each(res,function (i,val) {
                            row = "<tr><td>" + val.pname + "</td><td><a href='http://localhost/codeigniter/P_C_Details_Control/delete_color/" + val.pid +"'>Delete</a></td></tr>";
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
    <h1>Color Name:<?php
        foreach ($person as $p){
            echo $p->cname;?>
            <input type="hidden" id="cid" name="cid" value="<?php echo $p->cid; ?>">
       <?php } ?></h1>
</div>

    <div class="row">
    <div class="col-sm-4 form-group">
    <table id="tbl1" class="table table-bordered">
    <thead>
    <tr><td>Persons</td></tr>
    </thead>
    <tbody>
    <?php foreach ($Persons as $person){?>
        <tr><td><?php echo $person->pname?></td><td><a href="http://localhost/codeigniter/P_C_Details_Control/delete_color/<?php echo $person->pid ?>">Delete</a></td></tr>
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
        <label class="form-control col-sm-4">Add More Persons : </label>
        <div class="col-sm-6">
            <form id="personForm" action="" method="post">
                <input type="hidden" id="cid1" name="cid1">
                <select id="pid" name="pid" class="form-control">
            <?php foreach ($RemainingPersons as $rp){?>
                <option value="<?php echo $rp->pid; ?>"><?php echo $rp->pname; ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="col-sm-6">
        <input type="button" class="btn btn-success insert-person" value="Insert Person"></div></form>
        </div>
</div>
</div>
</body>
</html>