<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Welcome to CodeIgniter</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="text-center"><h2><I>Internships Tasks</I></h2></div>
    </div>
    <br/>
    <div class="row">
        <table class="table table-bordered">
            <tbody>
            <th class="text-center"><I>Task #</I></th>
            <th class="text-center"><I>Subject</I></th>
            <th class="text-center"><I>Description</I></th>
            <th class="text-center"><I>URL</I></th>
            </tbody>
            <tbody>
            <tr>
                <td>1</td>
                <td><b>Introduction to Database</b></td>
                <td>Perform Insert, Delete and Select operation on Database. In Database there is one table called Student which having attributes like sid,sname,sclass.</td>
                <td><a href="<?php echo base_url() ?>" >Example</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td><b>Bootstrap</b></td>
                <td>Improve the GUI of above page using various <b>Bootstrap</b> classes.</td>
                <td><a href="<?php echo base_url() ?>">Example</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td><b>jQuery</b></td>
                <td> Add one button called <b>Add Rows</b> below table and on button click rows has to be added in above table without refreshing the page(use jQuery to refresh specific part of page).</td>
                <td><a href="<?php echo base_url() ?>">Example</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td><b>AJAX using jQuery</b></td>
                <td>Insert Data into table using jQuery AJAX and update the below table(only refresh contents of Table)</td>
                <td><a href="<?php echo base_url() ?>">Example</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td><b>Batch Insertion</b></td>
                <td>Insert multiple records of Students using batch_insert. First add button below field and on that button click more field have to be display.</td>
                <td><a href="<?php echo base_url() ?>Batch">Example</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td><b>Database Relationship between three tables.</b></td>
                <td>Create 3 tables. One is <b>Person</b> having attributes pid,pname. Second is <b>Color</b> having attributes cid,cname and Third table is <b>PersonColor</b> should contain there relationships. Create GUI which manage there relationships.</td>
                <td><a href="<?php echo base_url() ?>Person_Color_Control">Example</a></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript">

</script>
</body>
</html>