@extends('template')

@section('content')
	<form id="tagGeneratorForm" class="row g-3">
		<h2>TAG GENERATOR TOOL</h2>
		<div class="col-md-12">
			<div class="layout-container">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="cpu-tab" data-bs-toggle="tab" data-bs-target="#cpu" type="button" role="tab" aria-controls="cpu" aria-selected="true">CPU</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="case-tab" data-bs-toggle="tab" data-bs-target="#case" type="button" role="tab" aria-controls="case" aria-selected="false">CASE</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="mobo-tab" data-bs-toggle="tab" data-bs-target="#mobo" type="button" role="tab" aria-controls="mobo" aria-selected="false">MOBO</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="cooling-tab" data-bs-toggle="tab" data-bs-target="#cooling" type="button" role="tab" aria-controls="cooling" aria-selected="false">COOLING</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="fan-tab" data-bs-toggle="tab" data-bs-target="#fan" type="button" role="tab" aria-controls="fan" aria-selected="false">FAN</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="ram-tab" data-bs-toggle="tab" data-bs-target="#ram" type="button" role="tab" aria-controls="ram" aria-selected="false">RAM</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="storage-tab" data-bs-toggle="tab" data-bs-target="#storage" type="button" role="tab" aria-controls="storage" aria-selected="false">STORAGE</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="gpu-tab" data-bs-toggle="tab" data-bs-target="#gpu" type="button" role="tab" aria-controls="gpu" aria-selected="false">GPU</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="psu-tab" data-bs-toggle="tab" data-bs-target="#psu" type="button" role="tab" aria-controls="psu" aria-selected="false">PSU</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="tier-tab" data-bs-toggle="tab" data-bs-target="#tier" type="button" role="tab" aria-controls="tier" aria-selected="true">TIERS</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="serie-tab" data-bs-toggle="tab" data-bs-target="#serie" type="button" role="tab" aria-controls="serie" aria-selected="true">SERIES</button>
					</li>
				</ul>
				<div class="tab-content margin-top" id="myTabContent">
					<div class="tab-pane fade show active" id="cpu" role="tabpanel" aria-labelledby="cpu-tab">
						<div class="input-group mb-3">
							<span class="input-group-text">TDP</span>
							<input type="text" class="form-control cleareable number-validation" maxlength="4" id="input-cpu-tdp" aria-label="Amount" name="input-cpu-tdp">
							<span class="input-group-text">WATTS</span>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-cpu-family">Family</label>
							<select class="form-select" id="input-cpu-family" onchange="fillCpuSocketSeries(cmbCPUFamily, cmbCPUSocketSeries)">
								<option value="AMD">AMD</option>
								<option value="INTEL">INTEL</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-cpu-socket-series">Socket/Series</label>
							<select class="form-select" id="input-cpu-socket-series">
								<option value="">Select Socket</option>
								@foreach($cpu_family_socket_series_amd AS $cpu_amd )
									<option class="amd" value="{{$cpu_amd->cpu_family_socket_series}}">{{$cpu_amd->cpu_family_socket_series}}</option>
								@endforeach
								@foreach($cpu_family_socket_series_intel AS $cpu_intel )
									<option class="intel" value="{{$cpu_intel->cpu_family_socket_series}}">{{$cpu_intel->cpu_family_socket_series}}</option>
								@endforeach
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-cpu-fan-included">Includes FAN</label>
							<select class="form-select" id="input-cpu-fan-included">
								<option value="1">YES</option>
								<option value="0">NO</option>
							</select>
						</div>
					</div>
					<div class="tab-pane fade" id="case" role="tabpanel" aria-labelledby="case-tab">
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-case-gpu-slots">GPU Slots</label>
							<select class="form-select numeric-option" id="input-case-gpu-slots">
							</select>
						</div>
						<label for="input-case-radiator-slots" class="form-label">RADIATORS/FANS</label>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-case-radiator-slots">Slots</label>
							<select class="form-select numeric-option" id="input-case-radiator-slots">
							</select>
							<label class="input-group-text" for="input-case-radiator-type">Size</label>
							<select class="form-select" id="input-case-radiator-type">
								@foreach($radiator_sizes as $radiator_size)
									<option value="{{$radiator_size->radiator_sizes}}">{{$radiator_size->radiator_sizes}}</option>
								@endforeach
							</select>
							<div class="flex-container">
								<div class="btn btn-primary" onclick="addGenericTags(cmbCaseRadiatorSlots.val(),cmbCaseRadiatorType.val(),txtCaseRadiatorSummary,false,false)">add</div>
								<div class="btn btn-primary" onclick="addGenericTags(cmbCaseRadiatorSlots.val(),cmbCaseRadiatorType.val(),txtCaseRadiatorSummary,true,false)">or</div>
							</div>
							<label class="input-group-text" for="input-case-radiator-summary">Summary</label>
							<textarea class="form-control cleareable" aria-label="Summary" id="input-case-radiator-summary" readonly></textarea>
							<div class="btn btn-primary" onclick="removeGenericTag(txtCaseRadiatorSummary)">x</div>
						</div>
						<label class="form-label">FORM FACTOR</label>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-case-form-factor">Factor</label>
							<select class="form-select" id="input-case-form-factor">
									<option value="ALL">ALL</option>
								@foreach($form_factors as $form_factor)
									<option value="{{$form_factor->form_factors}}">{{$form_factor->form_factors}}</option>
								@endforeach
							</select>
							<div class="btn btn-primary" onclick="addSelectedTags(cmbCaseFormFactors, txtCaseFormFactorSummary)">+</div>
							<label class="input-group-text" for="input-case-form-factor-summary">Summary</label>
							<textarea class="form-control cleareable" aria-label="Summary" id="input-case-form-factor-summary" readonly></textarea>
							<div class="btn btn-primary" onclick="removeGenericTag(txtCaseFormFactorSummary)">x</div>
						</div>
						<label for="input-case-storage" class="form-label">STORAGE</label>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-case-storage-slots">Slots</label>
							<select class="form-select numeric-option" id="input-case-storage-slots">
							</select>
							<label class="input-group-text" for="input-case-storage-format">Format</label>
							<select class="form-select" id="input-case-storage-format">
								@foreach($storage_types_format as $storage_type_format)
								<option value="{{$storage_type_format->storage_types_format}}">{{$storage_type_format->storage_types_format}}</option>
								@endforeach
							</select>
							<div class="btn btn-primary" onclick="addGenericTags(cmbCaseStorageSlots.val(),cmbCaseStorageFormat.val(),txtCaseStorageSummary)">+</div>
							<label class="input-group-text" for="input-case-storage-summary">Summary</label>
							<textarea class="form-control cleareable" aria-label="Summary" id="input-case-storage-summary" readonly></textarea>
							<div class="btn btn-primary" onclick="removeGenericTag(txtCaseStorageSummary)">x</div>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-case-fan-included">Includes FANS</label>
							<select class="form-select" id="input-case-fan-included">
								<option value="1">YES</option>
								<option value="0">NO</option>
							</select>
						</div>
					</div>
					<div class="tab-pane fade" id="mobo" role="tabpanel" aria-labelledby="mobo-tab">
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-mobo-gpu-slots">GPU Slots</label>
							<select class="form-select numeric-option" id="input-mobo-gpu-slots">
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-mobo-form-factor">Factor</label>
							<select class="form-select" id="input-mobo-form-factor">
								@foreach($form_factors as $form_factor)
									<option value="{{$form_factor->form_factors}}">{{$form_factor->form_factors}}</option>
								@endforeach
							</select>
						</div>
						<label class="form-label">CPU SOCKET COMPATIBILITY</label>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-mobo-cpu-family">Family</label>
							<select class="form-select" id="input-mobo-cpu-family" onchange="fillCpuSocketSeries(cmbMoboCpuFamily)">
								<option value="AMD">AMD</option>
								<option value="INTEL">INTEL</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-mobo-cpu-socket-series">Socket/Series</label>
							<select class="form-select" id="input-mobo-cpu-socket-series">
								<option value="">Select Socket</option>
								@foreach($cpu_family_socket_series_amd AS $cpu_amd )
									<option class="amd" value="{{$cpu_amd->cpu_family_socket_series}}">{{$cpu_amd->cpu_family_socket_series}}</option>
								@endforeach
								@foreach($cpu_family_socket_series_intel AS $cpu_intel )
									<option class="intel" value="{{$cpu_intel->cpu_family_socket_series}}">{{$cpu_intel->cpu_family_socket_series}}</option>
								@endforeach
							</select>
							<div class="btn btn-primary" onclick="addSelectedTags(cmbMoboCpuFamily, txtMoboCpuSummary, cmbMoboCpuSocket)">+</div>
							<label class="input-group-text" for="input-mobo-cpu-summary">Summary</label>
							<textarea class="form-control cleareable" aria-label="Summary" id="input-mobo-cpu-summary" readonly></textarea>
							<div class="btn btn-primary" onclick="removeGenericTag(txtMoboCpuSummary)">x</div>
						</div>
						<label for="input-case-storage-slots" class="form-label">STORAGE</label>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-mobo-storage-slots">Slots</label>
							<select class="form-select numeric-option" id="input-mobo-storage-slots">
							</select>
							<label class="input-group-text" for="input-mobo-storage-type">Interface</label>
							<select class="form-select" id="input-mobo-storage-type">
								@foreach($storage_types_format as $storage_type_format)
									<option value="{{$storage_type_format->storage_types_format}}">{{$storage_type_format->storage_types_format}}</option>
								@endforeach
							</select>
							<div class="btn btn-primary" onclick="addGenericTags(cmbMoboStorageSlots.val(),cmbMoboStorageInterface.val(),txtMoboStorageSummary)">+</div>
							<label class="input-group-text" for="input-mobo-storage-summary">Summary</label>
							<textarea class="form-control cleareable" aria-label="Summary" id="input-mobo-storage-summary" readonly></textarea>
							<div class="btn btn-primary" onclick="removeGenericTag(txtMoboStorageSummary)">x</div>
						</div>
						<label for="input-case-radiator-slots" class="form-label">MEMORY</label>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-mobo-ram-slots">Slots</label>
							<select class="form-select numeric-option" id="input-mobo-ram-slots">
							</select>
							<label class="input-group-text" for="input-mobo-ram-capacity">Max capacity</label>
							<select class="form-select" id="input-mobo-ram-capacity">
								@foreach($ram_capacities as $ram_capacity)
									<option value="{{$ram_capacity->ram_capacity}}">{{$ram_capacity->ram_capacity}}</option>
								@endforeach
							</select>
							<span class="input-group-text">GB</span>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-mobo-ram-type">TYPE</label>
							<select class="form-select" id="input-mobo-ram-type">
								@foreach($ram_types as $ram_type)
								<option value="{{$ram_type->ram_types}}">{{$ram_type->ram_types}}</option>
								@endforeach
							</select>
							<label class="input-group-text" for="input-mobo-ram-speed">SPEED</label>
							<select class="form-select" id="input-mobo-ram-speed">
								@foreach($ram_type_speeds as $ram_type_speed)
								<option value="{{$ram_type_speed->ram_type_speeds}}">{{$ram_type_speed->ram_type_speeds}}</option>
								@endforeach
							</select>
							<div class="btn btn-primary" onclick="addSelectedTags(cmbMoboMemoryType,txtMoboMemorySummary,cmbMoboMemorySpeed)">+</div>
							<label class="input-group-text" for="input-mobo-ram-summary">Summary</label>
							<textarea class="form-control cleareable" aria-label="Summary" id="input-mobo-ram-summary" readonly></textarea>
							<div class="btn btn-primary" onclick="removeGenericTag(txtMoboMemorySummary)">x</div>
						</div>
					</div>
					<div class="tab-pane fade" id="cooling" role="tabpanel" aria-labelledby="cooling-tab">
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-cooling-type">Type</label>
							<select class="form-select" id="input-cooling-type">
								@foreach($cooling_types as $cooling_type)
								<option value="{{$cooling_type->cooling_types}}">{{$cooling_type->cooling_types}}</option>
								@endforeach
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-cooling-size">Size</label>
							<select class="form-select" id="input-cooling-size">
								@foreach($radiator_sizes as $radiator_size)
									<option value="{{$radiator_size->radiator_sizes}}">{{$radiator_size->radiator_sizes}}</option>
								@endforeach
							</select>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text">Cooling TDP</span>
							<input type="text" class="form-control cleareable number-validation" maxlength="4" aria-label="Amount" id="input-cooling-tdp">
							<span class="input-group-text">WATTS</span>
						</div>
						<label class="form-label">CPU SOCKET COMPATIBILITY</label>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-cooling-cpu-family">Family</label>
							<select class="form-select" id="input-cooling-cpu-family" onchange="fillCpuSocketSeries(cmbCoolingCpuFamily)">
								<option value="AMD">AMD</option>
								<option value="INTEL">INTEL</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-cooling-cpu-socket-series">Socket/Series</label>
							<select class="form-select" id="input-cooling-cpu-socket-series">
								<option value="">Select Socket</option>
								@foreach($cpu_family_socket_series_amd AS $cpu_amd )
									<option class="amd" value="{{$cpu_amd->cpu_family_socket_series}}">{{$cpu_amd->cpu_family_socket_series}}</option>
								@endforeach
								@foreach($cpu_family_socket_series_intel AS $cpu_intel )
									<option class="intel" value="{{$cpu_intel->cpu_family_socket_series}}">{{$cpu_intel->cpu_family_socket_series}}</option>
								@endforeach
							</select>
							<div class="btn btn-primary" onclick="addSelectedTags(cmbCoolingCpuFamily, txtCoolingCpuSummary, cmbCoolingCpuSocket)">+</div>
							<label class="input-group-text" for="input-cooling-cpu-summary">Summary</label>
							<textarea class="form-control cleareable" aria-label="Summary" id="input-cooling-cpu-summary" readonly></textarea>
							<div class="btn btn-primary" onclick="removeGenericTag(txtCoolingCpuSummary)">x</div>
						</div>
					</div>
					<div class="tab-pane fade" id="fan" role="tabpanel" aria-labelledby="fan-tab">
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-fan-slots">Slots</label>
							<select class="form-select numeric-option" id="input-fan-slots">
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-fan-type">Size</label>
							<select class="form-select" id="input-fan-type">
								@foreach($fan_types as $fan_type)
								<option value="{{$fan_type->fan_types}}">{{$fan_type->fan_types}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="tab-pane fade" id="ram" role="tabpanel" aria-labelledby="ram-tab">
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-ram-type">TYPE</label>
							<select class="form-select" id="input-ram-type">
								@foreach($ram_types as $ram_type)
								<option value="{{$ram_type->ram_types}}">{{$ram_type->ram_types}}</option>
								@endforeach
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-ram-speed">SPEED</label>
							<select class="form-select" id="input-ram-speed">
								@foreach($ram_type_speeds as $ram_type_speed)
								<option value="{{$ram_type_speed->ram_type_speeds}}">{{$ram_type_speed->ram_type_speeds}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="tab-pane fade" id="storage" role="tabpanel" aria-labelledby="storage-tab">
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-storage-type">INTERFACE</label>
							<select class="form-select" id="input-storage-type" onchange="fillStorageOptions()">
								<option value="SATA">SATA</option>
								<option value="M.2">M.2</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-storage-format">FORMAT</label>
							<select class="form-select" id="input-storage-format" required>
								<option value="">Select Storage Format</option>
								@foreach($storage_types_format as $storage_type_format)
									<option class="{{($storage_type_format->m2==1)? 'm2':'sata'}}" value="{{$storage_type_format->storage_types_format}}">{{$storage_type_format->storage_types_format}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="tab-pane fade" id="gpu" role="tabpanel" aria-labelledby="gpu-tab">
						<div class="input-group mb-3">
							<span class="input-group-text">TDP</span>
							<input type="text" class="form-control cleareable number-validation" maxlength="4" id="input-gpu-tdp" aria-label="Amount">
							<span class="input-group-text">WATTS</span>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-gpu-slots">GPU Slots</label>
							<select class="form-select numeric-option" id="input-gpu-slots">
							</select>
						</div>
						<label class="form-label">FORM FACTOR COMPATIBILITY</label>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-gpu-form-factor">Factor</label>
							<select class="form-select" id="input-gpu-form-factor">
								<option value="ALL">ALL</option>
								@foreach($form_factors as $form_factor)
									<option value="{{$form_factor->form_factors}}">{{$form_factor->form_factors}}</option>
								@endforeach
							</select>
							<div class="btn btn-primary" onclick="addSelectedTags(cmbGpuFormFactors, txtGpuFormFactorSummary)">+</div>
							<label class="input-group-text" for="input-gpu-form-factor-summary">Summary</label>
							<textarea class="form-control cleareable" aria-label="Summary" id="input-gpu-form-factor-summary" readonly></textarea>
							<div class="btn btn-primary" onclick="removeGenericTag(txtGpuFormFactorSummary)">x</div>
						</div>
					</div>
					<div class="tab-pane fade" id="psu" role="tabpanel" aria-labelledby="psu-tab">
						<div class="input-group mb-3">
							<span class="input-group-text">TDP</span>
							<input type="text" class="form-control cleareable number-validation" maxlength="4" id="input-psu-tdp" aria-label="Amount">
							<span class="input-group-text">WATTS</span>
						</div>
					</div>
					<div class="tab-pane fade" id="tier" role="tabpanel" aria-labelledby="tier-tab">
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-tier">TIER</label>
							<select class="form-select" id="input-tier">
								@foreach($tiers as $tier)
									<option value="{{$tier->tiers}}">{{$tier->tiers}}</option>
								@endforeach
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-tier-qty">QTY</label>
							<select class="form-select numeric-option" id="input-tier-qty">
							</select>
						</div>
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-tier-variant">VARIANT</label>
							<select class="form-select numeric-option" id="input-tier-variant">
							</select>
						</div>
					</div>
					<div class="tab-pane fade" id="serie" role="tabpanel" aria-labelledby="serie-tab">
						<div class="input-group mb-3">
							<label class="input-group-text" for="input-serie">SERIE</label>
							<select class="form-select" id="input-serie">
								@foreach($series as $serie)
									<option value="{{$serie->series}}">{{$serie->series}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 center generateTagField">
			<div class="btn btn-primary" onclick="generateTags()">Generate Tags</div>
		</div>
		<div class="col-12 input-group margin-top generateTagField">
			<span class="input-group-text">Tags</span>
			<textarea class="form-control" aria-label="Tags" id="txt-tags"></textarea>
		</div>
		<div aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">
			<div class="toast">
				<div class="toast-body center">
				</div>
			</div>
		</div>
	</form>
	<script src="{{asset('js/generatetag.js')}}" crossorigin="anonymous"></script>
	<script src="{{asset('js/engine.js')}}" crossorigin="anonymous"></script>
	<script src="{{asset('js/ui-variables.js')}}" crossorigin="anonymous"></script>
	<script src="{{asset('js/ui.js')}}" crossorigin="anonymous"></script>
	<script src="{{asset('js/tag-suffix.js')}}" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			initUI();
		});
	</script>
@endsection