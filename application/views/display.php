<?php
/**
 * Created by PhpStorm.
 * User: bookeventz
 * Date: 12/12/2016
 * Time: 5:37 PM
 */
?>

<html lang="en">
<head>
    <title>Display Records From Database</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
        //Add rows using jquery
        $(document).ready(function() {
            $(".add-row").click(function () {
                var eid = $("#empid").val();
                var addrow = "<tr><td>" + eid + "</td><td>" + eid + "</td><td>" + eid + "</td><td>" + eid + "</td><tr>";
                $("table tbody").append(addrow);
            });
        });

        $(document).ready(function() {
            $(".show").click(function () {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Welcome/show_emp",
                    success: function(res) {
                        //$("#data").html("<tr><td>"+$res.Emp_id+"</td></tr>");
                        alert('success');
                    }
                });
            });
        });
     </script>
</head>
<body>
    <div style="width:500px;margin:50px;">
        <h4>Display Records From Database Using Codeigniter</h4>
        <input type="button" class="add-row btn btn-default" value="Add rows"/>
        <table id="data" class="table table-striped col-sm-6">
            <thead>
            <tr><td>Employee Id</td>
            <td>Employee Name</td>
            <td>Employee Address</td>
            <td>Employee Phone</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($Employees as $employee){?>
                <tr><td><?=$employee->emp_id;?></td>
                    <td><?=$employee->emp_name;?></td>
                    <td><?=$employee->emp_addr;?></td>
                    <td><?=$employee->emp_phone;?></td></tr>
            <?php }?>
            </tbody>
        </table>

    </div>

    <form class = "form-horizontal" action="http://localhost/codeigniter/Welcome/del_data" method="post">
        <div class = "form-group">
            <label class="col-sm-2 col-sm-offset-1 text-left">Enter Employee id to be deleted: </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="empid" name="empid"/>
            </div>
            <div>
                <input type="submit" class="btn btn-danger" value="Delete"/>
            </div>
        </div>
    </form>

    <form action="http://localhost/codeigniter/Welcome/show_emp" method="post">
        <input type="submit" class="btn btn-default col-sm-offset-1" value="Show"/>

    </form>
</body>
</html>
