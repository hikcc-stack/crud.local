<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('index.css')}}">
    <title>Создание группы</title>
</head>
<body>
<table>
    <h2>Создание группы</h2>
    <div class="form">
        <form action="{{route('group.store')}}" method="POST">
            @csrf
            <!-- old() -возвращает предыдущие значение из сессии, если форма не прошла валидацию -->
            <input name="name" placeholder="Название" value="{{old('name')}}">
            @error('name')<span class="error">{{$message}} </span>  @enderror

            <input name="profession" placeholder="Профессия" value="{{old('profession')}}">
            @error('profession')<span class="error">{{$message}} </span>  @enderror

            <input name="count_students" placeholder="Количество студентов" value="{{old('count_students', 25)}}">
            @error('count_students')<span class="error">{{$message}} </span>  @enderror

            <input type="submit" value="Создать">
        </form>
    </div>
</table>

<h2>Список групп</h2>
<table class="users-info">
    <thead>
    <tr>
        <th>Название(номер)</th>
        <th>Профессия</th>
        <th>Количество студентов</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($groups as $group)
        <tr>
            <td>{{ $group->name }}</td>
            <td>{{ $group->profession }}</td>
            <td>{{ $group->count_students ?? '-' }}</td>
            <td class="actions">
                <!-- Кнопка редактирования -->
                <a href="{{route('group.edit', $group)}}" class="btn-edit">Изменить</a>

                <!-- Кнопка удаления -->
                <form action="{{route('group.destroy', $group)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" onclick="return confirm('Вы уверены что хотите удалить данную группу')">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
