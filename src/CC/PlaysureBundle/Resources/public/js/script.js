 $( document ).ready(function() {
	 	console.log('hello world progresss');
	 	var ActionsSold = $('span.numberOfActionsSold').text();
	 	var ActionsTotal = $('span.numberOfActionsTotal').text();
	 	console.log();

	    $('#sample_goal').goalProgress({
	        goalAmount: ActionsTotal,
	        currentAmount: ActionsSold,
	        textBefore: '',
	        textAfter: ' '
	    });
});
