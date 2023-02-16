<?php if ( !defined('ACCESS') ) header("location:../"); ?>

    <main>
        <section class="sidebar">
            <aside>
               
                    <div class="side-menubox">
                        <div class="input-group-prepend justify-content-center">
                        <button class="dash-btn bg-white p-1"><a href="#popup" class="button-link-design p-2">Add new</a></button> 
                        </div>
                        <div class="input-group-prepend">
                            <input type="search" class="form-control outline-none no-border mt-3 mb-6 w-96" placeholder="Type Something here..">
                          </div>
                        <div class="side-titlebox d-flex align-items-center justify-content-between ">
                            
                            <h4>Endpoints</h4>
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <ul class="nav nav-pills">
                   <?php  
                          $dir = "app/api/endpoint";
                          $menus = new FilesystemIterator($dir); 
                          $endpointName = $_REQUEST['endpoint']??'';
                          $endpoint = new endpoint($endpointName);
                          if(isset($_POST['saveContent'])):
                            $endpoint->save();
                          endif;
                          foreach($menus as $entry):
                          if($entry->getFilename() != 'index.php'):
                          $name = basename($entry->getFilename(), '.php');
                     ?>
         
                           <li class="nav-item">
                                <a class="nav-link <?php if($name === $endpointName) echo 'active'; ?>" aria-current="page" href="<?php echo ABSPATH.'dashboad/endpoint?endpoint='.$name; ?>">
                                    <div class="col"><?php echo $name; ?></div>
                                    <!--<div class="arrow d-flex align-items-center"><i class="bi bi-trash"></i></div>-->
                                </a>
                            </li>
                        <?php endif; endforeach; ?>
                      
                        </ul>
                    </div>

                 
               
            </aside>
        </section>
        
        <section class="body float-right w-85 d-flex mt-12">
        
            <section class="w-100 mt-6 ms-6">
            <?php if(isset($endpointName) && file_exists("{$dir}/{$endpointName}.php")): ?>
            <form method="post" id="endpointsave">
                <input type="text" placeholder="Add your title here" value="<?php echo $endpointName; ?>" class="w-96 p-3 rounded form-control outline-none border border-primary">
                <h3 class="mt-6">Enter your code here</h3>
               <textarea class="w-96 p-3 rounded form-control outline-none border border-primary mt-2"rows="20" name="content"><?php echo $endpoint->load();  ?></textarea>
               
               <input type="submit" name="saveContent" class="dash-btn button-background mt-6 align-items-center d-block mx-auto w-25 round-button" value="Save">
               

               </form>
               <?php $href= sql("select href from endpoint where name=:name limit 1",array(':name'=>$endpointName))->data[0]->href;?>
               <a href="<?php echo ABSPATH.$href; ?>"target="_blank" class="dash-btn button-background mt-6 align-items-left d-block mx-auto w-25 round-button">view</a>
            <?php else: echo "<h3 style='text-align: center;margin-top: 14%;'> does not exist component  </h3>"; endif; ?>

            </section>
           
        </section>
       
    </main>
   
    <div class="search align-items-center">
        <form method="post" id="createEndpoint">
                   <div class="input-group">
                       
                    
                      <div id="popup" class="pop-up-design rounded">
                          <div>
                          <div id="errs"> </div>
                          <input type="text" name="endpoint" placeholder="Create a endpoint" class="d-block form-control outline-none no-border mt-3 mb-6" onkeydown="if(event.key === 'Enter'){event.preventDefault();createComponent();}">
                          <select name="formet_type">
                            <option value="json">Json</option>
                            <option value="html">Html</option>
                            <option value="text">Text</option>
                            <option value="xml">Xml</option>
                          </select>
                          <button class="dash-btn bg-white p-2 mr-1" onclick="createEndpoint(); return false;">   Save</button>
                          <button class="dash-btn bg-white p-2 ms-1"> <a class="close-modal button-link-design">Close</a></button>
                            </div>
                        </div>
                  
                </div>
            </form>
        </div>
