@extends('layouts.app')

@section('template_title')
    Transfer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Transfer') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('transfers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Title</th>
										<th>Sender Method Id</th>
										<th>Receiver Method Id</th>
										<th>Sended Amount</th>
										<th>Received Amount</th>
										<th>Reference</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transfers as $transfer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $transfer->title }}</td>
											<td>{{ $transfer->sender_method_id }}</td>
											<td>{{ $transfer->receiver_method_id }}</td>
											<td>{{ $transfer->sended_amount }}</td>
											<td>{{ $transfer->received_amount }}</td>
											<td>{{ $transfer->reference }}</td>

                                            <td>
                                                <form action="{{ route('transfers.destroy',$transfer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('transfers.show',$transfer->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('transfers.edit',$transfer->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
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
                {!! $transfers->links() !!}
            </div>
        </div>
    </div>
@endsection
