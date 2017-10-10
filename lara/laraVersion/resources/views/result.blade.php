@extends('layout.master')

@section('title', 'Results')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h2>Results</h2>
            
            <div id="progressBar">
                
            </div>
            <div id="dispjulayResult">
                <table class="table table-responsive table-striped table-center">
                    <thead>Processed Results</thead>
                    <tr>
                        <th>S/N</th>
                        <th>domain</th>
                        <th>Last archived date/time (YYYY-MM-DD, HH:MM:SS)</th>
                    </tr>
                    @foreach ($response as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row['domain'] }}</td>
                            <td>{{ $row['archived'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection