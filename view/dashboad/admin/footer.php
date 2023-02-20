
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="<?php echo ABSPATH; ?>asset/js/admin/js/charts.js"></script>
<script src="<?php echo ABSPATH; ?>asset/js/admin/js/custom.js"></script>
<script src="<?php echo ABSPATH; ?>asset/js/admin/script.js"></script>
<script src="<?php echo ABSPATH; ?>asset/js/pagination.js">  </script>
<script>

                    var count = $('.data-count').attr("data-count");
                     var Limit = $('.data-count').attr("limit");
                     var step = $('.data-count').attr("step");
                      var count = parseInt(count);
                      var curent_page  = parseInt(1);
                      var msg_per_page_limit_ = parseInt(Limit);
                      var number_of_pages_ = Math.ceil(count/msg_per_page_limit_);
                      if(number_of_pages_ > 1){
                        Pagination.Init(document.getElementById('pagination'), {
                          size: number_of_pages_,
                          page: curent_page, 
                          step: parseInt(step)
                        });
                      }
                      
                 $(document).on('click','.pagination a,.pagination-posts',function(){
                     var csrfMetaTag = $('meta[name="csrf_token"]').attr('content');

                   var pageNumber  =  parseInt($(".pagination a.active").attr('data'));
                   var Limit = parseInt($('.data-count').attr("limit"));
                   
                     $.post("/session/admin/v2/api/app/category",
                      {
                       action: "pagination",
                       csrf_token:csrfMetaTag,
                       limit : Limit,
                       pageNumber:pageNumber
                      },
                      function(response){
                        $('.allpage-list').html(''); 
                      
                      $('.allpage-list').append(response);
                      
                      var count = $('.data-count').attr("data-count");
                      var Limit = $('.data-count').attr("limit");
                      var count = parseInt(count);
                      var curent_page  = parseInt(pageNumber);
                      var msg_per_page_limit_ = parseInt(Limit);
                      var number_of_pages_ = Math.ceil(count/msg_per_page_limit_);
                      if(number_of_pages_ > 1){
                        Pagination.Init(document.getElementById('pagination'), {
                          size: number_of_pages_,
                          page: curent_page, 
                          step: parseInt(step)
                        });
                      }
                         
                     });
                     
                })
 </script>
</body>
</html>
