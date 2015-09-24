var active_class = 'active';
$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
	var th_checked = this.checked;//checkbox inside "TH" table header
	
	$(this).closest('table').find('tbody > tr').each(function(){
		var row = this;
		if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
		else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
	});
});

//select/deselect a row when the checkbox is checked/unchecked
$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
	var $row = $(this).closest('tr');
	if(this.checked) $row.addClass(active_class);
	else $row.removeClass(active_class);
});


//add tooltip for small view action buttons in dropdown menu
$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

//tooltip placement on right or left
function tooltip_placement(context, source) {
	var $source = $(source);
	var $parent = $source.closest('table')
	var off1 = $parent.offset();
	var w1 = $parent.width();

	var off2 = $source.offset();
	//var w2 = $source.width();

	if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
	return 'left';
}