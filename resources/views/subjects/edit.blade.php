<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование предмета</title>
</head>
<body>
<h2>Редактирование предмета: {{ $subject->name }}</h2>
<div class="form">
    <form action="{{ route('subject.update', $subject) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- old() -возвращает предыдущие значение из сессии, если форма не прошла валидацию -->
        <input name="name" placeholder="Название" value="{{old('name', $subject->name)}}">
        @error('name')<span class="error">{{$message}} </span>  @enderror

        <input name="description" placeholder="Описание" value="{{old('description', $subject->description)}}">
        @error('description')<span class="error">{{$message}} </span>  @enderror

        <input name="hours" placeholder="Количество часов" value="{{old('hours', $subject->hours)}}">
        @error('hours')<span class="error">{{$message}} </span>  @enderror

        <div>
            <input type="submit" value="Сохранить изменения">
            <a href="{{route('subject.create')}}" class="btn-cancel">Отмена</a>
        </div>
    </form>
</div>
</body>
</html>

