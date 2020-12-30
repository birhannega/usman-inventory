@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Credit') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('credits.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                <i class="mdi mdi-add-circle"></i>   {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <span class='pt-2 pl-2 pr-2'>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    </span>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>To</th>
										<th>Item Code</th>
										<th>Amount</th>
										<th>Unit price</th>
										<th>Total price</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($credits as $credit)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $credit->creditFor }}</td>
											<td>{{ $credit->item_code }}</td>
											<td>{{ $credit->amount }}</td>
											<td>{{ $credit->unitPrice }}</td>
											<td>{{ $credit->totalprice }}</td>

                                            <td>
                                                <form action="{{ route('credits.destroy',$credit->credit_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('credits.show',$credit->credit_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('credits.edit',$credit->credit_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                <div class="pt-4">
    {!! $credits->links("pagination::bootstrap-4") !!}
</div>
            </div>
        </div>
    </div>
@endsection
