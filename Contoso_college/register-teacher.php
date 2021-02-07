
<?php

include("./model/logic.php");
include("./model/conn.php");
include("./model/header.php");
?>

<div class="card">
    <div class="card-header">
        Add Teachers Record
    </div>
    <div id="error"></div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body" style="width: 400px;">
                <form method="POST" action="<?php teacher($dbconn); ?>">

                    <div class="form-group">
                        <label>staff_no</label>
                        <input type="text" class="form-control" name="staff_no" id="staff_no" placeholder="staff_no">
                    </div>

                    <div class="form-group">
                        <label>first_name </label>
                        <input type="text" class="form-control" name="first_name" placeholder="first_name">
                    </div>

                    <div class="form-group">
                        <label> last_name</label>
                        <input type="text" class="form-control" name="last_name"  placeholder=" last_name">
                    </div>

                    <div class="form-group">
                        <label> levels</label>
                        <input type="text" class="form-control" name="levels"  placeholder=" levels">
                    </div>
                
                    <div class="form-group">
                        <label>class_held </label>
                        <input type="text" name="class_held" class="form-control" placeholder=" class_held"></textarea>
                    </div>

                    <button type="submit" name="btn-save" id="submit" class="btn btn-primary">Save</button>
                </form>
            
            </div>
        </div>           
    </div>  
</div>
