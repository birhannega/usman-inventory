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
                                {{ __('Provider') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('providers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name</th>
										<th>Description</th>
										<th>Paymentinfo</th>
										<th>Email</th>
										<th>Phone</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $provider->name }}</td>
											<td>{{ $provider->description }}</td>
											<td>{{ $provider->paymentinfo }}</td>
											<td>{{ $provider->email }}</td>
											<td>{{ $provider->phone }}</td>

                                            <td>
                                                <form action="{{ route('providers.destroy',$provider->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('providers.show',$provider->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('providers.edit',$provider->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    {{ @csrf_field()}}
                                                   {{-- {{@method('DELETE')}}  --}}
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
                {!! $providers->links() !!}
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush