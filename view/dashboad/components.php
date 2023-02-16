
<?php if ( !defined('ACCESS') ) header("location:../"); ?>
    <main>
        <section class="sidebar">
            <aside>
               
                    <div class="side-menubox">
                        <div class="input-group-prepend justify-content-center">
                        <button class="dash-btn bg-white p-1"><a href="#popup" class="button-link-design p-2">Add new</a></button> 
                        </div>
                        <div class="input-group-prepend">
                            <input type="search" class="form-control outline-none no-border mt-3 mb-6 w-96 font-size-s" placeholder="Type Something here..">
                          </div>
                        <div class="side-titlebox d-flex align-items-center justify-content-between">
                            
                            <h4>Components</h4>
                            <i class="bi bi-person-circle"></i>
                        </div>
                            <!--<div class="arrow d-flex align-items-center"><i class="bi bi-trash"></i></div>-->
                        <ul class="nav nav-pills side-titlebox">
                   <?php
                          $menus = new FilesystemIterator("view/component"); 
                          $componentName = $_REQUEST['component']??'';
                          $components = new components($componentName);
                          if(isset($_POST['saveContent'])):
                            $components->save();
                          endif;
                          foreach($menus as $entry):
                          if($entry->getFilename() != 'index.php' && $entry->getFilename() != 'error_log'):
                          $name = basename($entry->getFilename(), '.php');
                     ?>
         
                           <li class="nav-item">
                                <a class="nav-link <?php if($name === $componentName) echo 'active'; ?>" aria-current="page" href="<?php echo ABSPATH.'dashboad/component?component='.$name; ?>">
                                    <div class="col text-overflow"><?php echo $name; ?></div>
                                
                                </a>
                            </li>
                        <?php endif; endforeach; ?>
                      
                        </ul>
                    </div>

                 
               
            </aside>
        </section>
        
        <section class="body float-right w-85 d-flex mt-12">
        
            <section class="w-100 mt-6 ms-6">
            <?php if(isset($componentName) && file_exists("view/component/{$componentName}.php")): ?>
            <form method="post" id="componentsave">
                <input type="text" placeholder="Add your title here" value="<?php echo $componentName; ?>" class="w-96 p-3 rounded form-control outline-none border border-primary">
                <h3 class="mt-6">Enter your code here</h3>
               <textarea class="w-96 p-3 rounded form-control outline-none border border-primary mt-2"rows="20" name="content"><?php echo $components->load();  ?></textarea>
               <input type="submit" name="saveContent" class="dash-btn button-background mt-6 align-items-center d-block mx-auto w-25 round-button" value="Save">
               </form>
               <component>
               <div id="output" class="bg-white w-96 p-3 thin-border border-primary rounded mt-6 h-10 w-50">
                <?php  if(file_exists("view/component/{$componentName}.php")) include_once "view/component/{$componentName}.php"; ?>
               </div>
              </component>
            <?php else: echo "<h3 style='text-align: center;margin-top: 14%;'> does not exist component  </h3>"; endif; ?>

            </section>
           
        </section>
       
    </main>
   
    <div class="search align-items-center">
        <form method="post" id="createComponent">
                   <div class="input-group">
                       
                    
                      <div id="popup" class="pop-up-design rounded">
                          <div>
                          <div id="errs"> </div>
                          <input type="text" name="componentname" placeholder="Create a Component" class="d-block form-control outline-none no-border mt-3 mb-6" onkeydown="if(event.key === 'Enter'){event.preventDefault();createComponent();}">
                          <button class="dash-btn bg-white p-2 mr-1" onclick="createComponent(); return false;">   Save</button>
                          <button class="dash-btn bg-white p-2 ms-1">   <a class="close-modal button-link-design" onclick="close();return false;">Close</a></button>
                            </div>
                        </div>
                  
                </div>
            </form>
        </div>

</body>
</html>
