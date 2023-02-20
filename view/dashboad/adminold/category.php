<style>
   .w-40{width:40%;}
   .p-05 {
   padding: 0.5rem !important;
   }
</style>

    <?php  $categoryName = isset($_REQUEST['name']) ? strip_tags($_REQUEST['name']) : null ; ?> ?>
    <?php  $categoryId =  isset($_REQUEST['id']) ? strip_tags($_REQUEST['id']) : null ; ?>
    <?php  $categorysql = sql("select * from category where id !='{$categoryId}' and parentId IN('',0)")->data; ?>
    <?php  $categoryMenu = sql("SELECT c1.* FROM category c1 LEFT JOIN category c2 on c2.id = c1.parentId ORDER BY COALESCE(c2.id, c1.id), c1.id")->data; ?>
    <?php  $categorySignle = sql("select * from category where id='{$categoryId}' and name = '{$categoryName}' ")->data[0]; ?>
    
<main>
   <section class="sidebar">
      <aside>
         <div class="side-menubox">
            <div class="input-group-prepend justify-content-center">
               <button class="btn bg-white p-1"><a href="<?= ABSPATH ?>admin/category#popup" class="button-link-design p-2">Add new</a></button> 
            </div>
            <div class="input-group-prepend">
               <input type="search" class="form-control outline-none no-border mt-3 mb-6 w-96" placeholder="Type Something here..">
            </div>
            <div class="side-titlebox d-flex align-items-center justify-content-between ">
               <h4>Category</h4>
               <i class="bi bi-person-circle"></i>
            </div>
            <ul class="nav nav-pills">
                <?php foreach($categoryMenu as $menu): ?>
               <li class="nav-item">
                  <a class="nav-link" href="<?= ABSPATH ?>admin/category?id=<?php echo $menu->id ?>&name=<?php echo $menu->name ?>">
                     <div class="col"><?php if($menu->parentId != 0 ) echo '--' ;  ?> <?php echo $menu->name ?></div>
                     <div class="arrow d-flex align-items-center"><i class="bi bi-trash"></i></div>
                  </a>
               </li>
               <?php endforeach; ?>
            </ul>
         </div>
      </aside>
   </section>

   <?php if(isset($_REQUEST['name']) && !empty($categorySignle)): ?>
   <section class="body float-right w-85 d-flex mt-12">
      <section class="w-100 mt-6 ms-6">
         <form method="post" id="categoryupdate">
             <div id="errs"></div>
            <div class="row">
               <label for="category">Categry Name</label>
               <input type="text" name="category" id="category" value="<?php echo strip_tags($categorySignle->name)  ?>" class="form-control outline-none border border-primary w-40 .p-05" >
            </div>
            <div class="row mt-2">
               <label for="prentCategory">Select Parent</label>
               <select name="prentCategory" id="prentCategory" class="form-control outline-none border border-primary w-40 .p-05" >
                    <option value="0">No parent Category</option>
                  <?php  foreach($categorysql as $cat): ?>
                     <option <?php if($categorySignle->parentId == $cat->id) echo "selected"; ?> value="<?php echo $cat->id;  ?>"><?php echo $cat->name;  ?></option>
                  <?php endforeach; ?>               
                  </select>
            </div>
            <div class="row mt-2">
               <label for="metaTitle">Meta Title</label>
               <input type="text" name="title" id="metaTitle" value="<?php echo $categorySignle->title ?>" class="form-control outline-none border border-primary w-40 .p-05 " >
            </div>
            <div class="row mt-2">
               <label for="Discription">Discription</label>
               <textarea type="text" name="descrption" id="Discription"class="form-control outline-none border border-primary w-40 .p-05 " ><?php echo $categorySignle->deccription ?></textarea>
            </div>
            
             <div class="row mt-2">
                  <input type="hidden"  name="id" value="<?php echo strip_tags($categorySignle->id)?>">

                 <input type="submit" name="update" class="btn bg-white p-2 .p-05 mt-2 w-40" name="submit">
             </div>
         </form>
      </section>
   </section>
   <?php endif;  ?>
   
   
   <form method="post" id="categoryCreate">
      <div class="input-group">
         <div id="popup" class="pop-up-design rounded">
             <div id="errs"></div>
            <div class="" style="disply:flex;">
               <label for="category">Categry Name</label>
               <input type="text" name="category" id="category" class="form-control outline-none border border-primary p-05" >
            </div>
            <div class="mt-2">
               <select name="prentCategory" id="prentCategory" class="form-control outline-none border border-primary p-05" >
                  <option value="0">No parent Category</option>
                  
                  <?php  foreach($categorysql as $cat): ?>
                  <option value="<?php echo $cat->id;  ?>"><?php echo $cat->name;  ?></option>
                  <?php endforeach; ?>
               </select>
               <button class="btn bg-white p-2 .p-05 mt-2" onclick="createCategory(); return false;">Save</button>
               <button class="btn bg-white p-2 .p-05 mt-2"> <a class="close-modal button-link-design">Close</a></button>
            </div>
         </div>
      </div>
   </form>
</main>
