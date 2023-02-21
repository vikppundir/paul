<script>
$(document).ready(function () {

	var current_fs, next_fs, previous_fs; //fieldsets
	var opacity;
	var current = 1;
	var steps = $("fieldset").length;

	setProgressBar(current);

	$(".next").click(function () {

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({ opacity: 0 }, {
			step: function (now) {
				// for making fielset appear animation
				opacity = 1 - now;

				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				next_fs.css({ 'opacity': opacity });
			},
			duration: 500
		});
		setProgressBar(++current);
	});

	$(".previous").click(function () {

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();

		//hide the current fieldset with style
		current_fs.animate({ opacity: 0 }, {
			step: function (now) {
				// for making fielset appear animation
				opacity = 1 - now;

				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				previous_fs.css({ 'opacity': opacity });
			},
			duration: 500
		});
		setProgressBar(--current);
	});

	function setProgressBar(curStep) {
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width", percent + "%")
	}

	$(".submit").click(function () {
		return false;
	})

});


// http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/

$(document).ready(function () {

	$('#servicesarea').tagsinput({
		trimValue: true,
		confirmKeys: [13, 44, 32],
		focusClass: 'my-focus-class'
	});

	$('.bootstrap-tagsinput input').on('focus', function () {
		$(this).closest('.bootstrap-tagsinput').addClass('has-focus');
	}).on('blur', function () {
		$(this).closest('.bootstrap-tagsinput').removeClass('has-focus');
	});

	// Add service btn
	var divcount = 0;
	$(".addservice").click(function (event) {
		event.preventDefault();
		divcount+=1;
		var ele = $('#servicetypemain').clone();
		ele.removeAttr("id");
		ele.attr("id","sermbo"+divcount)
		$("#servicetypemain").append(ele)

	})
	$(".remove").click(function (event) {
		event.preventDefault();
		$("#sermbo"+divcount).remove();
		divcount-=1;
	})
});

// All Time
var time=[];
for (var i=1;i<=12;i++){
  
  if(i<12){
  $(".my_select").append("<option>"+i+":00 am"+"</option>");
  $(".my_select").append("<option>"+i+":30 am"+"</option>");
    }
  else{
    $(".my_select").append("<option>"+i+":00 pm"+"</option>");
  $(".my_select").append("<option>"+i+":30 pm"+"</option>");
  }
}
for (var j=1;j<=12;j++){
  if(j<12){
  $(".my_select").append("<option>"+j+":00 pm"+"</option>");
  $(".my_select").append("<option>"+j+":30 pm"+"</option>");
    }
  else{
    $(".my_select").append("<option>"+j+":00 am"+"</option>");
  $(".my_select").append("<option>"+j+":30 am"+"</option>");
  }
}

//store tha value in an array
$(".my_select option").each(function(index,value){
  time.push($(value).val());
});
for(var f=0;f<time.length;f++){
  $(".my_list").append("<li>"+time[f]+"</li>");
};

// File Upload
// 
function ekUpload(){
	function Init() {
  
	  console.log("Upload Initialised");
  
	  var fileSelect    = document.getElementById('file-upload'),
		  fileDrag      = document.getElementById('file-drag'),
		  submitButton  = document.getElementById('submit-button');
  
	  fileSelect.addEventListener('change', fileSelectHandler, false);
  
	  // Is XHR2 available?
	  var xhr = new XMLHttpRequest();
	  if (xhr.upload) {
		// File Drop
		fileDrag.addEventListener('dragover', fileDragHover, false);
		fileDrag.addEventListener('dragleave', fileDragHover, false);
		fileDrag.addEventListener('drop', fileSelectHandler, false);
	  }
	}
  
	function fileDragHover(e) {
	  var fileDrag = document.getElementById('file-drag');
  
	  e.stopPropagation();
	  e.preventDefault();
  
	  fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
	}
  
	function fileSelectHandler(e) {
	  // Fetch FileList object
	  var files = e.target.files || e.dataTransfer.files;
  
	  // Cancel event and hover styling
	  fileDragHover(e);
  
	  // Process all File objects
	  for (var i = 0, f; f = files[i]; i++) {
		parseFile(f);
		uploadFile(f);
	  }
	}
  
	// Output
	function output(msg) {
	  // Response
	  var m = document.getElementById('messages');
	  m.innerHTML = msg;
	}
  
	function parseFile(file) {
  
	  console.log(file.name);
	  output(
		'<strong>' + encodeURI(file.name) + '</strong>'
	  );
	  
	  // var fileType = file.type;
	  // console.log(fileType);
	  var imageName = file.name;
  
	  var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
	  if (isGood) {
		document.getElementById('start').classList.add("hidden");
		document.getElementById('response').classList.remove("hidden");
		document.getElementById('notimage').classList.add("hidden");
		// Thumbnail Preview
		document.getElementById('file-image').classList.remove("hidden");
		document.getElementById('file-image').src = URL.createObjectURL(file);
	  }
	  else {
		document.getElementById('file-image').classList.add("hidden");
		document.getElementById('notimage').classList.remove("hidden");
		document.getElementById('start').classList.remove("hidden");
		document.getElementById('response').classList.add("hidden");
		document.getElementById("file-upload-form").reset();
	  }
	}
  
	function setProgressMaxValue(e) {
	  var pBar = document.getElementById('file-progress');
  
	  if (e.lengthComputable) {
		pBar.max = e.total;
	  }
	}
  
	function updateFileProgress(e) {
	  var pBar = document.getElementById('file-progress');
  
	  if (e.lengthComputable) {
		pBar.value = e.loaded;
	  }
	}
  
	function uploadFile(file) {
  
	  var xhr = new XMLHttpRequest(),
		fileInput = document.getElementById('class-roster-file'),
		pBar = document.getElementById('file-progress'),
		fileSizeLimit = 1024; // In MB
	  if (xhr.upload) {
		// Check if file is less than x MB
		if (file.size <= fileSizeLimit * 1024 * 1024) {
		  // Progress bar
		  pBar.style.display = 'inline';
		  xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
		  xhr.upload.addEventListener('progress', updateFileProgress, false);
  
		  // File received / failed
		  xhr.onreadystatechange = function(e) {
			if (xhr.readyState == 4) {
			  // Everything is good!
  
			  // progress.className = (xhr.status == 200 ? "success" : "failure");
			  // document.location.reload(true);
			}
		  };
  
		  // Start upload
		  xhr.open('POST', document.getElementById('file-upload-form').action, true);
		  xhr.setRequestHeader('X-File-Name', file.name);
		  xhr.setRequestHeader('X-File-Size', file.size);
		  xhr.setRequestHeader('Content-Type', 'multipart/form-data');
		  xhr.send(file);
		} else {
		  output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
		}
	  }
	}
  
	// Check for the various File API support.
	if (window.File && window.FileList && window.FileReader) {
	  Init();
	} else {
	  document.getElementById('file-drag').style.display = 'none';
	}
  }
  ekUpload();

//   Gallery

(function() {
	var multiPhotoDisplay;
  
	$('#photos').on('change', function(e) {
	  return multiPhotoDisplay(this);
	});
  
	this.readURL = function(input) {
	  var reader;
	  if (input.files && input.files[0]) {
		reader = new FileReader();
		reader.onload = function(e) {
		  var $preview;
		  $('.image_to_upload').attr('src', e.target.result);
		  $preview = $('.preview');
		  if ($preview.hasClass('hide')) {
			return $preview.toggleClass('hide');
		  }
		};
		return reader.readAsDataURL(input.files[0]);
	  }
	};
  
	multiPhotoDisplay = function(input) {
	  var file, i, len, reader, ref;
	  if (input.files && input.files[0]) {
		ref = input.files;
		for (i = 0, len = ref.length; i < len; i++) {
		  file = ref[i];
		  reader = new FileReader();
		  reader.onload = function(e) {
			var image_html;
			image_html = "<li><a class=\"th\" href=\"" + e.target.result + "\"><img width=\"75\" src=\"" + e.target.result + "\"></a></li>";
			$('#photos_clearing').append(image_html);
			if ($('.pics-label.hide').length !== 0) {
			  $('.pics-label').toggle('hide').removeClass('hide');
			}
			return $(document).foundation('reflow');
		  };
		  reader.readAsDataURL(file);
		}
		window.post_files = input.files;
		if (window.post_files !== void 0) {
		  return input.files = $.merge(window.post_files, input.files);
		}
	  }
	};
  
  }).call(this);


 </script>