 
 <style> #mainbox{display:none} </style>
 <div class="container">
    <div class="row justify-content-center">
      <div class="col-11 col-sm-10 col-md-10 col-lg-8 col-xl-8 text-center p-0 mt-3 mb-2">
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
          <h2 id="heading">Sign Up Your Trader Account</h2>
          <p>Fill all form field to go to next step</p>
          <div id="errs"> </div>
       <?php $business = new business(); ?>
       <?php $data = json_decode($business->businessById(user()->id))->data[0] ?? '' ?>
       
        
          <form method="post" id="businessRegistration" class="msform" enctype="multipart/form-data">
            <!-- progressbar -->
            <ul id="progressbar">
              <li class="active" id="account">
                <strong>Business</strong>
              </li>
              <li id="personal">
                <strong>Personal</strong>
              </li>
              <li id="payment">
                <strong>Services</strong>
              </li>
              <li id="confirm">
                <strong>Finish</strong>
              </li>
            </ul>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
            <br>
            <!-- fieldsets -->
            <fieldset>
              <div class="form-card">
                <div class="row">
                  <div class="col-7">
                    <h2 class="fs-title">Account Information:</h2>
                  </div>
                  <div class="col-5">
                    <h2 class="steps">Step 1 - 4</h2>
                  </div>
                </div>
                <label class="fieldlabels">Upload Image:</label>
                <!-- Upload  -->
                <div id="file-upload-form" class="uploader">
                  <input id="file-upload" type="file" name="BusinessPhoto" value="<?= $data->BusinessPhoto??'' ?>" accept=".jpeg, .jpg, .png, .gif" />

                  <label for="file-upload" id="file-drag">
                    <img id="file-image" src="<?= $data->BusinessPhoto??'' ?>" alt="Preview" class="<?php $data->BusinessPhoto??'hidden' ?>">
                    <div id="start">
                      <i class="fa fa-download" aria-hidden="true"></i>
                      <div>Select a file or drag here</div>
                      <div id="notimage" class="hidden">Please select an image</div>
                      <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                    </div>
                    <div id="response" class="hidden">
                      <div id="messages"></div>
                      
                    </div>
                  </label>
                </div>
                <h2 class="fs-title">About Me</h2>
                <label class="fieldlabels">Short Description (Maximum 100 character)</label>
              <textarea name="aboutMe" placeholder="I’m Noah, mentor of 45 year experience. I firstly worked as a HR in WMI Company for 3 years." ><?= $data->businessBio??'' ?></textarea>
              <hr>
              <h2 class="fs-title">About Profile</h2>
                <label class="fieldlabels">Description: *</label>
              <textarea name="businessBio" placeholder="I’m very passionate and dedicated to my work. I have over 40 years of experience in WMI as HR" rows="12"></textarea>  
              <hr>
              <h2 class="fs-title">My Experience</h2>
              <div id="expriceMain">
                  
              </div>
              <div class="servicetypemain" id="myexperienceClone" >
                <select name="my-exp">
                  <option value="">Choose Experience</option>
              </select>
              
              <label class="fieldlabels">Description: *</label>  
              <textarea name="expFieldDescription" placeholder="I’ll help you create a brand that is instantly recognizable and memorable." ></textarea>  
              </div>
              
              <div class="addmoreservice">
                  <button class="addmoreservicebtn myexperience">Add More Experience</a>
                    <button class="addmoreservicebtn remove">Remove</a>
                </div>
              </div>
              <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>
            <fieldset>
              <div class="form-card">
                <div class="row">
                  <div class="col-7">
                    <h2 class="fs-title">Personal Information:</h2>
                  </div>
                  <div class="col-5">
                    <h2 class="steps">Step 2 - 4</h2>
                  </div>
                </div>
                <h2 class="fs-title">Experience</h2>
                <h3 class="fs-title-h3">Contact Details</h3>
                <label class="fieldlabels">First Name</label>
              <input type="text" name="Firstname" value="<?= user()->name ?>" placeholder="Enter Your First Name " />
              <label class="fieldlabels">Last Name</label>
              <input type="text" name="Lastname" value="<?= user()->last ?>" placeholder="Enter Your Last Name " />
              <label class="fieldlabels">Phone Number</label>
              <input type="email" name="contactNo" value="<?= $data->contactNo??'' ?>" placeholder="Enter Your Contact Number " />
              <label class="fieldlabels">Email Address</label>
              <input type="email" name="businessEmail" value="<?= $data->BusinessEmail??'' ?>" placeholder="Enter Your Email Address" />
              
              <hr>
              <h3 class="fs-title-h3">Service area</h3>
              <label class="fieldlabels">Add Locations</label>
                <div class="container mt-4">
                  <div class="form-group row">
                    <div class="" style="width:100%">
                      <input type="text" name="Service_area" id="servicesarea" value="<?= $data->Service_area??'' ?>" class="form-control" placeholder="          ">
                            <small class="form-text text-muted">Separate keywords with a comma, space bar, or enter key</small>
                    </div>
                  </div>

                </div>
                
                <hr>
                
                <h3 class="fs-title-h3">Qualification</h3>
                <div id="qualificationMain"></div>
              <div class="servicetypemain" id="qualificationClone" >
                
                <label class="fieldlabels">Add Qualification</label>
              <input type="email" name="qualification" value="M.Sc in bussiness" placeholder="Enter Your Qualification" />
              </div>
              
              <div class="addmoreservice">
                  <button class="addmoreservicebtn qualificationbx">Add More Qualification</a>
                    <button class="addmoreservicebtn remove">Remove</a>
                </div>

              <label class="fieldlabels" style="margin-top:25px;display:inline-block;">Business hours</label>
                <div class="businesshour-outter">
                  <div class="businesshour-inner">
                      <?php  $time = json_decode($data->Businesshours??null); ?>
                    <div class="businessinput">
                      <input type="checkbox" value="sunday" name="Businessday[]" <?php echo str_contains($data->Businessday??null ,'sunday') ? 'checked' :''; ?>>
                    </div>
                  
                    <div class="business-day">
                      <p>Sunday</p>
                    </div>
                    <div class="Fromtime">
                      <p>From</p>
                      <select class="time" name="sunday">
                          <option> <?php echo before($time->sunday??null,'-') ?> </option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                      </select>
                    
                    </div>
                    <div class="too-time">
                      <p>To</p>
                      <select class="time" name= "sundayto">
                          <option> <?php echo after($time->sunday??null,'-') ?> </option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                      </select>
                      
                    </div>
                  </div>
                  <div class="businesshour-inner">
                    <div class="businessinput">
                      <input type="checkbox" value="monday" name="Businessday[]" <?php echo str_contains($data->Businessday??null ,'monday') ? 'checked' :''; ?>>
                    </div>
                    <div class="business-day">
                      <p>Monday</p>
                    </div>
                    <div class="Fromtime">
                      <p>From</p>
                      <select class="time" name="monday">
                        <option> <?php echo before($time->monday??null,'-') ?> </option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                          
                      </select>
                    </div>
                    <div class="too-time">
                      <p>To</p>
                      <select class="time"  name="mondayto">
                          <option> <?php echo after($time->monday??null,'-') ?> </option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                          
                      </select>
                    </div>
                  </div>
                  <div class="businesshour-inner">
                    <div class="businessinput">
                      <input type="checkbox" value="tuesday" name="Businessday[]" <?php echo str_contains($data->Businessday??null ,'tuesday') ? 'checked' :''; ?>>
                    </div>
                    <div class="business-day">
                      <p>Tuesday</p>
                    </div>
                    <div class="Fromtime">
                      <p>From</p>
                      <select class="time" name="tuesday">
                        <option> <?php echo before($time->tuesday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59'); ?>
                          
                      </select>
                    </div>
                    <div class="too-time">
                      <p>To</p>
                      <select class="time"  name="tuesdayto">
                        <option><?php echo after($time->tuesday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59'); ?>
                          
                      </select>
                    </div>
                  </div>
                  <div class="businesshour-inner">
                    <div class="businessinput">
                      <input type="checkbox" value="wednesday" name="Businessday[]" <?php echo str_contains($data->Businessday??null ,'wednesday') ? 'checked' :''; ?>>
                    </div>
                    <div class="business-day">
                      <p>Wednesday</p>
                    </div>
                    <div class="Fromtime">
                      <p>From</p>
                      <select class="time" name="wednesday">
                           <option><?php echo before($time->wednesday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                          
                      </select>
                    </div>
                    <div class="too-time">
                      <p>To</p>
                      <select class="time" name="wednesdayto">
                        <option><?php echo after($time->wednesday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                          
                      </select>
                    </div>
                  </div>
                  <div class="businesshour-inner">
                    <div class="businessinput">
                      <input type="checkbox" value="thursday" name="Businessday[]" <?php echo str_contains($data->Businessday??null ,'thursday') ? 'checked' :''; ?>>
                    </div>
                    <div class="business-day">
                      <p>Thursday</p>
                    </div>
                    <div class="Fromtime">
                      <p>From</p>
                      <select class="time" name="thursday">
                            <option><?php echo before($time->thursday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                      </select>
                    </div>
                    <div class="too-time">
                      <p>To</p>
                      <select class="time" name="thursdayto">
                            <option><?php echo after($time->thursday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                          
                      </select>
                    </div>
                  </div>
                  <div class="businesshour-inner">
                    <div class="businessinput">
                      <input type="checkbox" value="friday" name="Businessday[]" <?php echo str_contains($data->Businessday??null ,'friday') ? 'checked' :''; ?>>
                    </div>
                    <div class="business-day">
                      <p>Friday</p>
                    </div>
                    <div class="Fromtime">
                      <p>From</p>
                      <select class="time" name="friday">
                          
                         <option><?php echo before($time->friday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                      </select>
                    </div>
                    <div class="too-time">
                      <p>To</p>
                      <select class="time" name="fridayto">
                          <option><?php echo after($time->friday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                          </select>
                    </div>
                  </div>
                  <div class="businesshour-inner">
                    <div class="businessinput">
                      <input type="checkbox" value="saturday" name="Businessday[]" <?php echo str_contains($data->Businessday??null ,'saturday') ? 'checked' :''; ?>>
                    </div>
                    <div class="business-day">
                      <p>Saturday</p>
                    </div>
                    <div class="Fromtime">
                      <p>From</p>
                      <select class="time" name="saturday">
                        <option><?php echo before($time->saturday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                      </select>
                    </div>
                    <div class="too-time">
                      <p>To</p>
                      <select class="time" name="saturdayto">
                               <option><?php echo after($time->saturday??null,'-') ?></option>
                          <?php echo TimeList('option',30,'00:00','23:59' ); ?>
                          
                      </select>
                    </div>
                  </div>
                </div>
                
              </div>
              <input type="button" name="next" class="next action-button" value="Next" />
              <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
            </fieldset>
            <fieldset>
              <div class="form-card">
                <div class="row">
                  <div class="col-7">
                    <h2 class="fs-title">Services:</h2>
                  </div>
                  <div class="col-5">
                    <h2 class="steps">Step 3 - 4</h2>
                  </div>
                </div>
                
                
                <div class="servicemainbox">
                    
               <?php $category = new category(['type=>service']);  ?>
               
               <?php $categorybusniss = $category->ChildById(0);   ?>
                  
                 <?php $categorybusniss = json_decode($categorybusniss);  ?>
                  
                   <div class="servicetypemain" id="mainbox" >
                    <label class="fieldlabels">Industry</label>
                   <select name="ServicesType[]" id="" onchange="childCategory(this)">
                     <option value="">select</option>
                   <?php  foreach($categorybusniss->data as $catb): ?>
                    <option value="<?= $catb->id ?>"><?= $catb->name ?></option>
                    <?php  endforeach; ?>
                  </select>

                       <h4>Expertise</h4>
                    <div class="servicebox">
                      <div class="selectservices">
                     </div>
                      
                    </div>
                  </div>
                  
                <?php if(isset($data->Services)): ?>
                <?php $service = json_decode($data->Services) ?>
                
                 
                 <h2 class="fs-title">My Skills</h2>
                 <div id="myskills">
                  <div class="servicetypemain" id="sermbo" >
                      
                    <label class="fieldlabels">Industry</label>
                    
               <select name="ServicesType[]" id="" onchange="childCategory(this)">
                     <option value="">select</option>
                   <?php  foreach($categorybusniss->data as $catb): ?>
                    <option value="<?= $catb->id ?>"><?= $catb->name ?></option>
                    <?php  endforeach; ?>
                  </select>
                    
                    <h4>Expertise</h4>
                    <div class="servicebox">
                      <div class="selectservices">
                     </div>
                      
                    </div>
                   
                  </div>
                  </div>
                  <div class="addmoreservice">
                    <button class="addmoreservicebtn addservice">Add More Service</a>
                    <button class="addmoreservicebtn remove">Remove</a>
                </div>
                  
                  <hr>
                  
                  <h3 class="fs-title-h3">My Information</h3>
                  <label>Year Experience</label>
                  <input type="number" value="" name="addexperience">
                  <label>Regular clients</label>
                  <input type="number" value="" name="regularClient">
                  
                  <label>Happy Clients</label>
                  <input type="number" value="" name="happyClients">
                  
                  <label>Projects Complete</label>
                  <input type="number" value="" name="projectsComplete">
                  
                      
                  <?php endif; ?>
                  
                </div>
                

              </div>
              <input type="button" name="next" class="next action-button" onclick="businessRegistration(); return false" value="Submit" />
              <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
            </fieldset>
            <fieldset>
              <div class="form-card">
                <div class="row">
                  <div class="col-7">
                    <h2 class="fs-title">Finish:</h2>
                  </div>
                  <div class="col-5">
                    <h2 class="steps">Step 4 - 4</h2>
                  </div>
                </div>
                <br>
                <br>
                <h2 class="purple-text text-center">
                  <strong>SUCCESS !</strong>
                </h2>
                <br>
                <div class="row justify-content-center">
                  <div class="col-3 sucessimg">
                    <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                  </div>
                </div>
                <br>
                <br>
                <div class="row justify-content-center">
                  <div class="col-7 text-center">
                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <script>
function childCategory(This){
 
var csrf_token = $('[name="csrf_token"]').attr('content');
 $.post(projectName+"session/v2/api/app/category",
  {
    
    prentCategory: This.value,
    action: "childCategory",
   csrf_token:csrf_token 
  },
  function(data, status){
 data = JSON.parse(data)
 var prantId = $(This).parent().attr('id');
 console.log(prantId);
 $('#'+prantId +' .selectservices').html('');
   $.each( data.data, function( key, value ) {
   
        $('#'+prantId +' .selectservices').append('<div><input type="checkbox" value="'+value.id+'" name="Services'+This.value+'[]">'+value.name+'</div>');
  });  
      
  });
    
}
  </script>