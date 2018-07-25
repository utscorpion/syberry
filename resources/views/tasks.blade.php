<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Syberry</title>
    <meta name="description" content="Task fo Syberry" />

{{--  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">--}}
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<style>
       a {
       color: #96443c;
       text-decoration: none;
       }
    </style>
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


<label title="Add or update task" class="btnm" for="modal">Add +</label>
<div class="modal">
  <input class="modal-open" id="modal" type="checkbox" hidden>
  <div class="modal-wrap" aria-hidden="true" role="dialog">
    <label class="modal-overlay" for="modal-2"></label>
    <div class="modal-dialog">
      <div class="modal-header">
        <h2>Форма в Модальное окно! :)</h2>
        <label class="btn-close" for="modal" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
          <form>
	         <input name="name" placeholder="* Укажите ваше имя" class="textbox" required />
	         <input name="emailaddress" placeholder="* Укажите ваш Email" class="textbox" type="email" required />
             <textarea rows="4" cols="50" name="subject" placeholder="* Введите ваше сообщение:" class="message" required></textarea>
              <input name="submit" class="btn btn-form" type="submit" value="Отправить" />
          </form>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
