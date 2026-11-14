<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Редактирование пользователя: {{ $user->name }}</h2>
    <div class="form">
        <form action="{{route('users.update', $user)}}" method="POST">
            @csrf
            @method('PUT')

            <input name="name" placeholder="Имя" value="{{old('name'), $user->name}}">
            @error('name')<span class="error">{{$message}}</span>  @enderror

            <input name="surname" placeholder="Фамилия" value="{{old('surname'), $user->name}}">
            @error('surname')<span class="error">{{$message}}</span>  @enderror

            <input name="patronymic" placeholder="Отчество" value="{{old('patronymic'), $user->name}}">
            @error('patronymic')<span class="error">{{$message}}</span>  @enderror

            <input name="email" placeholder="Электронная почта" value="{{old('email'), $user->name}}">
            @error('email')<span class="error">{{$message}}</span>  @enderror

            <input name="role_id" placeholder="ID роли" value="{{old('role_id'), $user->name}}">
            @error('role_id')<span class="error">{{$message}}</span>  @enderror


            <div>
                <input type="submit" value="Сохранить изменения">
                <a href="{{route('users.index')}}" class="btn-cancel">Отмена</a>
            </div>
        </form>
    </div>
</body>
</html>
