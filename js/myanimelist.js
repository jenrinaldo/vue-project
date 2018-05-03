jQuery("#jensan-myanimelist-api-generate").on("click", function(){
	if(jQuery("#jensan-myanimelist-api").val().length > 0){
		jQuery.getJSON("/wp-content/themes/animesubs/api.php", {
			url: jQuery("#jensan-myanimelist-api").val()
		}, function(data){
			jQuery("#tw_thumbnail").val(data["image"]);
			jQuery("#new-tag-genre").val(data["genres"]);
			jQuery("#new-tag-season").val(data["premiered"]);
			jQuery("#new-tag-producer").val(data["producers"]);
			jQuery("#new-tag-tipe").val(data["type"]);
			jQuery("#content.wp-editor-area").val(data["synopsis"]);
			jQuery("input[name=\"post_title\"]#title").val(data["title"]);
			jQuery.each(data, function(key, value){
				if(jQuery("#jensan-" + key).length > 0){
					jQuery("#jensan-" + key).val(value);
				}else if(jQuery("#new-tag-" + key).length > 0){
					jQuery("#new-tag-" + key).val(value);
				}
			});
		});
	}
});
