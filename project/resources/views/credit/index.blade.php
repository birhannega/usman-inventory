@extends('layout.master')

@section('template_title')
    Credit
@endsection

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
                                        
										<th>Creditfor</th>
										<th>Returned</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($credits as $credit)
                                        <tr>
                                            
											<td>{{ $credit->name.'  ('.$credit->trade_name.')' }}</td>
											<td class='text-capitalize'>{{ $credit->returned==0?'no':'Yes' }}</td>

                                            <td>
                                                <form action="{{ route('credits.destroy',$credit->credit_id) }}" method="POST">
                                                
                                                <a class="btn btn-sm btn-info " href="{{ route('credits.return',$credit->credit_id) }}"><i class="mdi mdi-keyboard-return"></i>Return</a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('credits.show',$credit->credit_id) }}"><i class="mdi mdi-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('credits.edit',$credit->credit_id) }}"><i class="mdi mdi-table-edit"></i> Edit</a>
                                                    {{ @csrf_field()}}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-forever"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $credits->links() !!}
            </div>
        </div>
    </div>
@endsection
