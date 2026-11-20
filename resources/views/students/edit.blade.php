<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование студента</title>
</head>
<body>
<h2>Редактирование студента: {{ $student->name }}</h2>
<div class="form">
    <form action="{{ route('student.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- old() -возвращает предыдущие значение из сессии, если форма не прошла валидацию -->
        <input name="name" placeholder="Имя" value="{{old('name', $student->name)}}">
        @error('name')<span class="error">{{$message}} </span>  @enderror

        <input name="surname" placeholder="Фамилия" value="{{old('surname', $student->surname)}}">
        @error('surname')<span class="error">{{$message}} </span>  @enderror

        <input name="patronymic" placeholder="Отчество" value="{{old('patronymic', $student->patronymic)}}">
        @error('patronymic')<span class="error">{{$message}} </span>  @enderror

        <input name="birthday" type="date"  placeholder="Дата рождения" value="{{old('birthday', $student->birthday)}}">
        @error('birthday')<span class="error">{{$message}} </span>  @enderror

        <input type="number" name="group_id" placeholder="ID группы" value="{{ old('group_id', $student->group_id) }}">
        @error('group_id')<span class="error">{{ $message }}</span>@enderror

        <div>
            <input type="submit" value="Сохранить изменения">
            <a href="{{route('student.create')}}" class="btn-cancel">Отмена</a>
        </div>
    </form>
</div>
</body>
</html>
