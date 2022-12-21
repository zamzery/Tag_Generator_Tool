generateCpuTags = () => {
	let flag = false;
	let family = cmbCPUFamily.val();
	let id = cmbCPUSocketSeries.val();
	let tdp = txtCPUTDP.val();
	let includesFan = cmbCPUIncludesFan.val();
	if (family && id && tdp && tdp.trim() != "") {
	txtTags.append(genTag(CPU_FAMILY_ID_TAG, family + ":" + id));
	txtTags.append(genTag(PSU_WATTS_TAG, tdp));
	txtTags.append(genTag(COOLING_INCLUDED_TAG, includesFan));
	flag = true;
	} else {
	showText(MISSING_FIELDS);
	}
	return flag;
};

generatePsuTags = () => {
	let flag = false;
	let tdp = txtPSUTDP.val();
	if (tdp && tdp.trim() != "") {
	txtTags.append(genTag(PSU_WATTS_TAG, tdp));
	flag = true;
	} else {
	showText(MISSING_FIELDS);
	}
	return flag;
};

generateTiersTags = () => {
	let flag = false;
	let tier = cmbTier.val();
	let tierVar = cmbTierVariant.val();
	let tierQty = cmbTierQty.val();
	if (tier && tier.trim() != "") {
	txtTags.append(genTag(TIER_TAG, tier));
	txtTags.append(genTag(TIER_QTY_TAG, tierQty));
	txtTags.append(genTag(TIER_VARIANT_TAG, tierVar));
	flag = true;
	} else {
	showText(MISSING_FIELDS);
	}
	return flag;
};

generateSeriesTags = () => {
	let flag = false;
	let serie = cmbSerie.val();
	if (serie && serie.trim() != "") {
	txtTags.append(genTag(SERIES_TAG, serie));
	flag = true;
	} else {
	showText(MISSING_FIELDS);
	}
	return flag;
};

generateStorageTags = () => {
	let flag = false;
	let type = cmbStorageType.val();
	let format = cmbStorageFormat.val();
	if (type) {
	txtTags.append(genTag(STORAGE_TYPE_TAG, type));
	txtTags.append(genTag(STORAGE_FORMAT_TAG, format));
	flag = true;
	} else {
	showText(MISSING_FIELDS);
	}
	return flag;
};

generateGpuTags = () => {
	let flag = false;
	let tdp = txtGpuTDP.val();
	let formFactors = txtGpuFormFactorSummary.val();
	let slots = cmbGpuSlots.val();

	if (slots && formFactors && tdp && tdp.trim() != "") {
	txtTags.append(genTag(PSU_WATTS_TAG, tdp));
	txtTags.append(
		getGenericTags(formFactors).map((val) =>
		genTag(CASE_FORM_FACTOR_TAG, val)
		)
	);
	txtTags.append(genTag(GPU_SLOTS_TAG, slots));
	flag = true;
	} else {
	showText(MISSING_FIELDS);
	}
	return flag;
};

generateCaseTags = () => {
	let flag = false;

	let gpu = cmbCaseGPUSlots.val();
	let radiatorsArr = txtCaseRadiatorSummary.val();
	let formFactorsArr = txtCaseFormFactorSummary.val();
	let formStorageArr = txtCaseStorageSummary.val();
	let includesFan = cmbCaseIncludesFan.val();

	if (gpu && radiatorsArr && formFactorsArr && formStorageArr) {
	txtTags.append(genTag(GPU_SLOTS_TAG, gpu));
	txtTags.append(
		getGenericTags(radiatorsArr).map((val) =>
		genTag(CASE_COOLING_SLOTS_SIZE_TAG, val)
		)
	);
	txtTags.append(
		getGenericTags(formFactorsArr).map((val) =>
		genTag(CASE_FORM_FACTOR_TAG, val)
		)
	);
	txtTags.append(
		getGenericTags(formStorageArr).map((val) =>
		genTag(CASE_STORAGE_SLOTS_SIZE_TAG, val)
		)
	);
	txtTags.append(genTag(COOLING_INCLUDED_TAG, includesFan));
	flag = true;
	} else {
	showText(MISSING_FIELDS);
	}
	return flag;
};

generateMoboTags = () => {
	let flag = false;

	let gpuSlots = cmbMoboGpuSlots.val();
	let factor = cmbMoboFormFactor.val();
	let cpuArr = txtMoboCpuSummary.val();
	let storageArr = txtMoboStorageSummary.val();
	let memSlots = cmbMoboMemorySlots.val();
	let maxMem = cmbMoboMemoryMaxCap.val();
	let memTypeSpeedArr = txtMoboMemorySummary.val();

	if (
	gpuSlots &&
	factor &&
	cpuArr &&
	storageArr &&
	memSlots &&
	maxMem &&
	memTypeSpeedArr
	) {
	txtTags.append(genTag(GPU_SLOTS_TAG, gpuSlots));
	txtTags.append(genTag(CASE_FORM_FACTOR_TAG, factor));
	txtTags.append(
		getGenericTags(cpuArr).map((val) => genTag(CPU_FAMILY_ID_TAG, val))
	);
	txtTags.append(
		getGenericTags(storageArr).map((val) => genTag(STORAGE_TYPE_TAG, val))
	);
	txtTags.append(genTag(RAM_SLOTS_TAG, memSlots));
	txtTags.append(genTag(RAM_MAX_TAG, maxMem));
	txtTags.append(
		getGenericTags(memTypeSpeedArr).map((val) => genTag(RAM_ID_TAG, val))
	);

	flag = true;
	} else {
	showText(MISSING_FIELDS);
	}
	return flag;
};

generateFanTags = () => {
	let type = cmbFanType.val();
	let slots = cmbFanSlots.val();

	if (type) {
	txtTags.append(genTag(FAN_SIZE_TAG, slots + ":" + type));
	} else {
	showText(MISSING_FIELDS);
	}
};

generateRamTags = () => {
	let type = cmbRamType.val();
	let speed = cmbRamSpeed.val();
	if (type && speed) {
	txtTags.append(genTag(RAM_ID_TAG, type + ":" + speed));
	} else {
	showText(MISSING_FIELDS);
	}
};

generateCoolingTags = () => {
	let type = cmbCoolingType.val();
	let size = cmbCoolingSize.val();
	let tdp = cmbCoolingTDP.val();
	let cpuArr = txtCoolingCpuSummary.val();

	if (type && tdp && cpuArr) {
	txtTags.append(genTag(COOLING_TYPE_TAG, type));
	txtTags.append(genTag(COOLING_SIZE_TAG, size));
	txtTags.append(genTag(PSU_WATTS_TAG, tdp));
	txtTags.append(
		getGenericTags(cpuArr).map((val) => genTag(CPU_FAMILY_ID_TAG, val))
	);
	} else {
	showText(MISSING_FIELDS);
	}
};

getGenericTags = (tags) => {
	return tags.split(",").filter((val) => val.trim() != "");
};

genTag = (suffix, value) => {
	return suffix.trim() + value.trim() + ", ";
};

addSelectedTags = (cmb, txt, cmb2 = null) => {
	return checkForAddAllTag(cmb, txt, cmb2);
};

checkForAddAllTag = (cmb1, target, cmb2 = null) => {
	let flag = true;

	if ((cmb2 ? cmb2.val() : cmb1.val()) == ALL) {
	(cmb2 ? cmb2 : cmb1).find("option").each((index, option) => {
		if (option.value != ALL) {
		if (cmb2) {
			addGenericTags(cmb1.val(), option.value, target);
		} else {
			addGenericTags(option.value, null, target);
		}
		}
	});
	} else {
	flag = addGenericTags(cmb1.val(), cmb2 ? cmb2.val() : null, target);
	}
	return flag;
};

checkTagNotIncluded = (val1, val2, tags, addOr) => {
	return !(
	tags.split(",").filter((val) => {
		return (
		val.trim() != "" &&
		((val2 && val.trim().split(":")[1] == val2) ||
			(val.trim() != "" && val.trim() == val1))
		);
	}).length > 0
	);
};

addGenericTags = (val1, val2, txtSum, addOr, valDupe = true) => {
	if (val1) {
	let newValue = val1 + (val2 ? ":" + val2 : "") + ", ";

	if (!valDupe || checkTagNotIncluded(val1, val2, txtSum.val(), addOr)) {
		if (addOr) {
		let last = removeGenericTag(txtSum);
		if (last && last.trim() != "") {
			txtSum.append(last + "|" + newValue);
		} else {
			txtSum.append(newValue);
		}
		} else {
		txtSum.append(newValue);
		}
		flag = true;
	} else {
		showText("The tag was already added");
	}
	} else {
	showText(MISSING_FIELDS);
	}
};

removeGenericTag = (txtSum) => {
	if(txtSum){
		let temp = txtSum
		.val()
		.split(",")
		.filter((val) => val.trim() != "");
		let last = temp.pop();
		txtSum.empty();
		temp.map((val) => txtSum.append(val.trim() + ", "));
		return last;
	}
};

generateTags = () => {
	let flag;
	let category = $(".nav-link.active").html();

	if(txtTags){
		txtTags.empty();
	}
	if (category == "CPU") flag = generateCpuTags();
	else if (category == "CASE") flag = generateCaseTags();
	else if (category == "FAN") flag = generateFanTags();
	else if (category == "RAM") flag = generateRamTags();
	else if (category == "COOLING") flag = generateCoolingTags();
	else if (category == "PSU") flag = generatePsuTags();
	else if (category == "GPU") flag = generateGpuTags();
	else if (category == "STORAGE") flag = generateStorageTags();
	else if (category == "MOBO") flag = generateMoboTags();
	else if (category == "TIERS") flag = generateTiersTags();
	else if (category == "SERIES") flag = generateSeriesTags();

	if (flag) {
	copyTagsToClipboard();
	showText("Copied to the clipboard, Ctrl+V to paste in Shopify");
	}
};
