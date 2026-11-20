<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupsCreateRequest;
use App\Http\Requests\GroupsUpdateRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    // ГРУППЫ
    public function index(){

        $groups = Group::all();
        // Возвращаем представление groups.create
        // compact('groups') - передает переменную $groups в шаблон Blade
        return view('groups.create', compact('groups'));
    }
    public function store(GroupsCreateRequest $request){
        // создаем группу - и валидируем его
        Group::create($request->validated());

        // после успешного создания перенаправляем на страницу списка
        return redirect()->route('group.create')
            ->with('success', 'Groups created successfully.');

    }
    // Передаем модель Group -  и передаем готовый объект $group
    public function edit(Group $group){
        // возвращает представление в папке users под названием edit
        return view('groups.edit', compact('group'));
    }
    public function update(GroupsUpdateRequest $request, Group $group){
        $group->update($request->validated());
        return redirect()->route('group.create')->with('success', 'Группа успешно обновлена');
    }
    public function destroy(Group $group){
        // Метод
        $group->delete();
        return redirect()->route('group.create')->with('success', 'Группа успешно удалена');
    }
}
