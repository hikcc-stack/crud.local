<?php

namespace App\Http\Controllers;

// Подключаем модель User
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        // Возвращаем представление users.index
        // compact('users') - передает переменную $users в шаблон Blade
        return view('users.index', compact('users'));
    }

    // UsersCreateRequest - объект запроса с автоматической валидацией
    public function store(UsersCreateRequest $request){
        // создаем пользователя - и валидируем его
        User::create($request->validated());

        // после успешного создания перенаправляем на страницу списка
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }
    // более громоздкий вариант, без использования Request (приходится  каждое поле валидировать и отправлять вручную от метода до метода)
    /*
    public function store(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->patronymic = $request->input('patronymic');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id', 1);
        $user->save();
        return redirect()->route('users.index');
    }
    */
    // Передаем модель User -  и передаем готовый объект $user
    public function edit(User $user){
        // возвращает представление в папке users под названием edit
        return view('users.edit', compact('user'));
    }
    public function update(UsersUpdateRequest $request, User $user){
        $user->update($request->validated());
        return redirect()->route('users.index')->with('success', 'Пользователь успешно обновлен');
    }
    public function destroy(User $user){
        // Метод
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Пользователь успешно удален');
    }
}
