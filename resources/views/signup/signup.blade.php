
            <form action="/signup" method="POST" role="form">
                {{csrf_field()}}
                <div class="legend">Sign Up <i class="fa fa-sign-in"></i></div>

                <div class="form-group">
                <select name="job_id" class="form-control" id="job_id" required>
                <option value="1">As a Normal User</option>
                <option value="2">As a Doctor</option>
                <option value="3">As a Pharmacy</option>
                <option value="4">As a Hospital</option>
                </select>
                    
                </div>

                <div class="form-group">
                   
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                </div>

                <div class="form-group">
                   
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                </div>

                <div class="form-group">
                   
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                   
                    <input type="text" class="form-control" id="emailid" name="emailid" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeypress="capLock(event)">
                    <div id="capskey" style="display:none;color:#EB4452;margin-top:5px;">Capslock is on.</div>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="confpassword" placeholder="Re-enter Password">
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="custombutton btncustom  " value="Sign Up">
                    </div>
                </div> 
            </form>
       
                    
        