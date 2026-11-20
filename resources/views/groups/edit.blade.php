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
<h2>Редактирование группы: {{ $group->name }}</h2>
<div class="form">
    <form action="{{ route('group.update', $group) }}" method="POST">
    @csrf
        @method('PUT')

        <!-- old() -возвращает предыдущие значение из сессии, если форма не прошла валидацию -->
        <input name="name" placeholder="Название" value="{{old('name', $group->name)}}">
        @error('name')<span class="error">{{$message}} </span>  @enderror

        <input name="profession" placeholder="Профессия" value="{{old('profession', $group->profession)}}">
        @error('profession')<span class="error">{{$message}} </span>  @enderror

        <input name="count_students" placeholder="Количество студентов" value="{{old('count_students', $group->count_students)}}">
        @error('count_students')<span class="error">{{$message}} </span>  @enderror

        <div>
            <input type="submit" value="Сохранить изменения">
            <a href="{{route('group.create')}}" class="btn-cancel">Отмена</a>
        </div>
    </form>
</div>
</body>
</html>
