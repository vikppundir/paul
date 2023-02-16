<?php if ( !defined('ACCESS') ) header("location:../"); ?>

<style type="text/css" media="screen">
/*h3.question {
  font-family: "Roboto", sans-serif;
  font-size: 24px;
  text-align: center;
  font-weight: 100;
}
 
.editor-container {
  width: 98%;
  height: 540px;
  margin: 20px auto;
  position: relative;
}

#editor {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  height: 100%;
  width: 100%;
  font-size: 20px;
}*/

.child {
    height: 0;
    overflow: hidden;
    margin: 0 !important;
    transition:.3s all ease;
}
.showchild .child{
    height:auto;
    overflow:visible;
    margin-top:10px !important;
}
li.nav-item.parent{
    cursor:pointer;
}

</style>
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
                            
                            <h4>Template</h4>
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <ul class="nav nav-pills side-titlebox">
                            <li class="nav-item parent">
                                This is test <i class="bi bi-arrow-right-short"></i>
                                <ul class="nav nav-pills side-titlebox child">
                                    <li class="nav-item">Test</li>
                                    <li class="nav-item">Test</li>
                                    <li class="nav-item">Test</li>
                                </ul>
                            </li>
                             <li class="nav-item parent">
                                This is test <i class="bi bi-arrow-right-short"></i>
                                <ul class="nav nav-pills side-titlebox child">
                                    <li class="nav-item">Test</li>
                                    <li class="nav-item">Test</li>
                                    <li class="nav-item">Test</li>
                                </ul>
                            </li>
                   <?php
                          $menus = new FilesystemIterator("asset/css/skin"); 
                          $PageName = $_REQUEST['skin']??'';
                          $templates = new skin($PageName);
                          if(isset($_POST['saveContent'])):
                            $templates->save();
                          endif;
                          foreach($menus as $entry):
                          if($entry->getFilename() != 'index.php'):
                          $name = basename($entry->getFilename(), '.css');
                     ?>
         
                           <li class="nav-item">
                                <a class="nav-link <?php if($name === $PageName) echo 'active'; ?>" aria-current="page" href="<?php echo ABSPATH.'dashboad/skin?skin='.$name; ?>">
                                    <div class="col text-overflow"><?php echo $name; ?></div>
                                    <div class="arrow d-flex align-items-center"><!--<i class="bi bi-trash"></i>--></div>
                                </a>
                            </li>
                        <?php endif; endforeach; ?>
                      
                        </ul>
                    </div>

                 
               
            </aside>
        </section>
        
        <section class="body float-right w-85 d-flex mt-12">
        
            <section class="w-100 mt-6 ms-6">
            <?php if(isset($PageName) && file_exists("asset/css/skin/{$PageName}.css")): ?>
            <form method="post" id="componentsave">
                <input type="text" placeholder="Add your title here" value="<?php echo $PageName; ?>" class="w-96 p-3 rounded form-control outline-none border border-primary">
                <h3 class="mt-6">Enter your code here</h3>
               <textarea class="w-96 p-3 rounded form-control outline-none border border-primary mt-2"rows="20" name="content"><?php echo $templates->load();  ?></textarea>
               
               
                   <div class="editor-container">
                    <!--<div id="editor"><?php //echo $templates->load();?></div>-->
                  </div>
                  
               <input type="submit" name="saveContent" class="dash-btn button-background mt-6 align-items-center d-block mx-auto w-25 round-button" value="Save">
             
               </form>
            <?php else: echo "<h3 style='text-align: center;margin-top: 14%;'> does not exist templates  </h3>"; endif; ?>

            </section>
           
        </section>
       
    </main>
   

                       
                    
     <div id="popup" class="pop-up-design rounded">
        <div class="search align-items-center">
        <form method="post" id="skin">
                   <div class="input-group">
                          <div>
                          <div id="errs"> </div>
                          <input type="text" name="templatename" placeholder="Create a Skin" class="d-block form-control outline-none no-border mt-3 mb-6" onkeydown="if(event.key === 'Enter'){event.preventDefault();createSkin();}">
                     
                          <button class="dash-btn bg-white p-2 mr-1" onclick="createSkin(); return false;">   Save</button>
                          <button class="dash-btn bg-white p-2 ms-1">   <a class="close-modal button-link-design" onclick="close();return false;">Close</a></button>
                            </div>
                        </div>
                  </form>
        </div>
                </div>
            
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.10.1/ace.js" ></script>
<script>

let editor = document.querySelector("#editor");

ace.edit(editor, {
  theme: "ace/theme/monokai",
  mode: "ace/mode/css",
  name:"content",
  selectionStyle: "css"
 
});

// categorie js
if (document.body.addEventListener){
    document.body.addEventListener('click',yourHandler,false);
}
else{
    document.body.attachEvent('onclick',yourHandler);//for IE
}

function yourHandler(e){
    e = e || window.event;
    var target = e.target || e.srcElement;
    if (target.className.match(/parent/))
    {
        //an element with the keyword Class was clicked
        console.log("click");
        if(target.classList.contains("showchild")){
            target.classList.remove("showchild");
        }
        else{
            target.classList.add("showchild");
        }
        
    }
}

</script>

