function initUI(){
	$(".nav-link").click(function () {
		let tagName = $(this).get(0).id;
		if(tagName == "newtag-tab"){
			$(".generateTagField").hide();
		} else {
			$(".generateTagField").show();
		}
	});

	$("#modalNewTagCpu").on('hidden.bs.modal', function () {
		document.getElementById( "intel" ).value = 0;
		document.getElementById( "amd" ).value = 1;
		document.getElementById( "intelCheck" ).checked = false;
		document.getElementById( "amdCheck" ).checked = true;
	});

	$("#modalNewTagStorage").on('hidden.bs.modal', function () {
		document.getElementById( "m2" ).value = 0;
		document.getElementById( "sata" ).value = 1;
		document.getElementById( "m2Check" ).checked = false;
		document.getElementById( "sataCheck" ).checked = true;
	});
}

changeCpu = ( este ) => {
	console.log( este )
	if ( este == 'intel' ) {
		document.getElementById( "intel" ).value = 1;
		document.getElementById( "amd" ).value = 0;
	} else {
		document.getElementById( "intel" ).value = 0;
		document.getElementById( "amd" ).value = 1;
	}
}

changeStorage = ( este ) => {
	if(este=='m2'){
		document.getElementById( "m2" ).value = 1;
		document.getElementById( "sata" ).value = 0;
	} else {
		document.getElementById( "m2" ).value = 0;
		document.getElementById( "sata" ).value = 1;
	}
}