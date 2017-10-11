@extends('layout.master')

@section('title', 'Home')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h2>Paste domains in the box or upload a csv file </h2>
            <form id="domainForm" action="" method="post">
                {{ csrf_field() }}
                <div class="form">
                    <div class="form-group">
                        <label for="txtarea"></label>
                        <textarea name="txtarea" rows="10" id="txtarea" class="form-control form-control-lg" placeholder="Paste domains here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ifile">Upload a file</label>
                        <input id="ifile" class="form-conthrol" type="file">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <button id="go" class="form-control btn btn-success" type="submit">Process</button>
                    </div>
                </div>
            </form>
            <div id="progressBar">
                
            </div>
            <div id="displayResult">
                <table class="table table-responsive table-striped table-center">
                    <thead>Processed Results</thead>
                    <tr>
                        <th>S/N</th>
                        <th>domain</th>
                        <th>date archived</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection