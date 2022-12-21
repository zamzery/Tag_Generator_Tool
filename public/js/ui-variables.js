var txtTags = null;

const MISSING_FIELDS = "There are missing fields";
const ALL = "ALL";
/* CPU*/
var cmbCPUFamily = null;
var cmbCPUSocketSeries = null;
var txtCPUTDP = null;
var cmbCPUIncludesFan = null;

/* CASE */
var cmbCaseRadiatorType = null;
var cmbCaseRadiatorSlots = null;
var txtCaseRadiatorSummary = null;
var cmbCaseFormFactors = null;
var txtCaseFormFactorSummary = null;
var cmbCaseStorageSlots = null;
var cmbCaseStorageFormat = null;
var txtCaseStorageSummary = null;
var cmbCaseIncludesFan = null;

/* FAN */
var cmbFanType = null;
var cmbFanSlots = null;
var cmbCoolingCpuFamily = null;
var txtCoolingCpuSummary = null;
var cmbCoolingCpuSocket = null;

/* RAM */
var cmbRamType = null;
var cmbRamSpeed = null;

/* COOLING */
var cmbCoolingType = null;
var cmbCoolingTDP = null;

/* PSU*/
var txtPSUTDP = null;

/* GPU*/
var cmbGpuTDP = null;
var cmbGpuFormFactors = null;
var cmbGpuSlots = null;
var txtGpuFormFactorSummary = null;

/* STORAGE */
var cmbStorageType = null;
var cmbStorageFormat = null;

/* MOBO */
var cmbMoboGpuSlots = null;
var cmbMoboFormFactor = null;
var txtMoboFormFactorSummary = null;
var cmbMoboCpuFamily = null;
var cmbMoboCpuSocket = null;
var txtMoboCpuSummary = null;
var cmbMoboStorageSlots = null;
var cmbMoboStorageInterface = null;
var cmbMoboStorageFormat = null;
var txtMoboStorageSummary = null;
var cmbMoboMemorySlots = null;
var cmbMoboMemoryMaxCap = null;
var cmbMoboMemoryType = null;
var cmbMoboMemorySpeed = null;
var txtMoboMemorySummary = null;

/* TIER */
var cmbTier = null;
var cmbTierQty = null;
var cmbTierVariant = null;

/* SERIES */
var cmbSerie = null;

setVariables = () => {
	/* CPU */
	cmbCPUFamily = $("#input-cpu-family");
	cmbCPUSocketSeries = $("#input-cpu-socket-series");
	txtCPUTDP = $("#input-cpu-tdp");
	cmbCPUIncludesFan = $("#input-cpu-fan-included");

	/* CASE */
	cmbCaseGPUSlots = $("#input-case-gpu-slots");
	cmbCaseRadiatorType = $("#input-case-radiator-type");
	cmbCaseRadiatorSlots = $("#input-case-radiator-slots");
	txtCaseRadiatorSummary = $("#input-case-radiator-summary");
	cmbCaseFormFactors = $("#input-case-form-factor");
	txtCaseFormFactorSummary = $("#input-case-form-factor-summary");
	cmbCaseStorageSlots = $("#input-case-storage-slots");
	cmbCaseStorageFormat = $("#input-case-storage-format");
	txtCaseStorageSummary = $("#input-case-storage-summary");
	cmbCaseIncludesFan = $("#input-case-fan-included");

	/* FAN*/
	cmbFanType = $("#input-fan-type");
	cmbFanSlots = $("#input-fan-slots");

	/* RAM */
	cmbRamType = $("#input-ram-type");
	cmbRamSpeed = $("#input-ram-speed");

	/* COOLING */
	cmbCoolingType = $("#input-cooling-type");
	cmbCoolingSize = $("#input-cooling-size");
	cmbCoolingTDP = $("#input-cooling-tdp");
	cmbCoolingCpuFamily = $("#input-cooling-cpu-family");
	txtCoolingCpuSummary = $("#input-cooling-cpu-summary");
	cmbCoolingCpuSocket = $("#input-cooling-cpu-socket-series");

	/* PSU*/
	txtPSUTDP = $("#input-psu-tdp");

	/* GPU */
	txtGpuTDP = $("#input-gpu-tdp");
	cmbGpuFormFactors = $("#input-gpu-form-factor");
	txtGpuFormFactorSummary = $("#input-gpu-form-factor-summary");
	cmbGpuSlots = $("#input-gpu-slots");

	/* STORAGE */
	cmbStorageType = $("#input-storage-type");
	cmbStorageFormat = $("#input-storage-format");

	/* MOBO */
	cmbMoboGpuSlots = $("#input-mobo-gpu-slots");
	cmbMoboFormFactor = $("#input-mobo-form-factor");
	cmbMoboCpuFamily = $("#input-mobo-cpu-family");
	cmbMoboCpuSocket = $("#input-mobo-cpu-socket-series");
	txtMoboCpuSummary = $("#input-mobo-cpu-summary");
	cmbMoboStorageSlots = $("#input-mobo-storage-slots");
	cmbMoboStorageInterface = $("#input-mobo-storage-type");
	txtMoboStorageSummary = $("#input-mobo-storage-summary");
	cmbMoboMemorySlots = $("#input-mobo-ram-slots");
	cmbMoboMemoryMaxCap = $("#input-mobo-ram-capacity");
	cmbMoboMemoryType = $("#input-mobo-ram-type");
	cmbMoboMemorySpeed = $("#input-mobo-ram-speed");
	txtMoboMemorySummary = $("#input-mobo-ram-summary");

	/* TIER */
	cmbTier = $("#input-tier");
	cmbTierQty = $("#input-tier-qty");
	cmbTierVariant = $("#input-tier-variant");

	/* SERIES */
	cmbSerie = $("#input-serie");

	/*SET GENERIC */
	txtTags = $("#txt-tags");
	let i;
	for (i = 1; i < DEFAULT_MAX_LST_SIZE + 1; i++) {
		$(".numeric-option").append(new Option(i));
	}

	$(".nav-link").click(function () {
		let tagName = $(this).get(0).id;
		if(tagName == "newtag-tab"){
		$(".generateTagField").hide();
		} else {
		$(".generateTagField").show();
		}
	});
};
