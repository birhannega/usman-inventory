@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proforma') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('proformas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th> To</th>
										<th> Date</th>
										<th>Ref Number</th>
										<th> Valid For</th>
										<th> Before Vat</th>
										<th> Delivery Date</th>
										<th> Total</th>
										<th> Grand Total</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proformas as $proforma)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proforma->p_to }}</td>
											<td>{{ $proforma->p_date }}</td>
											<td>{{ $proforma->ref_number }}</td>
											<td>{{ $proforma->p_valid_for }}</td>
											<td>{{ $proforma->p_before_vat }}</td>
											<td>{{ $proforma->p_delivery_date }}</td>
											<td>{{ $proforma->p_total }}</td>
											<td>{{ $proforma->p_grand_total }}</td>
										

                                            <td>
                                                <form action="{{ route('proformas.destroy',$proforma->p_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('proformas.show',$proforma->p_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('proformas.edit',$proforma->p_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    {{@csrf_field()}}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $proformas->links("pagination::bootstrap-4") !!}
            </div>
        </div>
    </div>
@endsection
