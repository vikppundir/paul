
    <?php $type = $type??'main' ?>
    <?php  $categoryName = isset($_REQUEST['name']) ? strip_tags($_REQUEST['name']) : null ; ?> ?>
    <?php  $categoryId =  isset($_REQUEST['id']) ? strip_tags($_REQUEST['id']) : null ; ?>
    <?php  $categorysql = sql("select * from category where id !='{$categoryId}' and parentId IN('',0) and is_active = 1")->data; ?>
    <?php  $categoryMenu = sql("SELECT c1.* FROM category c1 LEFT JOIN category c2 on c2.id = c1.parentId where c1.type='{$type}' ORDER BY COALESCE(c2.id, c1.id), c1.id and c1.is_active = 1 limit 10")->data; ?>
    <?php  $categorySignle = sql("select * from category where id='{$categoryId}' and name = '{$categoryName}' and is_active = 1")->data[0]??null; ?>
    <?php  $categoryCount = sql("select count(*) as count from category where c1.type='{$type}' and  is_active = 1") ?>
   
    
<div class="main-content d-flex">
        <div class="add-cat-main">
            <div class="head">
                <h3>Add Category</h3>
            </div>
            <div class="add-cat-form">
                <form  method="post" id="categoryCreate">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="category" id="category">
                    </div>
                    <div class="form-group">
                        <label for="">Parent Category</label>
                        <select name="prentCategory" id="prentCategory">
                         <option value="0">No parent Category</option>
                          <?php  foreach($categorysql as $cat): ?>
                           <option value="<?php echo $cat->id;  ?>"><?php echo $cat->name;  ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div id="errs"></div>
                    <div class="stust-publish-btn">
                        <a  class="dash-btn" onclick="createCategory(); return false;">Publish</a>
                    </div>
                </form>
            </div>
        </div>
        <aside class="cat-sidebar">
            <div class="allpagescat">
                <div class="head">
                    <h3>All Categories</h3>
                </div>
                
                <div class="allpages-cat">
                    <div class="allpages-cat-head">
                        
                        <div class="allpages-cat-inner d-flex">
                            <div class="page-name">
                                <h3>Catogry Name</h3>
                            </div>
                            <div class="page-author">
                                <h3>Count</h3>
                            </div>
                            <div class="page-date">
                                <h3>Date</h3>
                            </div>
                        </div>
                    </div>
                    <div class="allpage-list">
                        
                <?php foreach($categoryMenu as $menu): ?>
                        <div class="allpages-cat-inner d-flex align-items-center">
                            <div class="page-name">
                                <h3><?php if($menu->parentId != 0 ) echo '--' ;  ?> <?php echo $menu->name ?></h3>
                                <div class="pagemeta">
                                    <ul>
                                        <li><a href="<?= ABSPATH ?>admin/category?id=<?php echo $menu->id ?>&name=<?php echo $menu->name ?>">Edit</a></li>
                                        <li><a href="">Delete</a></li>
                                        <li><a href="<?= ABSPATH ?>admin/category?id=<?php echo $menu->id ?>&name=<?php echo $menu->name ?>">View</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="page-author">
                                <h3><?php echo $menu->postCount ?></h3>
                            </div>
                            <div class="page-date">
                               <?php echo date('d-M-Y',strtotime($menu->created_at)) ?>
                            </div>
                        </div>
               <?php endforeach; ?>
           
                    </div>
                        <div data-count="<?= $categoryCount->data[0]->count; ?>" limit="10" step="1" style="display:none" class="data-count"></div>
               <div class="pagination-recent-post pagination view-more-button" data-count="<?= $categoryCount->data[0]->count; ?>" id="pagination">
               </div>
                </div>
            </div>
        </aside>
    </div>