function reload(){
        $('#facts').load( "modul/dashboard/getFacts.php");
        $('#entries').load( "modul/dashboard/getEntries.php");
}

function delEntry(entryID){

    $.ajax({
        type: "POST",
        data: {entryID:entryID},
        url: "modul/dashboard/removeWeight.php",
        success: function(data){
            if(data){
                $('#errorText').html(data);
                $('#errorAlert').fadeIn('fast');
            } else {
                $('#successText').html("Successfully Removed.");
                $('#successAlert').fadeIn('fast').delay(2000).fadeOut('fast');
                reload();
            }
        }
    });

}

function timeStamp() {

    var now = new Date();

    var date = [ now.getFullYear(), now.getMonth() + 1, now.getDate() ];
    var time = [ now.getHours(), now.getMinutes(), now.getSeconds() ];

    for ( var i = 1; i < 3; i++ ) {
        if ( time[i] < 10 ) {
            time[i] = "0" + time[i];
        }
    }

    return date.join("-") + " " + time.join(":");
    
}

function setTimestamp() {
    setTimeout(function () {

        $('#inputDate').val(timeStamp());

        setTimestamp();
    }, 1000);
}

$(document).ready(function(){

    reload();

    setTimestamp();

    $('#addEntryButton').click(function(event){

        $('#errorAlert').fadeOut('fast');
        $(this).prop('disabled', true);
        event.preventDefault();
        var date = $('#inputDate').val();
        var weight = $('#inputWeight').val();
        var error = "";

        if(date < 2){
            error += "<li>Please enter a correct Date</li>";
        }

        if(weight < 8){
            error += "<li>Please enter a weight</li>";
        }

        if(error != ""){

            $('#errorText').html(error);
            $('#errorAlert').fadeIn('fast');
            $(this).prop('disabled', false);

        } else {

            $.ajax({
                type: "POST",
                data: {date:date, weight:weight},
                url: "modul/dashboard/addWeight.php",
                success: function(data){
                    if(data){
                        $('#errorText').html(data);
                        $('#errorAlert').fadeIn('fast');
                        $('#addEntryButton').prop('disabled', false);
                    } else {
                        $('#successText').html("Successfully Added.");
                        $('#successAlert').fadeIn('fast').delay(2000).fadeOut('fast');

                        reload();

                        $('#inputWeight').val("");
                        $('#inputDate').val()
                        $('#addEntryButton').prop('disabled', false);

                    }
                }
            });

        }


    });

});
