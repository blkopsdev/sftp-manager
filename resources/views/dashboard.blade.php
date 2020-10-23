@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Sftp manager', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Files') }}</h4>
                            <p class="card-category">{{ __('Sftp file management') }}</p>
                        </div>
                        <div class="card-body ">
                            @include('alerts.success')
                            <div class="table-full-width">
                                <table class="table">
                                    <thead>
                                        <th>Name</th>
                                        <th>Path</th>
                                        <th>Date</th>
                                        <th>Size</th>
                                    </thead>
                                    <tbody>
                                        @if (count($files) > 0)
                                        @foreach ($files as $file)
                                        @if ($file['visibility'] == 'public')
                                        <tr>
                                            <td>{{ $file['basename'] }}</td>
                                            <td>{{ $file['dirname'] ? $file['dirname'] : '/' }}</td>
                                            <td>{{ $date->setTimestamp($file['timestamp'])->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $file['size'] }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                            
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <form action="{{ route('file_upload') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group col-md-5">
                                    <label for="file_upload">Upload file to server</label>
                                    <input type="file" class="form-control-file" name="file" id="file_upload">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();
        });
    </script>
@endpush