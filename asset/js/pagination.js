/* * * Pagination javascript page navigation * * */
var paginationClass = "pagination-posts";
var deactClass 	= "deactArrow";
var deactnextclass,deactprevclass 	= "";

var Pagination = {  
  code: '',
  /* ------ Utility ------ */
  
  // converting initialize data
  Extend: function(data) {
    data = data || {};    
    Pagination.size = data.size || 300;
    Pagination.page = data.page || 1;
    Pagination.step = data.step || 2;   		
  },
  // add pages by number (from [s] to [f])
  Add: function(s, f) {
    for (var i = s; i < f; i++) {
       Pagination.code += '<a class="page_link '+paginationClass+'" data="'+i+'" >' + i + '</a>';
    }
  },

  // add last page with separator
  Last: function() {
    Pagination.code += '<i>...</i><a class="page_link '+paginationClass+'" data="' + Pagination.size +'" >' + Pagination.size + '</a>';
  },

  // add first page with separator
  First: function() {
    Pagination.code += '<a class="page_link '+paginationClass+'" data="1">1</a><i>...</i>';
  },
  
  /* ------ Handlers ------ */

  // change page
  Click: function() {
    Pagination.page = +this.innerHTML;
    Pagination.Start();
    Pagination.CallFunction(Pagination);
  },

  // previous page
  Prev: function() {
    Pagination.page--;
    if (Pagination.page < 1) {
        Pagination.page = 1;
    }
    Pagination.Start();
  },

  // next page
  Next: function() {
    Pagination.page++;
    if (Pagination.page > Pagination.size) {
        Pagination.page = Pagination.size;
    }
    Pagination.Start();
  },
  
  /* ------ Script ------ */

  // binding pages
  Bind: function() {
    var a = Pagination.e.getElementsByTagName('a');
    for (var i = 0; i < a.length; i++) {
      if (a[i].innerHTML == Pagination.page){
        a[i].className += ' active';
      } 
      a[i].addEventListener('click', Pagination.Click, false);
    }    
  },

  // write pagination
  Finish: function() {
    Pagination.e.innerHTML = Pagination.code;
    Pagination.code = '';
    Pagination.Bind();    
  },

  // find pagination type
  Start: function() {
    if (Pagination.size < Pagination.step * 2 + 6) {
      Pagination.Add(1, Pagination.size + 1);
    }
    else if (Pagination.page < Pagination.step * 2 + 1) {
      Pagination.Add(1, Pagination.step * 2 + 4);
      Pagination.Last();
    }
    else if (Pagination.page > Pagination.size - Pagination.step * 2) {
      Pagination.First();
      Pagination.Add(Pagination.size - Pagination.step * 2 - 2, Pagination.size + 1);
    }
    else {
      Pagination.First();
      Pagination.Add(Pagination.page - Pagination.step, Pagination.page + Pagination.step + 1);
      Pagination.Last();
    }
    Pagination.Finish();    
  },
  
  /* ------ Initialization ------ */

  // binding buttons
  Buttons: function(e) {
    var nav = e.getElementsByTagName('a');
    nav[0].addEventListener('click', Pagination.Prev, false);
    nav[1].addEventListener('click', Pagination.Next, false);
  },

  // create skeleton
  Create: function(e) {
		if(Pagination.page == 1){
			deactprevclass= deactClass;
		}else{
			deactprevclass= paginationClass;
		}
		if( Pagination.page == Pagination.size){
			deactnextclass= deactClass;
		}	else{
			deactnextclass= paginationClass;
		}		 
    var html = [
      '<a id="jp-previous" class="jp-previous '+deactprevclass+'" data="'+(Pagination.page-1)+'"></a>', // previous button
      '<span></span>',  // pagination container
      '<a id="jp-next" class="jp-next '+deactnextclass+'" data="'+(Pagination.page+1)+'"></a>'  // next button
    ];

    e.innerHTML = html.join('');
    Pagination.e = e.getElementsByTagName('span')[0];
    Pagination.Buttons(e);
  },
  /* *** call external function *** */
  CallFunction: function(Pagination) {
    var DataId = 1;    
    //FetchData(Pagination.page);
  },
  
  /* *** init *** */
  
  
	Init: function(e, data) {
    Pagination.Extend(data);
    Pagination.Create(e);
    Pagination.Start(); 
  } 
   
};

/* * * * Initialization * * * */