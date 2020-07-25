var request2;
$("#search").keyup(function(event){

    if (request2) {
        request2.abort();
    }

    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");

    var serializedData = $form.serialize();

    var search = $("#search").val();

    if(search.length > 0){
        $inputs.prop("disabled", true);
    };

    request2 = $.ajax({
        url: "search.php",
        type: "post",
        data: serializedData
    });

    request2.done(function (response, textStatus, jqXHR){
        document.getElementById("results").innerHTML=response;
        document.getElementById("results_animal").innerHTML=response;
        
    });
});

var request;
$("#add_animal").click(function(event){
    $("#main_form").click(function(event){

    if (request) {
        request.abort();
    }

    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");

    var serializedData = $form.serialize();
    console.log(serializedData);

    request = $.ajax({
        url: "add_new_animal.php",
        type: "post",
        data: serializedData
    });

    request.done(function (response, textStatus, jqXHR){
        document.getElementById("results_animal").innerHTML=response;
        location.reload();
    });

    });
});

var request3;
$("#btn").click(function(event){
    $("#foo").click(function(event){

    if (request3) {
        request3.abort();
    }

    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");

    var serializedData = $form.serialize();

    // var test2 = $('#first_name').val();
    // console.log(test2);
    // console.log(serializedData);

    request3 = $.ajax({
        url: "add_new_user.php",
        type: "post",
        data: serializedData
    });

    request3.done(function (response, textStatus, jqXHR){
        document.getElementById("results_user").innerHTML=response;
        
        // document.getElementById("confirm").innerHTML= "<div class='alert alert-success' role='alert'><h4 class='alert-heading'>You have successfully deleted the entry</h4><hr><p class='mb-0'>You will be redirected to the user page</p></div>";
    });

    });
});



