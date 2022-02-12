<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
            // global constants
            const SITE_URL = "<?=SITE_URL?>";
        </script>

    </head>
    <body onload="search_request()">
        <div class="jumbotron text-center">
            <p>Welcome to student portal</p>
            <a href="<?=SITE_URL?>add.php" class="link-secondary btn-primary">Add new Record</a>
            <a href="<?=SITE_URL?>index.php" class="link-secondary btn-success">All students option 1</a>
            <a href="<?=SITE_URL?>index-2.php" class="link-secondary btn-danger">All students option 2</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                        if(isset($_SESSION['flash-msg']) && $_SESSION['flash-msg']!=''){
                        ?>
                    <div class="alert alert-success" role="alert">
                        <?=$_SESSION['flash-msg']?>
                    </div>
                    <?php 
                        unset($_SESSION['flash-msg']);
                        } 
                        ?>
                    <div class="form-container">
                        <form id="search" name="search-form" method="post">
                            <div class="row">
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="name" class="form-control" name="name" placeholder="Search Name">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label>Standard</label>
                                        <select name="standard[]" multiple="true" class="form-control">
                                            <option value="">Select Standard</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label>Subjects</label>
                                        <select name="subject[]" multiple="true" class="form-control">
                                            <option value="">Select Subjects</option>
                                            <?php foreach($subjects as $val){?>
                                                <option value="<?=$val?>"><?=$val?></option>
                                                
                                            <?php } ?>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label>
                                            <h1></h1>
                                        </label>
                                        <button type="button" class="form-control btn btn-success" onclick="search_request()">Search</button>

                                        <a href="<?=SITE_URL?>/index.php" class="btn btn-link">Reset</a>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="total-record"></div>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Standard</th>
                                <th scope="col">Subjects</th>
                                <th scope="col">Created On</th>
                                <th scope="col">Last Update</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($rows) && is_countable($rows) && count($rows) > 0){
                                    foreach($rows as $row):
                                ?>
                            <tr>
                                <th scope="row"><?=$row['id']?></th>
                                <td><?=$row['name']?></td>
                                <td><?=$row['standard']?></td>
                                <td><?=$row['subject']?></td>
                                <td><?=$row['created_on']?></td>
                                <td><?=$row['updated_on']?></td>
                                <td><a href="add.php?id=<?=$row['id']?>">Edit</a></td>
                            </tr>
                            <?php
                                endforeach;
                                }else{
                                ?>
                            <tr>
                                <th scope="row"></th>
                                <td colspan="6">No data Found.</td>
                            </tr>
                            <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="<?=SITE_URL?>js/common.js"></script>
    </body>
</html>