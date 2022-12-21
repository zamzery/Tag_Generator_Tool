@extends('template')

@section('content')
	<div class="row mt-3">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header bg-dark text-white">
					<h4 class="card-title">CPU SOCKET SERIES</h4>
				</div>
				<div class="card-body">
					<form id="formTag" method="POST" action="{{ url('cpu_family_socket_series',[$cpu_family_socket_series]) }}">
						@method('PUT')
						@csrf
						<div class="input-group mb-3">
							<div class="form-check form-check-inline">
								<input type="hidden" name="amd" id="amd" value="{{$cpu_family_socket_series->amd}}" checked>
								<input class="form-check-input" type="radio" name="socketCheck" id="amdCheck" onclick="changeCpu('amd')" {{($cpu_family_socket_series->amd==1)? 'checked' : ''}}>
								<label class="form-check-label" for="amd">AMD</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="hidden" name="intel" id="intel" value="{{$cpu_family_socket_series->intel}}" checked>
								<input class="form-check-input" type="radio" name="socketCheck" id="intelCheck" onclick="changeCpu('intel');" {{($cpu_family_socket_series->intel==1)? 'checked' : ''}}>
								<label class="form-check-label" for="intel">INTEL</label>
							</div>
						</div>
						<div class="form-group">
							<label for="cpu_family_socket_series">SOCKET</label>
							<input type="text" class="form-control" id="cpu_family_socket_series" name="cpu_family_socket_series" placeholder="Enter Socket" value="{{$cpu_family_socket_series->cpu_family_socket_series}}" required>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<a type="button" class="btn btn-danger" href="{{ url()->previous() }}"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
					<button type="submit" class="btn btn-primary" form="formTag"><i class="fa fa-solid fa-floppy-disk"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
@endsection