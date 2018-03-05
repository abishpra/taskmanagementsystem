@extends($appType.'.Layouts.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="glyphicon glyphicon-folder-close"></i> Create Pool Task</h1>
            <hr>
            @include($appType.'.Include.validation')
            <div class="row">
                <form action="{{route('pool')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group" >
                            <label for="date">Deadline</label>
                            <input type="date" name="deadline" id="deadline" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <select name="priority" id="priority" class="form-control">
                                @foreach($priorityData as $data)
                                    <option value="{{$data->id}}" >{{$data->priority}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                @foreach($statusData as $data)
                                    @if($data->id=='3')
                                        <option value="{{$data->id}}" >{{$data->status}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="att">Attachment</label>
                            <input type="file" name="att" id="att" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea cols="20" rows="5" name="description" id="desc" class="form-control">
                                </textarea>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="cmt">Comment</label>
                            <textarea cols="10" rows="5" name="comment" id="cmt" class="form-control">
                                </textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="glyphicon glyphicon-plus">Submit</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection