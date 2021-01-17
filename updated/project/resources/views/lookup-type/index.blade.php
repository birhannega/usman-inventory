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
                                {{ __('Lookup Type') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('lookup-types.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Description Am</th>
										<th>Description En</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lookupTypes as $lookupType)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $lookupType->description_am }}</td>
											<td>{{ $lookupType->description_en }}</td>

                                            <td>
                                                <form action="{{ route('lookup-types.destroy',$lookupType->ltId) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('lookup-types.show',$lookupType->ltId) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('lookup-types.edit',$lookupType->ltId) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $lookupTypes->links() !!}
            </div>
        </div>
    </div>
@endsection
