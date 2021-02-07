

<?php
include("./model/logic.php");
include("./model/conn.php");
include("./model/header.php");
?>

<div class="card">
    <div class="card-header">
        Add Student Record
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body" style="width: 400px;">
                <form method="POST" action="<?php student($dbconn); ?>">

                    <div class="form-group">
                        <label><b>Enter student number</b></label>
                        <input type="text" class="form-control" name="student_no"  placeholder="student_no" required>
                    </div>

                    <div class="form-group">
                        <label><b>Enter first name</b> </label>
                        <input type="text" class="form-control" name="first_name" placeholder="first_name" required>
                    </div>

                    <div class="form-group">
                        <label> <b>Enter last name</b></label>
                        <input type="text" class="form-control" name="last_name"  placeholder=" last_name" required>
                    </div>

                    <div class="form-group">
                        <label> <b>Class</b></label>
                        <input type="text" class="form-control" name="class"  placeholder=" class" required>
                    </div>
                
                    <label><b>Choose your teacher number</b> </label>
                    <div class="input-group mb-3" >
                        <div class="input-group-prepend" required>
                            <label class="input-group-text" for="inputGroupSelect01" >Teacher No</label>
                        </div>
                        
                        <select class="custom-select" name="class_teacher_no" id="inputGroupSelect01" required>
                            <option selected>Choose...</option>
                            <option value="staff001" >staff001</option>
                            <option value="staff002">staff001</option>
                            <option value="staff003">staff003</option>
                            <option value="staff004" >staff004</option>
                            <option value="staff005">staff005</option>
                            <option value="staff006">staff006</option>
                            <option value="staff007" >Staff007</option>
                            <option value="Staff008">Staff008</option>
                            <option value="Staff009">Staff009</option>
                        </select>
                    </div>
                    
                    <label><b>Select your teacher name</b>  </label>
                    <div class="input-group mb-3" >
                        <div class="input-group-prepend" >
                            <label class="input-group-text" for="inputGroupSelect01">Teacher</label>
                        </div>
                                                
                        <select class="custom-select" name="class_teacher_name" id="inputGroupSelect01" required>
                            <option selected>Choose...</option>
                            <option value="Michael Oyinye" >Michael Oyinye</option>
                            <option value="Emmanuel Joseph">Emmanuel Joseph</option>
                            <option value="Tunde Akinola">Tunde Akinola</option>
                            <option value="Ali Hakeem" >Ali Hakeem</option>
                            <option value="Sunday Favour">Sunday Favour</option>
                            <option value="Lukman Abdullah">Lukman Abdullah</option>
                            <option value="Folahan Hameed" >Folahan Hameed</option>
                            <option value="Ridwan Adisa">Ridwan Adisa</option>
                            <option value="Monday Joseph">Monday Joseph</option>
                        </select>
                    </div>

                    <button type="submit" name="btn-save" class="btn btn-primary">Save</button>
                </form>
            
            </div>
        </div>           
    </div>  
</div>
