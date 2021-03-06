/**
 *  This is the Javascript file for the standalone area selector.
 *  This file is not used inside Wordpress
 */
var selector;
// retry counter is used for Firefox right now!
var retryCounter=0;
var defaultUrl = '';
var parentKey = 'not-set'
var parentId = 'not-set';
var currentSelection;

$(document).ready(function () {
  loadData();
});

function loadData() {
  var isWordpress = false;
  
  try {
    if(window.opener && window.opener.document) {
      isWordpress = true;
    }
  } catch (e) {
    isWordpress = false;   
  } 
  if (isWordpress) {
     // load data from wordpress
     $("#url").val($("#src", window.opener.document).val());
     $("#iframe_width").val($("#width", window.opener.document).val());
     $("#iframe_height").val($("#ai-height-0", window.opener.document).val());
     var parentKey = $("#securitykey", window.opener.document).val();
     var parentId = $("#id", window.opener.document).val(); 
     if (typeof parentKey === 'undefined') {
        retryCounter++;
        if (retryCounter < 20) {
           window.setTimeout("loadData()", 100);
           return;
        }   
     }
     updateIframe();
     
     // check if it was opened in the hide view - parameter = hide_feature=true
      if(window.location.href.indexOf("hide_feature") > -1) {
        $("#row-viewport, #copy-button, #selection-area, #row-shortcode").hide();
        $("#row-hide").css('margin-bottom','10px');
       
    }

  } else {
     $("#main_selector").hide();
     $("#url").val(defaultUrl);
     $("#iframe_width").val("");
     $("#iframe_height").val("");
     alert("The area selector is not called from within the wordpress administraton.\nPlease enter your url, width and height of the iframe manually."); 
  }
  selector = $('#image').imgAreaSelect({ instance: true, handles: true, onSelectChange: function (img, selection) {
    currentSelection = selection;
    updateInputs();
    } });
    
   jQuery(document).on( 'click', '#selection-hide-button', function() {
      jQuery('#hide_additional_div').slideDown(1000); 
      jQuery('#selection_hide').width("790px");
      jQuery('#selection-hide-button').hide();     
      selector.cancelSelection();  
      return false;
    });
    
    jQuery(document).on( 'keyup', '#selection_hide_color,#selection_hide_file,#selection_hide_z_index, #selection_hide_link, #selection_hide_target', function() {
        updateInputs();  
    });
    
          
}

function updateInputs() {
    selection = currentSelection;
    $("#selection_x").val(selection.x1);
    $("#selection_y").val(selection.y1);
    $("#selection_width").val(selection.width);
    $("#selection_height").val(selection.height);
    $("#selection_viewport").val("show_part_of_iframe_next_viewports=\"" +selection.x1 + "," + selection.y1 + "," + selection.width + "," + selection.height + "\"");
    
    var outputString =  selection.x1 + "," + selection.y1 + "," + selection.width + "," + selection.height;
    
    var color = $("#selection_hide_color").val();
    var file = $("#selection_hide_file").val(); 
    var zindex = $("#selection_hide_z_index").val();  

    outputString += ',' + color;
    if (file != '') {
        outputString += "$" + file;
    } 
    outputString += ',' +  zindex;
    
    var link = $("#selection_hide_link").val();   
    
    if (link != '') {
        outputString += ',' +  link;
        var target = $("#selection_hide_target").val();
        if (target != '') {
            outputString += ',' +  target;
        } else {
            outputString += ',_blank';
        }
    }
     
    $("#selection_hide").val("hide_part_of_iframe=\"" + outputString + "\"");
    var secKeyString = (parentKey === '' || parentKey === 'not-set') ? '' : 'securitykey="'+parentKey+'" ';
    $("#selection_shortcode").val("[advanced_iframe "+secKeyString+"use_shortcode_attributes_only=\"true\" src=\""+$("#url").val()+"\" id=\""+parentId+"\" height=\""+$("#iframe_height").val()+"\" width=\""+$("#iframe_width").val()+"\" show_part_of_iframe=\"true\" show_part_of_iframe_x=\""+$("#selection_x").val()+"\" show_part_of_iframe_y=\""+$("#selection_y").val()+"\" show_part_of_iframe_width=\""+$("#selection_width").val()+"\" show_part_of_iframe_height=\""+$("#selection_height").val()+"\"]");    
}

function updateIframe() {
     var url = $("#url").val();
     var url_enc = encodeURI(url);
     var width = escape($("#iframe_width").val());
     var height = escape($("#iframe_height").val());
     
     
     // reset all inputs!
     $("#selection_x,#selection_y,#selection_width,#selection_height,#selection_viewport,#selection_hide,#selection_shortcode").val('');
          
     if (width != "" && height != "" && url != '' && url != defaultUrl) {
         if (width.indexOf("%") >= 0 || height.indexOf("%") >= 0 ) {
            alert("You have set % for the width or the height. The selected area will than vary dependant on the browser size. The area selector selects the area in pixel and therefore you might not get the result you expect. For responsive sites setting the width of the selected area in pixels does make sense. Please set this manually if this is your requirement.");           
         } else {
           $("#image").css("width",width).css("height",height);
           $("#iframe").css("width",width).css("height",height);
           $("#iframe").attr('src',url_enc); 
           if (selector) {
               selector.cancelSelection();
           }
           $("#main_selector").show();
         }
     } else {
        alert("Configuration could not be loaded from the parent page.\nPlease enter the iframe options manually.");
     }
     return false;
}

function copySelection() {
   $("#src", window.opener.document).val(encodeURI($("#url").val()));
   $("#width", window.opener.document).val(escape($("#iframe_width").val()));
   $("#height", window.opener.document).val(escape($("#iframe_height").val()));
   
   if ($("#selection_x").val() != "") { 
      $('input:radio[name=show_part_of_iframe]', window.opener.document)[0].checked = true;
      $('#show_part_of_iframe_x', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_y', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_height', window.opener.document).prop('readonly',false);
	  $('#show_part_of_iframe_media_query', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_width', window.opener.document).prop('readonly',false);
	  $('#show_part_of_iframe_media_query', window.opener.document).prop('readonly',false);  
      $('#show_part_of_iframe_next_viewports', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_new_window', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_new_url', window.opener.document).prop('readonly',false);
      $('#show_part_of_iframe_style', window.opener.document).prop('readonly',false);
      
      var value = false;
      $('input[id=show_part_of_iframe_allow_scrollbar_horizontal1]:radio, input[id=show_part_of_iframe_allow_scrollbar_horizontal2]:radio', window.opener.document).attr('disabled',value);
      $('input[id=show_part_of_iframe_allow_scrollbar_vertical1]:radio, input[id=show_part_of_iframe_allow_scrollbar_vertical2]:radio', window.opener.document).attr('disabled',value);
      $('input[id=show_part_of_iframe_next_viewports_loop1]:radio, input[id=show_part_of_iframe_next_viewports_loop2]:radio', window.opener.document).attr('disabled',value);
      $('input[id=show_part_of_iframe_next_viewports_hide1]:radio, input[id=show_part_of_iframe_next_viewports_hide2]:radio', window.opener.document).attr('disabled',value);
      $('input[id=show_part_of_iframe_zoom1]:radio, input[id=show_part_of_iframe_zoom2]:radio, input[id=show_part_of_iframe_zoom3]:radio', window.opener.document).attr('disabled',value);
      
      var selector = '#show_part_of_iframe_x, #show_part_of_iframe_y, #show_part_of_iframe_height, #show_part_of_iframe_width, ';
      selector += '#show_part_of_iframe_allow_scrollbar_horizontal1, #show_part_of_iframe_next_viewports, #show_part_of_iframe_next_viewports_loop1, ';
      selector += '#show_part_of_iframe_new_window, #show_part_of_iframe_new_url, #show_part_of_iframe_next_viewports_hide1, #show_part_of_iframe_style, ';
      selector += '#show_part_of_iframe_zoom1, #show_part_of_iframe_allow_scrollbar_vertical1, #show_part_of_iframe_media_query';
      $(selector, window.opener.document ).closest('tr').removeClass('disabled');
      
    }  
    $("#show_part_of_iframe_x", window.opener.document).val(escape($("#selection_x").val()));
    $("#show_part_of_iframe_y", window.opener.document).val(escape($("#selection_y").val()));
    $("#show_part_of_iframe_width", window.opener.document).val(escape($("#selection_width").val()));
    $("#show_part_of_iframe_height", window.opener.document).val(escape($("#selection_height").val()));   
    window.close();
}