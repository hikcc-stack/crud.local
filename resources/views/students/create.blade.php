<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('index.css')}}">
    <title>Создание студента</title>
</head>
<body>
<table>
    <h2>Создание студента</h2>
    <div class="form">
        <form action="{{route('student.store')}}" method="POST">
            @csrf

            <input name="name" placeholder="Имя" value="{{old('name')}}">
            @error('name')<span class="error">{{$message}} </span>  @enderror

            <input name="surname" placeholder="Фамилия" value="{{old('surname')}}">
            @error('surname')<span class="error">{{$message}} </span>  @enderror

            <input name="patronymic" placeholder="Отчество" value="{{old('patronymic')}}">
            @error('patronymic')<span class="error">{{$message}} </span>  @enderror

            <input name="birthday" type="date" placeholder="Дата рождения" value="{{old('birthday')}}">
            @error('birthday')<span class="error">{{$message}} </span>  @enderror

            <input name="group_id" placeholder="ID группы" value="{{old('group_id', 1)}}">
            @error('group_id')<span class="error">{{$message}} </span>  @enderror

            <input type="submit" value="Создать">
        </form>
    </div>
</table>

<h2>Список студентов</h2>
<table class="users-info">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Отчество</th>
        <th>Дата рождения</th>
        <th>Id группы</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $student->patronymic ?? '-' }}</td>
            <td>{{ $student->birthday }}</td>
            <td>{{ $student->group_id }}</td>
            <td class="actions">
                <!-- Кнопка редактирования -->
                <a href="{{route('student.edit', $student)}}" class="btn-edit">Изменить</a>

                <!-- Кнопка удаления -->
                <form action="{{route('student.destroy', $student)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" onclick="return confirm('Вы уверены что хотите удалить данного студента')">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

