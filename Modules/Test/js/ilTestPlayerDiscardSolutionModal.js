(function($){ $(document).ready( function(){

	$('#tst_discard_answer_button').click(
		function() { $('#tst_discard_solution_modal').modal('show'); }
	);

	$('#tst_cancel_discard_button').click(
		function() { $('#tst_discard_solution_modal').modal('hide'); }
	);

}); })
(jQuery);
