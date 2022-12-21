var CPU_FAMILY_ID_TAG = null;
var PSU_WATTS_TAG = null;
var RADIATOR_SIZES = null;
var STORAGE_TYPES_FORMAT = null;
var RAM_CAPACITY = null;
var COOLING_TYPES = null;

fillCmbGeneric = ( cmb, collection, addAll ) => {
	cmb.empty();
	if ( addAll ) cmb.append( new Option( "ALL" ) );
	collection.forEach( ( element ) => {
		cmb.append( new Option( element ) );
	} );
};

getObjectDeepValues = ( object ) => {
	let values = [];
	$.map( object, ( key ) => {
		$.map( key, ( value ) => {
			if ( value ) {
				values.push( value );
			}
		} );
	} );
	return values;
};

// fillCaseOptions = () => {
// 	fillCmbGeneric(
// 	cmbCaseStorageFormat,
// 	getObjectDeepValues(STORAGE_TYPES_FORMAT)
// 	);
// };

fillGpuOptions = () => {
};

fillFanOptions = () => {
	fillCmbGeneric( cmbFanType, FAN_TYPES );
};

fillRadiatorOptions = () => {
	// fillCmbGeneric(cmbCoolingSize, RADIATOR_SIZES);
	// fillCmbGeneric(cmbCoolingType, COOLING_TYPES);
};

fillSeriesOptions = () => {
	fillCmbGeneric( cmbSerie, SERIES );
};

fillTierOptions = () => {
	fillCmbGeneric( cmbTier, TIERS );
};

fillStorageOptions = () => {
	if ( cmbStorageType.val() == 'SATA' ) {
		$( ".sata" ).show();
		$( ".m2" ).hide();
		cmbStorageFormat.val( "" );
	} else {
		$( ".sata" ).hide();
		$( ".m2" ).show();
		cmbStorageFormat.val( "" );
	}
};

fillRamOptions = () => {
};

fillMoboOptions = () => {
	fillCpuSocketSeries( cmbMoboCpuFamily );
};

fillStorageFormatOptions = ( cmbType, cmbFormat ) => {
};

fillCpuSocketSeries = ( cmbFamily ) => {
	if ( cmbFamily.val() == 'AMD' ) {
		$( ".amd" ).show();
		$( ".intel" ).hide();
	} else {
		$( ".amd" ).hide();
		$( ".intel" ).show();
	}
};

initUI = () => {
	setVariables();

	$( ".nav-link" ).click( () => {
		clearComponents();
	} );

	$( ".number-validation" ).keypress( function ( event ) {
		if ( isNaN( String.fromCharCode( event.keyCode ) ) ) return false;
	} );
	fillStorageOptions();
	cmbFamily = $( "#input-cpu-family" );
	fillCpuSocketSeries( cmbFamily );
};

clearComponents = () => {
	$( ".cleareable" ).empty();
	$( "select" ).prop( "selectedIndex", 0 );
	$( "select" ).trigger( "change" );
	txtTags.empty();
};

copyTagsToClipboard = () => {
	var $temp = jQuery( "<textarea>" );
	jQuery( "body" ).append( $temp );
	$temp.val( txtTags.val() ).select();
	document.execCommand( "copy" );
	$temp.remove();
};

showText = ( text ) => {
	$( ".toast-body" ).html( text );
	$( ".toast" ).toast( "show" );
};

getJson = ( url ) => {
	var jsonFile;
	fetch( url )
		.then( res => res.json() )
		.then( data => jsonFile = JSON.parse( data ) );
	return jsonFile;
};

/************* DOCUMENTATION 
Please DO NOT USE '_' NOR '-' NOR '/' NOR 'ALL' in the descriptions those chars are reserved 
'/' Is used in TYPES to specify multiple options for the same description
/*************/

const DEFAULT_MAX_LST_SIZE = 10;
