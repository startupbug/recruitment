$(document).ready(function(){
	

});


function confirmAlert(){
	alertify.confirm('Are You Sure ?', 'You are about to delete this template permanently and you cannot undo this action.', function(){ 
			alertify.success('Ok') 
		}, function(){ alertify.error('Cancel')});
}

function confirmAlert_test(){
	alertify.confirm('Hello !! This is preview', function(){ 
			alertify.success('Ok') 
		}, );
}