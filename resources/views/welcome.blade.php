@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline" style="justify-content: space-between;" enctype="multipart/form-data" method="POST" action="{{route('upload')}}">
                            @csrf
                            <div class="form-group">
                                <label for="file" class="sr-only">Email</label>
                                <input type="file" class="form-control-plaintext" name="csv" id="csv" accept=".csv">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload File</button>
                        </form>
                    </div>
                </div>
                <br />
                <br />
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">File Name</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($storage as $d)
                                <tr>
                                    <td>{{$d->updated_at}}</td>
                                    <td>{{$d->path}}</td>
                                    <td>{{($d->processed == 0 ) ? 'Processing Upload' : 'Import Success'}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection