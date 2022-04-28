
var request;

//bind to submit event of the form
$("#create_post").submit(function(event){

    //Prevent posting of form in case of errors
    event.preventDefault();

    //abort any pending requests
    if (request) {
        request.abort();
    }
    //setup some local variables
    var $form = $(this);

    //select and cache all fields
    var $inputs = $form.find("input, textarea, button");

    //serialize the data in the form
    var serializedData = $form.serialize();

    //disable inputs for duration of the Ajax request.
    //disable elements AFTER the form data has been serialized
    $inputs.prop("disabled", true);

    //fire off request to form.php
    request = $.ajax({
        url: "",
        type: "post",
        data: serializedData
    });

    //callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        //log a message to the console
        console.log({
            response,
            textStatus
        });
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});