@extends('template')

@section('content')
	<div class="row">
		<div class="form-group col-lg-12 col-md-12 col-xs-12">
			<h4>STORAGE TYPES FORMAT</h4>
			<table id="tblSocket" width="100%" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
				<thead class="thead-dark">
					<tr class="table-dark">
						<th style="display:none;">#</th>
						<th>TYPE FORMAT</th>
						<th>STORAGE</th>
						<th style="width:50px;"></th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($storage_types_format as $storage)
					<tr>
						<td style="display:none;">{{$i++}}</td>
						<td style="color:{{($storage->sata==1)? "orange" : "blue"}};font-weight:bold;">{{($storage->sata==1)? "SATA" : "M.2"}}</td>
						<td>{{$storage->storage_types_format}}</td>
						<td>
							<a href="{{ url('storage_types_format',[$storage]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
						</td>
						<td>
							<form method="POST" action="{{ url('storage_types_format',[$storage]) }}">
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
						<th>TYPE FORMAT</th>
						<th>STORAGE</th>
						<th style="width:50px;"></th>
						<th style="width:50px;"></th>
					</tr>
				</tfoot>
			</table>
			<button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalNewTagStorage"><i class="fa-solid fa-circle-plus"></i> Add New Tags</button>
		</div>
	</div>

	<div class="modal fade" id="modalNewTagStorage" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">NEW STORAGE TYPE FORMAT TAG</h5>
					<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form id="formTag" method="POST" action="{{ url('storage_types_format') }}">
						@csrf
						<div class="input-group mb-3">
							<div class="form-check form-check-inline">
								<input type="hidden" name="sata" id="sata" value="1" checked>
								<input class="form-check-input" type="radio" name="storageCheck" id="sataCheck" onclick="changeStorage('sata')" checked>
								<label class="form-check-label" for="sataCheck">SATA</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="hidden" name="m2" id="m2" value="0" checked>
								<input class="form-check-input" type="radio" name="storageCheck" id="m2Check" onclick="changeStorage('m2');">
								<label class="form-check-label" for="m2Check">M.2</label>
							</div>
						</div>
						<div class="form-group">
							<label for="socket">STORAGE TYPE FORMAT</label>
							<input type="text" class="form-control" id="storage_types_format" name="storage_types_format" placeholder="Enter Storage Type Format" required>
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