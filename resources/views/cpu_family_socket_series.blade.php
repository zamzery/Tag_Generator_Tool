@extends('template')

@section('content')
	<div class="row">
		<div class="form-group col-lg-12 col-md-12 col-xs-12">
			<h4>CPU SOCKET SERIES</h4>
			<table id="tblSocket" width="100%" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
				<thead class="thead-dark">
					<tr class="table-dark">
						<th style="display:none;">#</th>
						<th>CPU</th>
						<th>SOCKET</th>
						<th style="width:50px;"></th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($cpu_family_socket_series as $cpu)
					<tr>
						<td style="display:none;">{{$i++}}</td>
						<td style="color:{{($cpu->amd==1)? "orange" : "blue"}};font-weight:bold;">{{($cpu->amd==1)? "AMD" : "INTEL"}}</td>
						<td>{{$cpu->cpu_family_socket_series}}</td>
						<td>
							<a href="{{ url('cpu_family_socket_series',[$cpu]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
						</td>
						<td>
							<form method="POST" action="{{ url('cpu_family_socket_series',[$cpu]) }}">
								@method('delete')
								@csrf
								<button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th style="display:none;">#</th>
						<th>CPU</th>
						<th>SOCKET</th>
						<th style="width:50px;"></th>
						<th style="width:50px;"></th>
					</tr>
				</tfoot>
			</table>
			<button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalNewTagCpu"><i class="fa-solid fa-circle-plus"></i> Add New Tags</button>
		</div>
	</div>

	<div class="modal fade" id="modalNewTagCpu" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">NEW SOCKET TAG</h5>
					<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form id="formTag" method="POST" action="{{ url('cpu_family_socket_series') }}">
						@csrf
						<div class="input-group mb-3">
							<div class="form-check form-check-inline">
								<input type="hidden" name="amd" id="amd" value="1" checked>
								<input class="form-check-input" type="radio" name="socketCheck" id="amdCheck" onclick="changeCpu('amd')" checked>
								<label class="form-check-label" for="amd">AMD</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="hidden" name="intel" id="intel" value="0" checked>
								<input class="form-check-input" type="radio" name="socketCheck" id="intelCheck" onclick="changeCpu('intel');">
								<label class="form-check-label" for="intel">INTEL</label>
							</div>
						</div>
						<div class="form-group">
							<label for="socket">SOCKET</label>
							<input type="text" class="form-control" id="cpu_family_socket_series" name="cpu_family_socket_series" placeholder="Enter Socket" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" form="formTag"><i class="fa fa-solid fa-floppy-disk"></i> Save</button>
				</div>
			</div>
		</div>
	</div>

@endsection