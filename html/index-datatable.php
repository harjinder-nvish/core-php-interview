<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    </head>
    <body onload="dataTableCall()">
        <div class="jumbotron text-center">
            <p>Welcome to student portal</p>
            <a href="<?=SITE_URL?>add.php" class="link-secondary btn-primary">Add new Record</a>
            <a href="<?=SITE_URL?>index.php" class="link-secondary btn-success">All students option 1</a>
            <a href="<?=SITE_URL?>index-2.php" class="link-secondary btn-danger">All students option 2</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table id="db-table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Student name</th>
                                <th>Standard</th>
                                <th>Subject</th>
                                <th>Created On</th>
                                <th>Updated On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Student name</th>
                                <th>Standard</th>
                                <th>Subject</th>
                                <th>Created On</th>
                                <th>Updated On</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <script src="<?=SITE_URL?>js/common.js"></script>
    </body>
</html>