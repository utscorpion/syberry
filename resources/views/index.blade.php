<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/cssmodal.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <td># Task</td>
            <td>Title</td>
            <td>Description</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>
                <button type="button" class="btn btn-primary">Change</button>
                <a href="{{asset('api/v1/tasks')}}"><button type="button" class="btn btn-danger" >Delete</button></a>
            </td>
        </tr>
        </tbody>
    </table>
    <button class="newDraw btn btn-success">Add +</button>
</div>

<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"></button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Название модали</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/new.draw.js')}}" defer></script>
<script src="{{asset('js/bootstrap.js')}}" defer></script>
</body>
</html>