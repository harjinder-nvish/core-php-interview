<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title><?=$title?></title>
    </head>
    <body>
        <div class="jumbotron text-center">
            <p>Welcome to student portal</p>
            <a href="<?=SITE_URL?>add.php" class="link-secondary btn-primary">Add new Record</a>
            <a href="<?=SITE_URL?>index.php" class="link-secondary btn-success">All students option 1</a>
            <a href="<?=SITE_URL?>index-2.php" class="link-secondary btn-danger">All students option 2</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <form method="post" name="addstudent">
                        <div class="form-group">
                            <label for="studentName">Student Name</label>
                            <input type="text" name="name" class="form-control" id="studentName" aria-describedby="emailHelp" placeholder="Enter name" required value="<?=isset($row['name'])?$row['name']:''?>">
                            <input type="hidden" name="student_id" value="<?=(isset($row['id'])? $row['id'] : '')?>">
                        </div>
                        <div class="form-group">
                            <label for="standardId">Standard</label>
                            <select name="standard" class="form-control" id="standardId" required>
                                <option value="1" <?=(isset($row['standard']) && $row['standard'] == 1)?'selected':''?>>First</option>
                                <option value="2" <?=(isset($row['standard']) && $row['standard'] == 2)?'selected':''?>>Second</option>
                                <option value="3" <?=(isset($row['standard']) && $row['standard'] == 3)?'selected':''?>>Third</option>
                                <option value="4" <?=(isset($row['standard']) && $row['standard'] == 4)?'selected':''?>>Fourth</option>
                                <option value="5" <?=(isset($row['standard']) && $row['standard'] == 5)?'selected':''?>>Fifth</option>
                                <option value="6" <?=(isset($row['standard']) && $row['standard'] == 6)?'selected':''?>>Sixth</option>
                                <option value="7" <?=(isset($row['standard']) && $row['standard'] == 7)?'selected':''?>>Seventh</option>
                                <option value="8" <?=(isset($row['standard']) && $row['standard'] == 8)?'selected':''?>>Eighth</option>
                                <option value="9" <?=(isset($row['standard']) && $row['standard'] == 9)?'selected':''?>>Nineth</option>
                                <option value="10" <?=(isset($row['standard']) && $row['standard'] == 10)?'selected':''?>>Ten</option>
                                <option value="11" <?=(isset($row['standard']) && $row['standard'] == 11)?'selected':''?>>Eleven</option>
                                <option value="12" <?=(isset($row['standard']) && $row['standard'] == 12)?'selected':''?>>Twelve</option>
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <label for="subjectId">Subject</label>
                            <br />
                            <?php
                                if(isset($row['subject']) && $row['subject'] !=""){
                                  $selected_subjects = explode(',',$row['subject']);
                                }
                                
                                ?>
                            <select name="subject[]" multiple="true" class="form-control" required>
                                <?php
                                    foreach($subjects as $val):
                                    ?>
                                <option value='<?=$val;?>' <?= ( isset($selected_subjects) && in_array($val,$selected_subjects))?'selected':'';?>><?php echo $val;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success" value="add">Submit</button>

                        <button class="btn btn-danger" type="button" onclick="history.back()">Cancel</button>
                    </form>
                    <!-- <h3>Column 1</h3>
                        <p>Lorem ipsum dolor..</p> -->
                </div>
                <!-- <div class="col-sm-4">
                    <h3>Column 2</h3>
                    <p>Lorem ipsum dolor..</p>
                    </div>
                    <div class="col-sm-4">
                    <h3>Column 3</h3>
                    <p>Lorem ipsum dolor..</p>
                    </div> -->
            </div>
        </div>

        <script>
            $(document).ready(function(){
                dataTableCall();
            });
            
        </script>

    </body>
</html>
