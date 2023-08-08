
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');
    
    allWells.hide();
    
    navListItems.click(function (e) {
       
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);
    
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    
    allNextBtn.click(function(){
        // alert('bilal');


        var user_property_all = document.getElementById("user_property_all");
        var user_bedroom = document.getElementById("user_bedroom");
        var user_currency = document.getElementById("user_currency");
        var user_budget = document.getElementById("user_budget");
        var user_payment_plan = document.getElementById("user_payment_plan");
        var user_location = document.getElementById("user_location");
        var add_desired = document.getElementById("add_desired");
     // alert(user_property_all.value); 
        if (user_property_all.value === "") {
     // alert("Please select an option.");

     $('#show_one').show();
     user_property_all.classList.add("country_error");
     user_property_all.focus();
        $("html, body").animate({ scrollTop: "-=100px" }, "slow");
         
          
           
     return false;
  }else{
     
    $("#user_property_all").removeClass("country_error");
    $('#show_one').hide();
  }

  if (user_bedroom.value === "") {

    $('#show_two').show();
    user_bedroom.classList.add("country_error");
    user_bedroom.focus();
       $("html, body").animate({ scrollTop: "-=100px" }, "slow");
        
          
           
     return false;
  }else{
    $('#show_two').hide();
     
    $("#user_bedroom").removeClass("country_error");
  }

  if (user_currency.value === "") {
    $('#show_three').show();
    user_currency.classList.add("country_error");
    user_currency.focus();
       $("html, body").animate({ scrollTop: "-=100px" }, "slow");
        
          
          
           
     return false;
  }else{
    $('#show_three').hide();
     
    $("#user_currency").removeClass("country_error");
  }

  if (user_budget.value === "") {
    $('#show_four').show();
    user_budget.classList.add("country_error");
    user_budget.focus();
       $("html, body").animate({ scrollTop: "-=100px" }, "slow");

          
           
     return false;
  }else{

    if (!$.isNumeric(user_budget.value)) {
        // alert("Please enter a valid number.");
        $('#valid_budget').show();
        $('#show_four').hide();
        user_budget.classList.add("country_error");
        user_budget.focus();
            $("html, body").animate({ scrollTop: "-=20px" }, "slow");
              
        return false;
        }
        $('#valid_budget').hide();
        // $('#info_three').hide();

    $('#show_four').hide();
     
    $("#user_budget").removeClass("country_error");
  }

  if (user_payment_plan.value === "") {
     // alert("Please select an option.");
     $('#show_five').show();
     user_payment_plan.classList.add("country_error");
     user_payment_plan.focus();
        $("html, body").animate({ scrollTop: "-=100px" }, "slow");
          
           
     return false;
  }else{
    $('#show_five').hide();
     
    $("#user_payment_plan").removeClass("country_error");
  }


  if (user_location.value === "") {
     // alert("Please select an option.");
     $('#show_six').show();
     user_location.classList.add("country_error");
     user_location.focus();
        $("html, body").animate({ scrollTop: "-=100px" }, "slow");
          
          
           
     return false;
  }else{
    $('#show_six').hide();
     
    $("#user_location").removeClass("country_error");
  }


  if (add_desired.value === "") {
   $('#show_four').show();
   add_desired.classList.add("country_error");
   add_desired.focus();
      $("html, body").animate({ scrollTop: "-=100px" }, "slow");

         
          
    return false;
 }else{

   if (!$.isNumeric(add_desired.value)) {
       // alert("Please enter a valid number.");
       $('#valid_budget_one').show();
       $('#show_seven').hide();
       add_desired.classList.add("country_error");
       add_desired.focus();
           $("html, body").animate({ scrollTop: "-=20px" }, "slow");
             
       return false;
       }
       $('#valid_budget_one').hide();
       // $('#info_three').hide();

   $('#show_seven').hide();
    
   $("#add_desired").removeClass("country_error");
 }




//   if (add_desired.value === "") {
  
//      $('#errorText').text('');
//     $('#show_seven').show();
//     add_desired.classList.add("country_error");
//     add_desired.focus();
//         $("html, body").animate({ scrollTop: "-=20px" }, "slow");
          
           
//      return false;
//   }else{
//     $('#show_seven').hide();

//     var value = $('#add_desired').val().trim();
//             var regex = /^\d+\s*\*\s*\d+$/; // Regular expression to match "integer * integer" format

//             if (regex.test(value)) {
//                 $('#add_desired').removeClass('error');
//                 $('#errorText').text('');
            
//             } else {
//                 $('#add_desired').addClass('error');
//                 $('#errorText').text('Please enter a valid format: integer * integer');
//                 return false; // Prevent form submission
//             }

     
//     $("#add_desired").removeClass("country_error");
//   }




        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;
    
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
    
        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });
    
    $('div.setup-panel div a.btn-primary').trigger('click');
    });


