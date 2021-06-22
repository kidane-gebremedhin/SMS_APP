<script type="text/javascript">
var message_life_time=3000;

function monitorPriceRanges(){
  var isValid=true;
  $('.priceValue').each(function(input){

  var price=$(this).val();
  var minValue=$(this).attr('minValue');
  var maxValue=$(this).attr('maxValue');

  if(minValue!=undefined) 
    minValue=Number(minValue);
  if(maxValue!=undefined)
      maxValue=Number(maxValue);

  if(minValue!=undefined && (price<minValue)){
    isValid=false;
    alert('Too Low Price! '+price+' is less than the minimum price '+minValue);
  }
 else  if(maxValue!=undefined && (price>maxValue)){
    isValid=false;
    alert('Exagurated Price! '+price+' is more than the maximum price '+maxValue);
  }

  });
  
return isValid;
}

$(document).on('change', ".sms_roundId", function(e){
  var url=$(".searchUrl").attr('searchUrl');
  var roundId=$(this).val();

  $.ajax({
    type:'get',
    data: {is_search_request: true, roundId: roundId},
    url: url,
    success:function(data){
      $(".searchResultDiv").empty().append(data);
      $(".categoryId").val("").select2();
  // init checkbox
  $('.checkbox').bootstrapToggle();
    },
    error:function(err){
      console.log("searchResult error")
    }
  });
});

$(document).on('change', ".home_search_elem", function(e){
  var url=$(".searchUrl").attr('searchUrl');
  var productTypeId=$(".productTypeId").val();
  var locationId=$(".locationId").val();

  $.ajax({
    type:'get',
    data: {is_search_request: true, productTypeId: productTypeId, locationId: locationId},
    url: url,
    success:function(data){
      $(".searchResultDiv").empty().append(data);
    },
    error:function(err){
      console.log("searchResult error")
    }
  });
});

$(document).on('change', ".roundId", function(e){
  var url=$(this).attr('url');
  var roundId=$(".roundId").val();

if(!roundId){
  $(".ajaxContentDiv").empty();
  return;
}
   
     $.ajax({
          type: 'get',
	  data: {is_search_result: true, roundId: roundId},
          url: url,
          success: function(data){
                $(".ajaxContentDiv").empty().append(data);
          },
          error: function(err){

            console.log('ajaxContentDiv error occured');
        showErrorMessage("unable to change round! Check your connection and try again.");
      }
    });
  });

$(document).on("input", ".messageTextArea", function(e){
e.preventDefault();

  var content=$(this).val();
$(".characterCountLb").text(content.length);

return;

    if(content.length > 160){
      $(".errorMessageLb").text(content.length+" is too long. Max text length is 160 characters, Please consider sending it in chunks");
     $(this).css('border', '5px solid red');
	//$(".sendSmsBtn").attr("disabled", "true");
    }else{
     $(this).css('border', '1px solid green');
      $(".errorMessageLb").text("");
	$(".sendSmsBtn").removeAttr("disabled");
    }
});

$(document).on("change", ".sendToAllCategories", function(e){
  var isChecked=$(this).is(":checked");
    if(isChecked){
      $(".categoryId").attr("disabled", "true");
      $(".categoryId").val("").select2();
      $(".categoryId").removeAttr("required");
      $(".phoneNumber").removeAttr("required");
      $(".phoneNumberDiv").css("display", "none");
    }else{
      $(".categoryId").removeAttr("disabled");
      $(".categoryId").attr("required", "true");
      $(".phoneNumber").attr("required", "true");
      $(".phoneNumberDiv").css("display", "block");
    }
});

$(document).on('change', '.adminLevel', function(e){
  var brkiName=$('.adminLevel').val();
   if(brkiName=='Regional Admin'){
    $('.region').removeAttr('disabled');
    $('.region').attr('required', 'true');
    
    $('.zone').html($('.zone').html().replace('selected', ''));
    $('.zone').removeAttr('required');
    $('.zone').attr('disabled', 'disabled');

  }
  else if(brkiName=='Zone Admin'){
    $('.region').removeAttr('disabled');
    $('.region').attr('required', 'true');
    
    $('.wereda').html($('.wereda').html().replace('selected', ''));
    $('.wereda').removeAttr('required');
    $('.wereda').attr('disabled', 'disabled');
  }
  else if(brkiName=='Wereda Admin'){
    $('.region').removeAttr('disabled');
    $('.region').attr('required', 'true');
    
    $('.school').removeAttr('required');
    $('.school').attr('disabled', 'disabled');
  }
  else if(brkiName=='School Admin'){
    $('.region').removeAttr('disabled');
    $('.region').attr('required', 'true');
  }
  else{
    $('.region').removeAttr('disabled');
    $('.region').attr('required', 'true');
  }
});

$(document).on('input', ".menuSearchField", function(e){
  var key=$(this).val();
  if(key!='')
    key='/'+key;
  var url="{{route('search_menus')}}"+key;
        $.ajax({
          type: 'get',
          url: url,
          success: function(data){
                $(".menuArea").empty().append(data);
          },
          error: function(err){

            console.log('menu search error occured');
        showErrorMessage("unable to search menu! Check your connection and try again.");
      }
    });
  });


$(document).on("change", ".requestTypeId", function(e){
  var requestType=$('.requestTypeId option:selected').text();
    if(requestType=='Teacher'){
      $(".regularJobIdDiv").css("display", "none");
      $(".graduatedSubjectIdDiv").css("display", "block");
      $(".teachingSubjectIdDiv").css("display", "block");

      $(".regularJobId").removeAttr("required");
      $(".graduatedSubjectId").attr("required", "true");
      $(".teachingSubjectId").attr("required", "true");
    }else{
      $(".regularJobIdDiv").css("display", "block");
      $(".graduatedSubjectIdDiv").css("display", "none");
      $(".teachingSubjectIdDiv").css("display", "none");

      $(".regularJobId").attr("required", "true");
      $(".graduatedSubjectId").removeAttr("required");
      $(".teachingSubjectId").removeAttr("required");
    }
});

$(document).on("change", ".isDisabled", function(e){
  var isDisabled=$(this).is(":checked");
    if(isDisabled){
      $(".isDisabledDiv").css("display", "block");
    }else{
      $(".isDisabledDiv").css("display", "none");
    }
});
$(document).on("change", ".hasHealthIssue", function(e){
  var hasHealthIssue=$(this).is(":checked");
    if(hasHealthIssue){
      $(".hasHealthIssueDiv").css("display", "block");
    }else{
      $(".hasHealthIssueDiv").css("display", "none");
    }
});
$(document).on("change", ".isAppointed", function(e){
  var isAppointed=$(this).is(":checked");
    if(isAppointed){
      $(".isAppointedDiv").css("display", "block");
    }else{
      $(".isAppointedDiv").css("display", "none");
    }
});
$(document).on("change", ".maritalStatus", function(e){
  var isMarried=$(this).is(":checked");
    if(isMarried){
      $(".maritalStatusDiv").css("display", "block");
    
      $(".merriagePartnerId").attr("required", "true");
      $(".merriagePartnerWeredaId").attr("required", "true");
      $(".merriagePartnerSchoolId").attr("required", "true");

    }else{
      $(".maritalStatusDiv").css("display", "none");
      $(".merriagePartnerId").removeAttr("required");
      $(".merriagePartnerWeredaId").removeAttr("required");
      $(".merriagePartnerSchoolId").removeAttr("required");
    }
});


$(document).on("click", ".showSummerySearchBtn", function(e){
  e.preventDefault();
      $(".summerySearchBtn").css("display", "none");
      $(".summerySearchDiv").css("display", "block");
      $(".closeSummerySearchBtn").css("display", "block");
});
$(document).on("click", ".closeSummerySearchBtn", function(e){
  e.preventDefault();
      $(".summerySearchDiv").css("display", "none");
      $(".closeSummerySearchBtn").css("display", "none");
      $(".summerySearchBtn").css("display", "block");
});

$(document).on("change", ".showPassword", function(e){
  e.preventDefault();
  if($(this).is(":checked")){
    $(".passwordField").prop("type", "text");
  }  else{
    $(".passwordField").prop("type", "password");
  }
});

$(document).on('click', '.imageView', function(e){
    $('.imageViewFullScreen').css('display', 'block');
})
$(document).on('click', '.imageViewFullScreen', function(e){
      $('.imageViewFullScreen').css('display', 'none');
  })

$(document).on('click', '.pdfFullScreenBtn', function(e){
    $('.pdfViewFullScreen').css('display', 'block');
})
$(document).on('click', '.pdfExitFullScreenBtn', function(e){
      $('.pdfViewFullScreen').css('display', 'none');
  })

document.oncontextmenu=function(){
  //alert("right click captured")
}

$(document).ready(function(){
  $(".dynamicAttributes").select2({
    allowClear: true,
    minimumResultsForSearch:- 1,
    
  })
})

$(document).on('click', '.messageRow', function(e){
  messageId=$(this).attr('messageId');
  isVisible=$('.'+messageId+'_detailArea').attr('isVisible')
  visibility=isVisible=='true'? 'none': 'block';
  isVisible=isVisible=='true'? 'false': 'true';

  $('.detailArea').css('display', 'none')
  $('.'+messageId+'_detailArea').css('display', visibility);
  $('.'+messageId+'_detailArea').attr('isVisible', isVisible);
})

$(document).on('input', '.signup_elem', function(e){
  $('.'+$(this).attr("name")+'Err').text('');
})

$(document).on('submit', ".sign_up_post ", function(e){
  if($('.email').val()==''){
        $('.errorSpan').text('')
        $(".emailErr").text("Email is required.");
        e.preventDefault();
        return;
      }
  if($('.firstName').val()==''){
        $('.errorSpan').text('')
        $(".firstNameErr").text("First Name is required.");
        e.preventDefault();
      return;
      }
  if($('.lastName').val()==''){
        $('.errorSpan').text('')
        $(".lastNameErr").text("Last Name is required.");
        e.preventDefault();
      return;
      }
  if($('.middleName').val()==''){
        $('.errorSpan').text('')
        $(".middleNameErr").text("Middle Name is required.");
        e.preventDefault();
      return;
      }
  if($('.phoneNumber_signup').val()==''){
        $('.errorSpan').text('')
        $(".phoneNumberErr").text("Phone Number is required.");
        e.preventDefault();
      return;
      }

  if($('.password').val()==''){
        $('.errorSpan').text('')
        $(".passwordErr").text("Password is required.");
        e.preventDefault();
      return;
      }
  if($('.password').val()!=$('.confirmPassword').val()){
        $('.errorSpan').text('')
        $(".confirmPassword").attr("autofocus", 'autofocus');
        $(".confirmPasswordErr").text("Passwords not match.");
        e.preventDefault();
        return;
      }



  if(!isValid_PhoneNumber_signup()){
    e.preventDefault();
    $(".phoneNumberErr").text("Phone number must be 9 - 10 digits long.");
    return;
  }
});

setTimeout(function(){
  $('.sessionMessageArea').css('display', 'none');
}, message_life_time);

$(document).on('change', '.authorId', function(e){
  $obj=$('.author_elem');
  if($(this).val()=='')
    $obj.removeAttr('disabled');
  else
    $obj.attr('disabled', 'disabled');
})
$(document).on('change', '.publisherId', function(e){
  $obj=$('.publisher_elem');
  if($(this).val()=='')
    $obj.removeAttr('disabled');
  else
    $obj.attr('disabled', 'disabled');
})


function abortAjaxRequest(){
  if(xhr==null || xhr==undefined)
    return;
 xhr.abort();
 console.log("ajax request aborted successfully!");
}

$(document).on('click', '.generateReportByDateIntervalBtn', function(e){
  e.preventDefault();
  $parentDiv = $(this).closest(".generateReportByDateIntervalDiv");
  var searchUrl = $parentDiv.attr('searchUrl');
  var nextUrl = $parentDiv.attr('nextUrl');
  var startDate = $parentDiv.find('.startDate').val();
  var endDate = $parentDiv.find('.endDate').val();
  var category = $parentDiv.find('.category').val();
if(startDate==undefined && endDate==undefined)
  return;
  $.ajax({
    type:'get',
    url:searchUrl,
    data: {nextUrl: nextUrl, startDate: startDate, endDate: endDate, category: category},
    success:function(data){
      console.log("success")
      //$(".ajaxContent").empty().append(data);
      $("#container").empty().append(data);
      $(".eth_date").calendarsPicker({calendar: $.calendars.instance('ethiopian')});
    },
    error:function(err){
      console.log("error")
    }
  })
});

/*--LIVE COUNTERS--*/
setInterval(function(){
$.ajax({
  type:'get',
  url: "{{url('getLiveCount')}}",
  success: function(data){
	return;
    $(".total_users").text(data.total_users);
    $(".unapproved_users_and_documents").text(data.unapproved_users_and_documents);
    $(".total_documents").text(data.total_documents);
    $(".video_documents").text(data.video_documents);
    $(".audio_documents").text(data.audio_documents);
    $(".image_documents").text(data.image_documents);
    $(".news_paper_documents").text(data.news_paper_documents);
    $(".magazine_documents").text(data.magazine_documents);
    $(".book_documents").text(data.book_documents);
    $(".text_document_documents").text(data.text_document_documents);
    
    var unviewed_shared_document_editions=data.unviewed_shared_document_editions;
    var unviwedInboxMessages=data.unviwedInboxMessages;
    $(".unviwedSharedDocuments-menu").empty();
    $(".unviwedInboxMessages-menu").empty();

    for(var i=0; i<unviewed_shared_document_editions.length; i++){
      $document=unviewed_shared_document_editions[i].document;
      $sharedByUser=unviewed_shared_document_editions[i].shared_by_user;
    $(".unviwedSharedDocuments-menu").append('<li><a class="get" href="{{url("make_shared_documents_viewed")}}/'+unviewed_shared_document_editions[i].id+'"><i class="fa fa-folder"> </i>'+($document!=undefined? $document.title: '')+'<p><small style="color: orange"> &nbsp; &nbsp; &nbsp; &nbsp; '+($sharedByUser!=undefined? $sharedByUser.email: '')+'</small></p></a></li>');
      }
    for(var i=0; i<unviwedInboxMessages.length; i++){
    $(".unviwedInboxMessages-menu").append('<li><a class="get" href="{{url("messages-show_inbox")}}/'+unviwedInboxMessages[i].id+'"><i class="fa fa-envelope-o text-aqua"> </i> '+unviwedInboxMessages[i].subject+'</a></li>');
      }

    $(".unviwedInboxMessages_inner").text(unviwedInboxMessages.length);
    $(".unviwedSharedDocuments_inner").text(unviewed_shared_document_editions.length);

    if(unviewed_shared_document_editions.length>0){
        $(".unviwedSharedDocuments").text(unviewed_shared_document_editions.length);
    }else{
        $(".unviwedSharedDocuments").empty();
    }
    if(unviwedInboxMessages.length>0){
        $(".unviwedInboxMessages").text(unviwedInboxMessages.length);
    }else{
        $(".unviwedInboxMessages").empty();
    }
  
},
  error: function(err){
    $(".total_users").text(0);
    $(".unapproved_users_and_documents").text(0);
    $(".total_documents").text(0);
    $(".video_documents").text(0);
    $(".audio_documents").text(0);
    $(".image_documents").text(0);
    $(".news_paper_documents").text(0);
    $(".magazine_documents").text(0);
    $(".book_documents").text(0);
    $(".text_document_documents").text(0);
    $(".unviwedInboxMessages").text(0);
  }
});
}, 2000);
/*--END OF COUNTERS--*/

$(document).ready(function(){
$(document).on('change', '.document_search_select_elem', function(e){
        searchAction(e);
})
$(document).on('input', '.document_search_input_elem', function(e){
        searchAction(e);
})
$(document).on('input', '.playlist_search_input_elem', function(e){
        searchAction(e);
})
$(document).on('input', '.summery', function(e){
          searchAction(e);
})

});

function searchAction(e){
      e.preventDefault();
  var businessCategoryId = $(".businessCategoryId").val();
  var startDate = $(".startDate").val();
  var endDate = $(".endDate").val();
  var countryId = $(".countryId").val();
  var regionId = $(".regionId").val();
  var zoneId = $(".zoneId").val();
  var weredaId = $(".weredaId").val();
  var summery = $(".summery").val();

  var url=$("#searchUrl").val();
  $.ajax({
    type:'get',
    data: {is_search_request: true, businessCategoryId: businessCategoryId, startDate: startDate, endDate: endDate, countryId: countryId, regionId: regionId, zoneId: zoneId, weredaId: weredaId, summery: summery},
    url: url,
    success:function(data){

      $(".searchResultDiv").empty().append(data);
    },
    error:function(err){
      console.log("searchResult error")
    }
  })
}

$(document).on('change', '.crime_typeId_search', function(e){
  e.preventDefault();
$( ".crime_type_searchForm" ).submit();
})

/*---Tab--------*/
function activateTab(tab){
  // init checkbox
  $('.checkbox').bootstrapToggle();

  if(tab==undefined)
    tab="first_tab";
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
}
$(document).ready(function(){
    activateTab('first_tab');
});

$(document).on('click', '.tap_element', function(e){
  var id=$(this).attr('href');
  id=id.substr(1);
  activateTab(id);
})

/*--End of Tab---*/

$(document).on('change', '.healthStatusId', function(e){
  $parentDiv=$(this).closest('.only_forHealthStatus');
  var healthStatus=$parentDiv.find('.healthStatusId option:selected').text();
  if(healthStatus=='ኣካል ጉድእ'){
    $parentDiv.find('.disabilityDiv').css('display', 'block');
    $parentDiv.find('.disabilityTypeIds').attr('required', 'true');
    //initializeSelect2();
  }
  else{
    $parentDiv.find('.disabilityTypeIds').html($('.disabilityTypeIds').html().replace('selected', ''));
    $parentDiv.find('.disabilityDiv').css('display', 'none');
    $parentDiv.find('.disabilityTypeIds').removeAttr('required');
  }
})

/*-------Back functionality*/
$(document).ready(function($) {
  if (window.history.pushState) {
   // window.history.pushState('forward', null, './#forward');
    $(window).on('popstate', function() {
      location.reload();
    });
  }
});

window.onpopstate = function() {
     var referrer =  document.referrer;
     //console.log(referrer+" referrer")
   //activateFullUrl(referrer);
     // location.reload();
history.pushState({}, referrer);
}; 
/*-------end of back------*/

//not a replaceAt
function setCharAt(str,index,chr) {
    if(index > str.length-1) return str;
    return str.substr(0,index) + chr + str.substr(index+1);
}
function set_optionaFields(){
 $('.optionalField').removeAttr('required');
}
$(document).on('change', '.isAccuserALawOfficer_checkBox', function(e){
    var checked=$(this).is(":checked");
  if(checked){
  $(this).val('true');
  var row=$(this).closest('.accusers_oneRow');
  row.find('.canBeOptional').removeAttr('required');
  //row.find('.canBeOptional').val(1);
  row.find('.canBeOptional').attr('disabled', 'disabled');
  }
  else{
    $(this).val('false');
  var row=$(this).closest('.accusers_oneRow');
  row.find('.canBeOptional').attr('required', 'true');
  //row.find('.canBeOptional').val('');
  row.find('.canBeOptional').removeAttr('disabled');
  }
});

$(document).on('click', '.printBtn', function(e){
  e.preventDefault();
  var printArea=$(this).attr('printArea');
  var title=$(this).attr('title');
  var footer=$(this).attr('footer');
  footer=footer!=undefined? footer: "E-EDMS";
  $(printArea).printThis({
     beforePrint: function(){ },
    importCSS: false,
    importStyle: false,
    //loadCSS: "build/css/kg_custom.min.css",
    pageTitle:title, 
    header: "<h1>"+title+"</h1>",
    //footer: '<center>'+footer+'</center>',
  });
})
function all_fieldsInClassAreEmpty(className){
  var elementsWithClass=document.getElementsByClassName(className);
  for(var i=0; i<elementsWithClass.length; i++){
      if(elementsWithClass[i].type=='checkbox')
        continue;//skip checkbox value
      if(elementsWithClass[i].value!=""){
        return false;
      }
    }
  return true;
}

function init($elem) {
    $elem.select2({
        width: 'resolve'
    });   
}

/*------dayanu -------*/
$(document).on("click", '.dayanu_addRowsBtn', function(e){
  e.preventDefault();
  
  $parentModal=$(this).closest('.modal');
  
  var numberOfRowsTobeAdded=$parentModal.find(".dayanu_numberOfRowsTobeAdded").val();
  var numberOfFields=$parentModal.find(".dayanu_numberOfRows").attr('dayanu_numberOfFields');
  numberOfFields=numberOfFields==undefined|| numberOfFields==''? 1: numberOfFields;
  for(var i=0; i<numberOfRowsTobeAdded; i++){
     $('select').removeClass('select2')
/*---Appended Select2 Initializer---*/
  init($('select'))
  $('select').select2("destroy");

  $parentModal.find('.dayanu_rowsContainer').append($('.dayanu_oneRowData').html())
  
  init($('select'))
  }
   elementClasses=$parentModal.find(".dayanu_rowElement").prop("classList");
  rowDivs=$parentModal.find('.dayanu_oneRow');
  $parentModal.find(".dayanu_numberOfRows").val(rowDivs.length)
  elementsWithClass=$parentModal.find('.dayanu_rowElement');
  var lastRow=1;
  for(var i=0; i<elementsWithClass.length;i++){
    var postFix=parseInt(i/numberOfFields)+1;/*as there are numberOfFields row elements*/
    var name=$(elementsWithClass[i]).attr('name');
    $(elementsWithClass[i]).attr('name', name.substr(0, name.length-1)+postFix)
    $(elementsWithClass[i]).removeClass("dayanu_row_1").removeClass("dayanu_row_"+(postFix-1)).addClass("dayanu_row_"+postFix);
      $parentModal.find(".dayanu_row_"+postFix).removeAttr('required');
      lastRow=".dayanu_row_"+(postFix-1);
   }   
});

$(document).on("input change", ".dayanu_rowElement", function(){
  
  $parentModal=$(this).closest('.modal');
  if($(event.target).is(":checkbox")){
  console.log("checkbox was clicked");
    return;
  }

  var numberOfFields=$parentModal.find(".dayanu_numberOfRows").attr('dayanu_numberOfFields');
  numberOfFields=numberOfFields==undefined|| numberOfFields==''? 1: numberOfFields;
   elementClasses=$parentModal.find(".dayanu_rowElement").prop("classList");
  rowDivs=$parentModal.find('.dayanu_oneRow');
  elementsWithClass=$parentModal.find('.dayanu_rowElement');
  for(var i=0; i<elementsWithClass.length;i++){
    var postFix=parseInt(i/numberOfFields)+1;/*as there are numberOfFields row elements*/
     if(!all_fieldsInClassAreEmpty("dayanu_row_"+postFix)){
        $parentModal.find(".dayanu_row_"+postFix).attr('required', 'true'); 
       // show(".dayanu_row_"+postFix+'-added')
     }
      else{
      $parentModal.find(".dayanu_row_"+postFix).removeAttr('required');
        //show(".dayanu_row_"+postFix+'-removed')
    }
   }
  set_optionaFields();
});

/*------Endof dayanu -------*/

/*------punishmentType -------*/
$(document).on("click", '.punishmentType_addRowsBtn', function(e){
  e.preventDefault();
  
  $parentModal=$(this).closest('.modal');
    
  var numberOfRowsTobeAdded=$(this).closest('.modal').find(".punishmentType_numberOfRowsTobeAdded").val();
  var numberOfFields=$parentModal.find(".punishmentType_numberOfRows").attr('punishmentType_numberOfFields');
  numberOfFields=numberOfFields==undefined|| numberOfFields==''? 1: numberOfFields;
  for(var i=0; i<numberOfRowsTobeAdded; i++){
     $('select').removeClass('select2')
/*---Appended Select2 Initializer---*/
  init($('select'))
  $('select').select2("destroy");

  $parentModal.find('.punishmentType_rowsContainer').append($('.punishmentType_oneRowData').html())
  init($('select'))
  }
   elementClasses=$parentModal.find(".punishmentType_rowElement").prop("classList");
  rowDivs=$parentModal.find('.punishmentType_oneRow');
  $parentModal.find(".punishmentType_numberOfRows").val(rowDivs.length)
  elementsWithClass=$parentModal.find('.punishmentType_rowElement');
  var lastRow=1;
for(var i=0; i<elementsWithClass.length;i++){
    var postFix=parseInt(i/numberOfFields)+1;/*as there are numberOfFields row elements*/
    var name=$(elementsWithClass[i]).attr('name');
    $(elementsWithClass[i]).attr('name', name.substr(0, name.length-1)+postFix)
    $(elementsWithClass[i]).removeClass("punishmentType_row_1").removeClass("punishmentType_row_"+(postFix-1)).addClass("punishmentType_row_"+postFix);
      $parentModal.find(".punishmentType_row_"+postFix).removeAttr('required');
      lastRow=".punishmentType_row_"+(postFix-1);
   }   
});

$(document).on("input change", ".punishmentType_rowElement", function(){
  $parentModal=$(this).closest('.modal');
  
  if($(event.target).is(":checkbox")){
  console.log("checkbox was clicked");
    return;
  }

  var numberOfFields=$parentModal.find(".punishmentType_numberOfRows").attr('punishmentType_numberOfFields');
  numberOfFields=numberOfFields==undefined|| numberOfFields==''? 1: numberOfFields;
   elementClasses=$parentModal.find(".punishmentType_rowElement").prop("classList");
  rowDivs=$parentModal.find('.punishmentType_oneRow');
  elementsWithClass=$parentModal.find('.punishmentType_rowElement');
  for(var i=0; i<elementsWithClass.length;i++){
    var postFix=parseInt(i/numberOfFields)+1;/*as there are numberOfFields row elements*/
     if(!all_fieldsInClassAreEmpty("punishmentType_row_"+postFix)){
        $parentModal.find(".punishmentType_row_"+postFix).attr('required', 'true'); 
       // show(".punishmentType_row_"+postFix+'-added')
     }
      else{
      $parentModal.find(".punishmentType_row_"+postFix).removeAttr('required');
        //show(".punishmentType_row_"+postFix+'-removed')
    }
   }
  set_optionaFields();
});

/*------Endof punishmentType -------*/

/*------Accusers -------*/
$(document).on("click", '.accusers_addRowsBtn', function(e){
  e.preventDefault();
  var numberOfRowsTobeAdded=$(".accusers_numberOfRowsTobeAdded").val();
  var numberOfFields=$(".accusers_numberOfRows").attr('accusers_numberOfFields');
  numberOfFields=numberOfFields==undefined|| numberOfFields==''? 1: numberOfFields;
  for(var i=0; i<numberOfRowsTobeAdded; i++){
     $('select').removeClass('select2')
/*---Appended Select2 Initializer---*/
  init($('select'))
  $('select').select2("destroy");

  $('.accusers_rowsContainer').append($('.accusers_oneRowData').html())
  
  init($('select'))
  }
   elementClasses=$(".accusers_rowElement").prop("classList");
  rowDivs=$('.accusers_oneRow');
  $(".accusers_numberOfRows").val(rowDivs.length)
  elementsWithClass=$('.accusers_rowElement');
  var lastRow=1;
  for(var i=0; i<elementsWithClass.length;i++){
    var postFix=parseInt(i/numberOfFields)+1;/*as there are numberOfFields row elements*/
    var name=$(elementsWithClass[i]).attr('name');
    //Only for Defendants
    $(elementsWithClass[i]).attr('name', name.indexOf('[]')==-1? name.substr(0, name.length-1)+postFix: name.substr(0, name.length-3)+postFix+'[]');
    //console.log($(elementsWithClass[i]).attr('name'));
    $(elementsWithClass[i]).removeClass("accusers_row_1").removeClass("accusers_row_"+(postFix-1)).addClass("accusers_row_"+postFix);
    /*var name=$(elementsWithClass[i]).attr('name');
    $(elementsWithClass[i]).attr('name', name.substr(0, name.length-1)+postFix)
    $(elementsWithClass[i]).removeClass("accusers_row_1").removeClass("accusers_row_"+(postFix-1)).addClass("accusers_row_"+postFix);*/
      $(".accusers_row_"+postFix).removeAttr('required');
      lastRow=".accusers_row_"+(postFix-1);
   $(lastRow).filter('.birth_date').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
   }   
});

$(document).on("input change", ".accusers_rowElement", function(){
  if($(event.target).is(":checkbox")){
  console.log("checkbox was clicked");
    return;
  }
  var checked=$(this).closest('.accusers_oneRow').find('.isAccuserALawOfficer_checkBox').is(":checked");
  if(checked)//no need for detail info
    return;
  var numberOfFields=$(".accusers_numberOfRows").attr('accusers_numberOfFields');
  numberOfFields=numberOfFields==undefined|| numberOfFields==''? 1: numberOfFields;
   elementClasses=$(".accusers_rowElement").prop("classList");
  rowDivs=$('.accusers_oneRow');
  elementsWithClass=$('.accusers_rowElement');
  for(var i=0; i<elementsWithClass.length;i++){
    var postFix=parseInt(i/numberOfFields)+1;/*as there are numberOfFields row elements*/
     if(!all_fieldsInClassAreEmpty("accusers_row_"+postFix)){
        $(".accusers_row_"+postFix).attr('required', 'true'); 
       // show(".accusers_row_"+postFix+'-added')
     }
      else{
      $(".accusers_row_"+postFix).removeAttr('required');
        //show(".accusers_row_"+postFix+'-removed')
    }
   }
  set_optionaFields();
});

/*------Endof Accusers -------*/

/*------Defendants -------*/
$(document).on("click", '.defendants_addRowsBtn', function(e){
  e.preventDefault();
  var numberOfRowsTobeAdded=$(".defendants_numberOfRowsTobeAdded").val();
  var numberOfFields=$(".defendants_numberOfRows").attr('defendants_numberOfFields');
  numberOfFields=numberOfFields==undefined|| numberOfFields==''? 1: numberOfFields;
  for(var i=0; i<numberOfRowsTobeAdded; i++){
     $('select').removeClass('select2')
/*---Appended Select2 Initializer---*/
  init($('select'))
  $('select').select2("destroy");

  $('.defendants_rowsContainer').append($('.defendants_oneRowData').html())
  init($('select'))
  }
   elementClasses=$(".defendants_rowElement").prop("classList");
  rowDivs=$('.defendants_oneRow');
  $(".defendants_numberOfRows").val(rowDivs.length)
  elementsWithClass=$('.defendants_rowElement');
  var lastRow=1;
  for(var i=0; i<elementsWithClass.length;i++){
    var postFix=parseInt(i/numberOfFields)+1;/*as there are numberOfFields row elements*/
    var name=$(elementsWithClass[i]).attr('name');
    //Only for Defendants
    $(elementsWithClass[i]).attr('name', name.indexOf('[]')==-1? name.substr(0, name.length-1)+postFix: name.substr(0, name.length-3)+postFix+'[]');
    //console.log($(elementsWithClass[i]).attr('name'));
    $(elementsWithClass[i]).removeClass("defendants_row_1").removeClass("defendants_row_"+(postFix-1)).addClass("defendants_row_"+postFix);
      $(".defendants_row_"+postFix).removeAttr('required');
      lastRow=".defendants_row_"+(postFix-1);
   $(lastRow).filter('.birth_date').calendarsPicker({calendar: $.calendars.instance('ethiopian')});
   }   
});

$(document).on("input change", ".defendants_rowElement", function(){
  if($(event.target).is(":checkbox")){
  console.log("checkbox was clicked");
    return;
  }
  var numberOfFields=$(".defendants_numberOfRows").attr('defendants_numberOfFields');
  numberOfFields=numberOfFields==undefined|| numberOfFields==''? 1: numberOfFields;
   elementClasses=$(".defendants_rowElement").prop("classList");
  rowDivs=$('.defendants_oneRow');
  elementsWithClass=$('.defendants_rowElement');
  for(var i=0; i<elementsWithClass.length;i++){
    var postFix=parseInt(i/numberOfFields)+1;/*as there are numberOfFields row elements*/
     if(!all_fieldsInClassAreEmpty("defendants_row_"+postFix)){
        $(".defendants_row_"+postFix).attr('required', 'true'); 
       // show(".defendants_row_"+postFix+'-added')
     }
      else{
      $(".defendants_row_"+postFix).removeAttr('required');
        //show(".defendants_row_"+postFix+'-removed')
    }
   }
  set_optionaFields();
});

/*------Endof Defendants -------*/

/*-------------------------------------------------------------------------------------------------*/

/*--------------SECOND LEVEL MENU---------------------*/
$(document).on('click', '.nav_member', function(e){
  /*--Second level menu*/
  var classList=$(this).prop("classList");
  //console.log(active_parent_menu+'!='+classList[0])
  if(active_parent_menu!=classList[0]){
      hideSecond_level_menu();
    activateNav(this);
  }
/*----------------------*/
})
function activateNav(obj){
  $('li').removeClass('active');
  $(obj).closest('li').addClass('active');
}
var show_second_level_menu=true; 
var active_parent_menu='';

$(document).on('click', '.parent_menu', function(e){
  e.preventDefault();
  activateNav(this);
  var classList=$(this).prop("classList");
  if(classList.length<1)
    return;
  if(active_parent_menu==classList[0]){
    if(show_second_level_menu){
      showSecond_level_menu();

    }
    else{
      hideSecond_level_menu();
    }
    }
    else{
  active_parent_menu=classList[0];
      showSecond_level_menu();
    }
  active_parent_menu=classList[0];
//show_second_level_menu=!show_second_level_menu;
})

function showSecond_level_menu(){
  if(active_parent_menu=='')
  {
    return;
  }
  show_second_level_menu=false;
  $(".second_level_menu").css("display", "block");
  $(".all_second_level_menu").css("display", "none");
  $("."+active_parent_menu).css("display", "block");
}
function hideSecond_level_menu(){
  show_second_level_menu=true;
  $(".second_level_menu").css("display", "none");
}
/*--------------END OF SECOND LEVEL MENU---------------------*/


function showLang_successMessage(message){
    document.session='successMessage='+message;
return message;

return "ብትክክል ተፈፂሙ";//"<?php echo isset($_COOKIE['successMessage'])? App\Global_var::getLangString($_COOKIE['successMessage'], $language_strings): 'Error Message Not Found!' ?>";
  }

function showLang_errorMessage(message){
    document.cookie='errorMessage='+message;
return message;

return "ብትክክል ኣይተፈፀመን";//"<?php echo isset($_COOKIE['errorMessage'])? App\Global_var::getLangString($_COOKIE['errorMessage'], $language_strings): 'Error Message Not Found!' ?>";
  }

window.onload = chartInitializer;

function chartInitializer() {
  var canvas=document.getElementById('canvas');
  if(canvas==null)
    return;
    var ctx = canvas.getContext('2d');
    window.myLine = new Chart(ctx, config);
}

/**/
/*-----Tab activator----------*/
$(document).ready(function(){
    activateTab('Basic_Info');
});

$(document).on('click', '.tap_element', function(e){
  var id=$(this).attr('href');
  id=id.substr(1);
  activateTab(id)

})

$(document).on('click', '.tappedFormSubmitBtn', function () {
  var handled=false;
        
    $('select:invalid').each(function () {
        var $closest = $(this).closest('.tab-pane');
        var id = $closest.attr('id');
        $('.nav a[href="#' + id + '"]').tab('show');
        $("input").css("border", "");
        $("select").css("color", "");
        $("textarea").css("border", "");

        //$(this).select2("open");

        handled=true;
        return false;
    });
    if(handled)
      return;
    $('input:invalid').each(function () {
        var $closest = $(this).closest('.tab-pane');
        var id = $closest.attr('id');
        $('.nav a[href="#' + id + '"]').tab('show');
        $("input").css("border", "");
        $("select").css("color", "");
        $("textarea").css("border", "");
        $(this).css("border", "1px solid red");
        handled=true;
        return false;
    });
    if(handled)
      return;
    $('textarea:invalid').each(function () {
        var $closest = $(this).closest('.tab-pane');
        var id = $closest.attr('id');
        $('.nav a[href="#' + id + '"]').tab('show');
        $("input").css("border", "");
        $("select").css("color", "");
        $("textarea").css("border", "");
        $(this).css("border", "1px solid red");
        handled=true;
        return false;
    });
    if(handled)
      return;
    $('select:invalid').each(function () {
        var $closest = $(this).closest('.tab-pane');
        var id = $closest.attr('id');
        $('.nav a[href="#' + id + '"]').tab('show');
        $("input").css("border", "");
        $("select").css("color", "");
        $("textarea").css("border", "");
        $(this).css("color", "red");
        handled=true;
        return false;
    });
});


/*---------------Saving and Withdrawal-----------*/
function optionalFieldsHandler(){
  /*checkPaymentMode(); 
  checkEletAndEgbetSltena();
  initializeSelect2();
  chartInitializer();*/
  $(".optionalField").removeAttr('required');
  $('.eth_date, .eth_date_hidden').attr('autocomplete', 'off');
}

  $(document).on('change', '.categoryId', function(e){
   var categoryIds=$(this).val();
   if(categoryIds==null)
    $('.phoneNumberDiv').css('display', 'none');
   else
    $('.phoneNumberDiv').css('display', 'block');
  })

setTimeout(function(){
      optionalFieldsHandler();
      }, 0);

function checkPaymentMode(){
  var payment_mode=$(".paymentModeId option:selected").text();
    if(payment_mode=="ቼክ"){
    $(".chequeNo").css('display', 'block')
     $(".chequeNo").attr('required', 'true'); 
    } 
    else{
    $(".chequeNo").removeAttr('required');
    $(".chequeNo").css('display', 'none')
    }
}


/*----------Enf of saving nd withdrawal----------------------*/
 
 /*--kunetat sltena---*/
  $(document).on('change', '.hasTrained', function(e){
    optionalFieldsHandler();    
  })

  function checkEletAndEgbetSltena(){
  var savingCategory=$(".hasTrained option:selected").text();
    if(savingCategory=="ወሲዱ"){
    $(".eletAndEgbetSltena").css('display', 'block')
     $(".trainingDate").attr('required', 'true'); 
     $(".satisfactionLevel").attr('required', 'true'); 
    } 
    else{
    $(".trainingDate").removeAttr('required');
    $(".satisfactionLevel").removeAttr('required');
    $(".eletAndEgbetSltena").css('display', 'none')
    }
}

/*-------------------*/



  $(document).on('change', '.paymentModeId', function(e){
    var payment_mode=$(".paymentModeId option:selected").text();
    if(payment_mode=="ቼክ")
    $(".chequeNo").css('display', 'block')
    else
    $(".chequeNo").css('display', 'none')

  });

$(document).on("click", ".backupFile", function(e){
  $.ajax({
    type:'get',
    url:"{{url('extractBackupFiles')}}",
    success:function(data){
      console.log("backup files extraction successful!");
    },
    error:function(err){
      console.log("backup files extraction failed");
    }
  })
});

$(document).on("click", ".close", function(){
 closeAllModals();
 abortAjaxRequest();
});


$(document).on('click', ".get", function(e){
if($(event.target).is(":checkbox")){
  console.log("checkbox was clicked");
    return;
  }else{
    e.preventDefault();    
  }
      showWaitingModal();
            var url=$(this).attr('href');
            nextUrl=$(this).attr('nextUrl');
            nextUrl=nextUrl!="" && nextUrl!=undefined ? nextUrl: url;
                  xhr= $.ajax({
                    type: 'get',
                    url: url,
                    success: function(data){
                    closeWaitingModal();
               if(data=='unauthorized'){
                 showErrorMessage("unauthorized Access Detected!")
                 /*redirect to login page */
                  location.reload();
                  return;
                }
                if(data=='permission_saved'){
                  showSuccessMessage('Permission Change Saved!');
                  return;
                }
                if(Array.isArray(data) && data[0]=="error"){
                  showErrorMessage(data[1]);
                  return;
                }

                activateFullUrl(nextUrl);
                $("#container").empty().append(data);
                initializeSelect2();
                activateTab('first_tab');

                optionalFieldsHandler();
                  },
                    error: function(err){
                    closeWaitingModal();

                      console.log('error occured');
        showErrorMessage("unable to complete request! Check your connection and try again.");
                    }
                  });
                });

function closeAllModals(){
    /*
    closeexecutionStatusDetailModal();
    closeakabiHgiDesisionTypeDetailModal();
    closeBetFrdiDesisionTypeDetailModal();
    closeAppealAllowedByModal();
    closeAppointmentDateModal();
    closeakabiHgiDesisionModal();
    closebetFrdiDesisionModal();
    closeWaitingModal();*/
  $('.modal').css('display', 'none');
    $('.LawyerForm_RequiredElement').removeAttr('required');
    $('.BetFrdiForm_RequiredElement').removeAttr('required');
    $('.AppealForm_RequiredElement').attr('required', 'true');


}

$(document).on('submit', ".post_", function(e){
          showWaitingModal();
});

$(document).on('submit', ".post", function(e){
  if(!monitorPriceRanges()){
    var confirmed= confirm("Are you sure to enter out-of-range prices?");
      if (confirmed!= true) {
          e.preventDefault();
        return;
      } else {
        //alert('Confirmed and Continued')
      }
    }

  if(!isValid_PhoneNumber()){
    e.preventDefault();
    showErrorMessage("Phone number must be 9 - 10 digits long.");
    return;
  }
          showWaitingModal();
             var url=$(this).attr('action');
            nextUrl=$(".nextUrl").attr('nextUrl');
/*  var form=$(".post")[0];
    var data=new FormData(form);*/
  //To be Tried???
  var form=$(this).closest(".post")[0];
  var data=new FormData(form);

    e.preventDefault();
                  xhr= $.ajax({
                    type: 'post',
                    url: url,
                    data: data,
                    enctype: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function(data){
                closeAllModals();
                if(data=='unauthorized'){
                  showErrorMessage("unauthorized Access Detected!")
                 /*redirect to login page */
                  location.reload();
                  return;
                }
                if(Array.isArray(data) && data[0]=="error"){
                  showErrorMessage(showLang_errorMessage(data[1]));//showErrorMessage(data[1]);
                  return;
                }
                if(Array.isArray(data) && data[0]=="success"){
                  showSuccessMessage(showLang_successMessage(data[1]));//showSuccessMessage(data[1]);
                  $("form").reset();
                  return;
                }
                activateFullUrl(nextUrl);
                $("#container").empty().append(data);
                activateTab('first_tab');

                showSuccessMessage(showLang_successMessage("Operation_Successful"));
                initializeSelect2();
                //for ksi mezgebat only
                var session_nextUrl=$('.session_nextUrl').attr('session_nextUrl');
                var session_prevUrl=$('.session_prevUrl').attr('session_prevUrl');
                //alert(session_prevUrl);
                  if(session_nextUrl!=undefined && session_nextUrl!=''){
                      console.log(session_nextUrl)
                      activateFullUrl(session_nextUrl);
                  }
                  },
                    error: function(err){
                      console.log('error occured');
        showErrorMessage("Unable to complete request! Check your connection and try again.");
        closeWaitingModal();
                    }
                  });
                });

/*---users-create --form validator----*/
$(document).on("submit", ".validatePasswordMatch", function(e){
  var password=$(".password").val();
  var confirmPassword=$(".confirmPassword").val();
  if(password!=confirmPassword){
    showErrorMessage("Passwords do not match 2.");
    e.preventDefault();
  }
});
  
/*--------------------------------MESSAGES--------------------------------*/

function showSuccessMessage(message){
  hideSecond_level_menu();
  $("#message-error-displayer").css("display", "none");
  $("#message-success-displayer").css("display", "block");
  $(".messageArea").css("display", "block");
  //$("#message-success").empty().append(message);
  setTimeout(function(){
        showSecond_level_menu();
        $("#message-success").empty();
  $("#message-success-displayer").css("display", "none");
  $(".messageArea").css("display", "none");
        return;
      }, message_life_time);

  $.ajax({
    type:'get',
    url: "{{url('language_interpreter')}}/"+message,
    success: function(message){
    $("#message-success").empty().append(message);
    },
    error: function(message){
    $("#message-success").empty().append(message);
    }
  });
}
function showErrorMessage(message){
//hideSecond_level_menu();
  $("#message-success-displayer").css("display", "none");
  $("#message-error-displayer").css("display", "block");
  $(".messageArea").css("display", "block");
  $("#message-error").empty().append(message);
  setTimeout(function(){
  //     showSecond_level_menu()
  $("#message-error").empty();
  $("#message-error-displayer").css("display", "none");
  $(".messageArea").css("display", "none");
        return;
      }, message_life_time);

    $.ajax({
    type:'get',
    url: "{{url('language_interpreter')}}/"+message,
    success: function(message){
    $("#message-error").empty().append(message);
    },
    error: function(message){
      $("#message-error").empty().append(message);  
    }
  });
}
function showValidationErrorMessage(message){
  hideSecond_level_menu();
  $("#validation-error-message").empty().append(message);
  $("#validation-error-message-displayer").css("display", "block");
  $(".messageArea").css("display", "block");
  setTimeout(function(){
     showSecond_level_menu();
    $("#validation-error-message").empty();
  $("#validation-error-message-displayer").css("display", "none");
  $(".messageArea").css("display", "none");

        return;
      }, message_life_time);
}


function createSystemConfigurations(){
$.ajax({
type: 'get',
url: "{{url('system/createSystemConfigurations')}}",
success: function(configured) {
    if (configured == "true") {
        showSuccessMessage("System Configured successfully.");
        location.reload();
    }
},
error: function(err){
showErrorMessage("Warning! Some System Configurations Missed");
}
});
}


function showWaitingModal(){
 waitingModal.style.display = "block";
$('.loading-image').css("display", "block");
}
function closeWaitingModal(){
var waitingModal = document.getElementById('waitingModal');
  if(waitingModal!=null && waitingModal!=undefined)
  waitingModal.style.display = "none";
}

function existsInCollection(item, collection){
  var exists=false;
  Object.keys(collection).forEach(function(key, index) {
  if(this[key]==item)
    exists=true;
}, collection);

  return exists;
}


function initializeSelect2(){
/*Select2 ReInitialiser*/
         setTimeout(function(){
            $(".select2").select2({
                allowClear: false
            });            
        $(".eth_date").calendarsPicker({calendar: $.calendars.instance('ethiopian')});

        }, 100);

  tinymce.init({ 
    selector:'textarea.formatted',
    plugins:'link code',
    menubar:false
    });
}

function activateUrl(url){
      window.history.pushState("Url ", "push state", url);
}
function activateFullUrl(url){
      window.history.pushState("Url ", "push state", url);
}

$(document).on('change', '.regionId', function(){
var regionID = $(this).val();    
$parentDiv = $(this).closest(".col-md-12"); 

if(regionID){
    $.ajax({
       type:"GET",
       url:"{{url('region_zones')}}/"+regionID,
       success:function(res){               
        if(res){
            $(".zoneId").empty();
            $(".zoneId").append('<option value="">-- --</option>');
            $.each(res,function(key,value){
                $(".zoneId").append('<option value="'+key+'">'+value+'</option>');
            });
       
        }else{
           $(".zoneId").empty();
        }
       }
    });
}else{
    $(".zoneId").empty();
}      
});

$(document).on('change', '.zoneId', function(){
var zoneID = $(this).val();    
$parentDiv = $(this).closest(".col-md-12"); 
if(zoneID){
    $.ajax({
       type:"GET",
       url:"{{url('zone_weredas')}}/"+zoneID,
       success:function(res){               
        if(res){
            $(".weredaId").empty();
            $(".weredaId").append('<option value="">-- --</option>');
            $.each(res,function(key,value){
                $(".weredaId").append('<option value="'+key+'">'+value+'</option>');
            });
       
        }else{
           $(".weredaId").empty();
        }
       }
    });
}else{
    $(".weredaId").empty();
}      
});

$(document).on('change', '.weredaId', function(){
var weredaID = $(this).val();    
$parentDiv = $(this).closest(".col-md-12"); 

if(weredaID){
    $.ajax({
       type:"GET",
       url:"{{url('wereda_schools')}}/"+weredaID,
       success:function(res){               
        if(res){
           $(".schoolId").empty();
           $(".schoolId").append('<option value="">-- --</option>');
            $.each(res,function(key,value){
                $(".schoolId").append('<option value="'+key+'">'+value+'</option>');
            });
       
        }else{
           $(".schoolId").empty();
        }
       }
    });
}else{
    $(".schoolId").empty();
}      
});

$(document).on('change', '.weredaId_withSubW', function(){
var weredaID = $(this).val();    
$parentDiv = $(this).closest(".col-md-12"); 

if(weredaID){
    $.ajax({
       type:"GET",
       url:"{{url('wereda_subWeredas')}}/"+weredaID,
       success:function(res){               
        if(res){
            $(".subWeredaId").empty();
            $(".subWeredaId").append('<option value="">-- --</option>');
            $.each(res,function(key,value){
                $(".subWeredaId").append('<option value="'+key+'">'+value+'</option>');
            });
       
        }else{
           $(".subWeredaId").empty();
        }
       }
    });
}else{
    $(".subWeredaId").empty();
}      
});

$(document).on('change', '.tabyaId', function(){
var tabyaId = $(this).val();    
$parentDiv = $(this).closest(".col-md-12"); 

if(tabyaId){
    $.ajax({
       type:"GET",
       url:"{{url('tabya_kebelles')}}/"+tabyaId,
       success:function(res){               
        if(res){
            $(".kebelleId").empty();
            $(".kebelleId").append('<option value="">-- --</option>');
            $.each(res,function(key,value){
                $(".kebelleId").append('<option value="'+key+'">'+value+'</option>');
            });
       
        }else{
           $(".kebelleId").empty();
        }
       }
    });
}else{
    $(".kebelleId").empty();
}      
});
/*----------------*/


$(document).on('input', '.number', function(e){
        var num=$(this).val().replace(/[^\d\.]/g, '');
        $(this).val(num);
});

$(document).on("submit", "form", function(e){
  //var pNo=$(".phoneNumber").val();
  if(!isValid_PhoneNumber()/*pNo!=undefined && pNo.length>0 && pNo.length!=9 && pNo.length!=10*/){
    e.preventDefault();
    showErrorMessage("Phone number must be 9 - 10 digits long.");
  }

})

function isValid_PhoneNumber(){
  var pNo=$(".phoneNumber").val();
  if(pNo!=undefined && pNo.length>0 && pNo.length!=9 && pNo.length!=10){
    return false;
  }
  return true;
}
function isValid_PhoneNumber_signup(){
  var pNo=$(".phoneNumber_signup").val();
  if(pNo!=undefined && pNo.length>0 && pNo.length!=9 && pNo.length!=10){
    return false;
  }
  return true;
}

  /*--PERMISSIONS--*/
$(document).on('click', '.permissions-step0', function(e){
  e.preventDefault();
  $.ajax({
 type: 'get',
  url: "{{url('permissions_save/step1')}}",
  success: function(data){
   if(data=='unauthorized'){
     /*redirect to login page */
      location.reload();
      return;
    }
    $("#container").empty().append(data);
      activateUrl('/permissions_save/step1');
  },
  error: function(err){
    console.log('error occured');
    console.log('error');
  }
  });
});

$(document).on('click', '.permissions-step1', function(e){
  e.preventDefault();
  var id=$(this).attr('value');
  $.ajax({
 type: 'get',
  url: "{{url('permissions_save/step2')}}/"+id,
  success: function(data){
   if(data=='unauthorized'){
     /*redirect to login page */
      location.reload();
      return;
    }
    $("#container").empty().append(data);
      activateUrl('permissions_save/step2/'+id);
      activateTab('first_tab'); 
  },
  error: function(err){
    console.log('error occured');
    console.log('error');
  }
  });
});

/*--MANAGE RESOURCE PERMISSION--*/
$(document).on('click, change', '.permissions-save', function(e){
    //e.preventDefault();
  var actionType=$(this).attr("actionType");//$(this).state;
  var roleId=$(this).attr('roleId');
  var resourceId=$(this).attr('resourceId');
  var checked=$(this).is(":checked");//$(this).state;
  var url="{{url('permissions_save')}}/"+actionType
  $.ajax({
 type: 'get',
  url: url,
  data: {roleId:roleId, resourceId:resourceId, checked:checked},
  success: function(data){
    if(data=='unauthorized'){
      location.reload();
      return;
    }
    showSuccessMessage(data);
  },
  error: function(err){
    console.log('error occured');
    console.log('error');
  }
  });
});
$(document).on('click, change', '.permissions-checkAll', function(e){
  //e.preventDefault();
  var actionType=$(this).attr("actionType");//$(this).state;
  var checked=$(this).is(":checked");
  var roleId=$(this).attr('roleId');
  var resourceId=$(this).attr('resourceId');

  var url="{{url('permissions_save/checkAll')}}/"+actionType;
  $.ajax({
 type: 'get',
  url: url,
  data: {roleId:roleId, resourceId:resourceId, checked:checked},
  success: function(data){
   if(data=='unauthorized'){
     /*redirect to login page */
      location.reload();
      return;
    }
    $("#container").empty().append(data);
    showSuccessMessage('permissions saved.');
    activateTab('first_tab');
/*      activateUrl('permissions-save');*/
  },
  error: function(err){
    console.log('error occured');
    console.log('error');
  }
  });
});


/*--DOCUMENT PERMISSION--*/
$(document).on('click, change', '.document-permissions-save', function(e){
    //e.preventDefault();
  var actionType=$(this).attr("actionType");//$(this).state;
  var roleId=$(this).attr('roleId');
  var resourceId=$(this).attr('resourceId');
  var checked=$(this).is(":checked");//$(this).state;
  var url="{{url('document_permissions_save')}}/"+actionType
  $.ajax({
 type: 'get',
  url: url,
  data: {roleId:roleId, resourceId:resourceId, checked:checked},
  success: function(data){
    if(data=='unauthorized'){
      location.reload();
      return;
    }
    showSuccessMessage(data);
  },
  error: function(err){
    console.log('error occured');
    console.log('error');
  }
  });
});


$(document).on('click, change', '.document-permissions-checkAll', function(e){
  //e.preventDefault();
  var actionType=$(this).attr("actionType");//$(this).state;
  var checked=$(this).is(":checked");
  var documentId=$(this).attr('documentId');
  var roleId=$(this).attr('roleId');

  var url="{{url('document_permissions_save/checkAll')}}/"+actionType;
  $.ajax({
 type: 'get',
  url: url,
  data: {documentId:documentId, roleId:roleId, checked:checked},
  success: function(data){
   if(data=='unauthorized'){
     /*redirect to login page */
      location.reload();
      return;
    }
    $("#container").empty().append(data);
    showSuccessMessage('permissions saved.');

     activateTab('first_tab');
  },
  error: function(err){
    console.log('error occured');
    console.log('error');
  }
  });
});
</script>
