<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"
          href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css')}}">
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js')}}"></script>
    <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js')}}"></script>
    <title>Модальное окно</title>
</head>
<body>
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bd-example">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLive">
            Add +
        </button>
    </div>
    <div>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <td># Task</td>
                <td>Title</td>
                <td>Description</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @if(isset($tasks))
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task['id']}}</td>
                        <td>{{$task['title']}}</td>
                        <td>{{$task['description']}}</td>
                        <td>{{$task['status']}}</td>
                        <td>
                            <form action="{{route('show', array('id' => $task['id']))}}" method="GET">
                                <button type="submit" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalUpdate">
                                    Change
                                </button>
                            </form>

                            <form action="{{route('destroy', array('id' => $task['id']))}}" method="POST">
                                @method('DELETE')
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-danger" data-toggle="confirmation">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Add a new task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('store')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="title">Title</label>
                        <div><input type="text" name="title" value=""></div>
                        <label for="description">Description</label>
                        <div><input type="text" name="description" value=""></div>
                        <label for="status">Status</label>
                        <div>
                            <input type="radio" name="status" value="opened" checked> Opened<Br>
                            <input type="radio" name="status" value="closed"> Closed
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    @if(isset($taskUpdate))
        <div id="exampleModalLive" class="modal fade show" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLiveLabel"
             aria-hidden="true" style="display: block; opacity: 1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Change choosen task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('update', array('id' => $taskUpdate['id']))}}">
                            @method('PATCH')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <label for="title">Title</label>
                            <div><input type="text" name="title" value="{{$taskUpdate['title']}}"></div>
                            <label for="description">Description</label>
                            <div><input type="text" name="description" value="{{$taskUpdate['description']}}"></div>
                            <label for="status">Status</label>
                            <div>
                                <input type="radio" name="status" value="opened" checked> Opened<Br>
                                <input type="radio" name="status" value="closed"> Closed
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{route('index')}}">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    @endif

</div>

</body>
</html>