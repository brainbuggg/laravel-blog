/* AUTO DISAPPEAR ALERT MESSAGES */
$(document).ready (function(){
    $("#alert-dismiss").fadeTo(8000, 500).slideUp(500, function(){
   		$("#alert-dismiss").alert('close');
    });
});

// Activate twitter bootstrap modal.

$('#flash-overlay-modal').modal();