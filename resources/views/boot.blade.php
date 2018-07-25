<!DOCTYPE html>
<html>
<head>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet"
          href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css')}}">
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js')}}"></script>
    <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js')}}"></script>
    <title>Модальное окно</title>
</head>
<body>
<div class="container">
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
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>
                    <button type="submit" class="btn btn-primary">Change</button>
                    <form action="{{route('store')}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
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
                            <input type="radio" name="status" value="opened"> Opened<Br>
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
</div>
</body>
</html>