<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('index.css')}}">
    <title>Создание предмета</title>
</head>
<body>
<table>
    <h2>Создание предмета</h2>
    <div class="form">
        <form action="{{route('subject.store')}}" method="POST">
            @csrf

            <input name="name" placeholder="Название" value="{{old('name')}}">
            @error('name')<span class="error">{{$message}} </span>  @enderror

            <input name="description" placeholder="Описание" value="{{old('description')}}">
            @error('description')<span class="error">{{$message}} </span>  @enderror

            <input name="hours" placeholder="Часы" value="{{old('hours')}}">
            @error('hours')<span class="error">{{$message}} </span>  @enderror

            <input type="submit" value="Создать">
        </form>
    </div>
</table>

<h2>Список предметов</h2>
<table class="users-info">
    <thead>
    <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Часы</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->description }}</td>
            <td>{{ $subject->hours }}</td>
            <td class="actions">
                <!-- Кнопка редактирования -->
                <a href="{{route('subject.edit', $subject)}}" class="btn-edit">Изменить</a>

                <!-- Кнопка удаления -->
                <form action="{{route('subject.destroy', $subject)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" onclick="return confirm('Вы уверены что хотите удалить данный пердмет')">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

