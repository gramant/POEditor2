var langs = 0;
$(document).ready(function() {
	//makes table's header fixed
	//$('#data').fixedHeaderTable({ altClass: 'odd' ,  height: 500});
	//alerts on leaving
	$(window).bind('beforeunload', function(){
		return 'Exit without saving?';
	});
	// doesn't alert on submiting form
	$("form").submit(function(){
		$(window).unbind("beforeunload");
	});
	$("#add_id").click(function(){
	
		var counter = 1;
		var current = 1;
		var new_val = '';
		$(".msgstr").each(function(){
			var value = $(this).val();
			value = value.replace(/^#[\d]{1,5}#/, '');
			new_val = "#"+counter+"#"+value;			
			$(this).val(new_val);
			if (current % langs === 0  )
				counter++;
			current++;
		});
	});
	$("#remove_id").click(function(){
		var new_val = '';
		$(".msgstr").each(function(){
			var value = $(this).val();			
			new_val = value.replace(/^#[\d]{1,5}#/, '');
			$(this).val(new_val);
		});
	});
	$("#add_key").click(function(){
		var new_key = $("#data tbody tr:last").html();
		var remove = '<div class = "remove_row" ></div>';
		$("#data tbody").append("<tr>"+new_key+"</tr>");
		$("#data tbody tr:last td:first").append(remove);
		$("#data tbody tr:last td:first textarea").removeAttr("readonly");
		$("#data tbody tr:last td textarea").val("");
		$("#data tbody tr:last td input").val("");
		$('html, body').animate({
                        scrollTop: $("#data tbody tr:last").offset().top
                    }, 500);
	});
	$(".remove_row").live("click",function(){
		$(this).parents("tr").fadeOut(400, function(){ $(this).remove();});
	});
});
	 function UpdateTableHeaders() {
            $("div.divTableWithFloatingHeader").each(function() {
                var originalHeaderRow = $(".tableFloatingHeaderOriginal", this);
                var floatingHeaderRow = $(".tableFloatingHeader", this);
                var offset = $(this).offset();
                var scrollTop = $(window).scrollTop();
                if ((scrollTop > offset.top) && (scrollTop < offset.top + $(this).height())) {
                    floatingHeaderRow.css("visibility", "visible");
                    floatingHeaderRow.css("top", Math.min(scrollTop - offset.top, $(this).height() - floatingHeaderRow.height()) + "px");

                    // Copy cell widths from original header
                    $("th", floatingHeaderRow).each(function(index) {
                        var cellWidth = $("th", originalHeaderRow).eq(index).css('width');
                        $(this).css('width', cellWidth);
                    });

                    // Copy row width from whole table
                    floatingHeaderRow.css("width", $(this).css("width"));
                }
                else {
                    floatingHeaderRow.css("visibility", "hidden");
                    floatingHeaderRow.css("top", "0px");
                }
            });
        }

        $(document).ready(function() {
            $("table.tableWithFloatingHeader").each(function() {
                $(this).wrap("<div class=\"divTableWithFloatingHeader\" style=\"position:relative\"></div>");

                var originalHeaderRow = $("tr:first", this)
                originalHeaderRow.before(originalHeaderRow.clone());
                var clonedHeaderRow = $("tr:first", this)

                clonedHeaderRow.addClass("tableFloatingHeader");
                clonedHeaderRow.css("position", "absolute");
                clonedHeaderRow.css("top", "0px");
                clonedHeaderRow.css("left", $(this).css("margin-left"));
                clonedHeaderRow.css("visibility", "hidden");

                originalHeaderRow.addClass("tableFloatingHeaderOriginal");
            });
            UpdateTableHeaders();
            $(window).scroll(UpdateTableHeaders);
            $(window).resize(UpdateTableHeaders);
        });