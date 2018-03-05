@extends($appType.'.Layouts.master')
@section('content')
    <div class="content">
        <div class="row">
            <h1><i class="glyphicon glyphicon-edit"></i> Task Description</h1>
            <hr>

            <div class="col-md-7">
                <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{$data->title}}" id="title" class="form-control" readonly>
                </div>
            </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="text" name="priority" value="{{$data->priority->priority}}" id="priority" class="form-control" readonly>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" value="{{$data->status->status}}" id="status" class="form-control" readonly>
                    </div>
                </div>

            <div class="col-md-7">
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="text" name="deadline" value="{{$data->deadline}}" id="deadline" class="form-control" readonly>
                </div>
            </div>

            <div class="col-md-7">
                 <div class="form-group">
                     <label for="attachment" >Attachement </label>
                     @if(!empty($data->attachment))
                             <a href={{url("download/".$data->id)}} >
                                 <button class="btn btn-success btn-sm" name="download">Download</button></a>
                         @endif
                 </div>
            </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" value="{{$data->description}}" id="description" class="form-control" readonly>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea rows="10" cols="5" readonly class="form-control">
                            {{$data->comment}}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection