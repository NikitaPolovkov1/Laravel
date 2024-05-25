<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\House;
use App\Models\Lead;
use App\Models\Post;
use App\Models\Service;
use App\Models\ServiceLead;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {

        $houses = House::all();
        $leads = Lead::orderby('created_at', 'desc')->take(5)->get();

        $serviceleads = ServiceLead::orderby('created_at', 'desc')->take(5)->get();
        return view('admin.dashboard',  compact('leads', 'houses', 'serviceleads'));
    }


    public function houses()
    {
        $houses = House::all();
        return view('admin.houses',  compact( 'houses'));
    }

    public function addhouse(){

        $files = Storage::disk('public')->files('admin');

        // Вернуть представление с файлами
        return view('admin.addhouse', ['files' => $files]);
    }


    public function addevent(){

        $files = Storage::disk('public')->files('admin');

        // Вернуть представление с файлами
        return view('admin.addevent', ['files' => $files]);
    }

    public function storeHouse(Request $request){
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_at_day' => 'required|numeric',
            'attributes' => 'required|json',
            'images' => 'required|string',
            'long_description' => 'nullable|string',
        ]);

        // Пример сохранения данных (предполагается, что у вас есть модель House)
        $house = new House();
        $house->name = $request->input('name');
        $house->description = $request->input('description');
        $house->price_at_day = $request->input('price_at_day');
        $house->attributes = $request->input('attributes');
        $house->images = $request->input('images');
        $house->long_description = $request->input('long_description');
        $house->save();

        return redirect()->back()->with('success', 'Дом успешно создан!');
    }

    public function storeHouseEdit(Request $request,  $id){
// Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_at_day' => 'required|numeric',
            'attributes' => 'required|json',
            'images' => 'required|string',
            'long_description' => 'nullable|string',
        ]);

        // Найти дом для обновления
        $house = House::where('houseID', $id)->first();


        // Проверить, найден ли дом
        if(!$house){
            return redirect()->back()->with('error', 'Дом не найден!');
        }

        // Обновить данные дома
        $house->name = $request->input('name');
        $house->description = $request->input('description');
        $house->price_at_day = $request->input('price_at_day');
        $house->attributes = $request->input('attributes');
        $house->images = $request->input('images');
        $house->long_description = $request->input('long_description');
        $house->save();

        return redirect()->back()->with('success', 'Дом успешно обновлен!');
    }

    public function edithouse($id){


        $house = House::where('houseID', $id)->first();
        $files = Storage::disk('public')->files('admin');

        // Вернуть представление с файлами
        return view('admin.edithouse', compact('house', 'files'));
    }

    public function destroy($id) {
        $house = House::findOrFail($id);
        $house->delete();
        return redirect()->back()->with('success', 'Дом успешно удален');
    }

    public function editcat() {
        $categories = Category::all();
        return view('admin.editcat', compact('categories'));
    }

    public function storecat(Request $request)
    {
        // Валидация данных
        $request->validate([
            'category_name' => 'required|string|max:255', // Поле "Название" обязательно для заполнения и должно быть строкой не длиннее 255 символов
        ]);

        // Создание новой категории
        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->save(); // Сохранение категории в базе данных

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Категория успешно добавлена'], 200);
    }

    public function destroycat($id)
    {
        // Находим категорию по ее идентификатору
        $category = Category::where('category_id', $id)->first();

        // Проверяем, существует ли категория
        if (!$category) {
            return response()->json(['message' => 'Категория не найдена'], 404);
        }

        // Удаляем категорию
        $category->delete();

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Категория успешно удалена'], 200);
    }


    public function blog()
    {
        $posts = Post::all();
        return view('admin.blog', compact('posts'));
    }

    public function addpost()
    {
        $files = Storage::disk('public')->files('admin');
        $categories = Category::all();
        // Вернуть представление с файлами
        return view('admin.addpost', ['files' => $files], compact('categories'));
    }

    public function storepost(Request $request)
    {

        // Валидация данных
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_img' => 'required|string',
            'category_id' => 'required|array',
            'category_id.*' => 'integer|exists:categories,category_id',
            'post_sub_title' => 'required|string',
            'post_content' => 'required|string',
            'post_date' => 'required|date',
        ]);

        // Создание нового поста
        $post = new Post();
        $post->post_title = $request->input('post_title');
        $post->post_img = $request->input('post_img');
        $post->post_sub_title = $request->input('post_sub_title');
        $post->post_content = $request->input('post_content');
        $post->post_date = $request->input('post_date');
        $post->save();

        // Привязка категорий к посту
        $post->categories()->attach($request->input('category_id'));

        // Возвращаем успешный ответ
        return redirect()->back()->with('success', 'Пост успешно добавлен!');
        // Возвращаем успешный ответ
    }

    public function editpost($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $selectedCategories = $post->categories->pluck('category_id')->toArray();
        $files = Storage::disk('public')->files('admin');

        return view('admin.editpost', compact('post', 'categories', 'selectedCategories', 'files'));
    }

    public function updatepost(Request $request, $id)
    {
        // Валидация данных
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_img' => 'required|string',
            'category_id' => 'required|array',
            'category_id.*' => 'integer|exists:categories,category_id',
            'post_sub_title' => 'required|string',
            'post_content' => 'required|string',
            'post_date' => 'required|date',
        ]);

        // Поиск поста
        $post = Post::findOrFail($id);
        $post->post_title = $request->input('post_title');
        $post->post_img = $request->input('post_img');
        $post->post_sub_title = $request->input('post_sub_title');
        $post->post_content = $request->input('post_content');
        $post->post_date = $request->input('post_date');
        $post->save();

        // Обновление категорий
        $post->categories()->sync($request->input('category_id'));

        // Возвращаем успешный ответ
        return redirect()->back()->with('success', 'Пост успешно обновлен!');
    }


    public function destroypost($id)
    {
        // Поиск поста
        $post = Post::findOrFail($id);

        // Удаление связанных категорий
        $post->categories()->detach();

        // Удаление поста
        $post->delete();

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Пост успешно удален'], 200);
    }


    public function updatelead( Request $request, $id){

            $request->validate([
                'status' => 'required|string|in:На рассмотрении,Одобрено,Отклонено',
            ]);

            $lead = Lead::findOrFail($id);
            $lead->request_type = $request->input('status');
            $lead->save();

            return redirect()->back()->with('success', 'Статус заявки обновлен.');

    }


    public function services()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function servicescreate(){
        $files = Storage::disk('public')->files('admin');
        return view('admin.createservice', compact('files'));
    }

    public function storeservice(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'hours' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|string', // Изменено для использования URL из медиабиблиотеки
        ]);

        Service::create($validated);

        return redirect()->route('admin.services')->with('success', 'Услуга создана успешно');


    }

    public function storeevent(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'hours' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|string', // Изменено для использования URL из медиабиблиотеки
        ]);

        Event::create($validated);

        return redirect()->route('admin.events')->with('success', 'Услуга создана успешно');


    }




    public function destroyservice(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'Услуга удалена');
    }


    public function events()
    {
        $files = Storage::disk('public')->files('admin');
        $events = Event::all();
        // Вернуть представление с файлами
        return view('admin.events', ['files' => $files], compact('events'));
    }

    public function destroyevent(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events')->with('success', 'Мероприятие удалена');
    }



    public function edittype() {
        $types = Type::all();
        return view('admin.edittype', compact('types'));
    }

    public function storetype(Request $request)
    {
        // Валидация данных
        $request->validate([
            'type_name' => 'required|string|max:255', // Поле "Название" обязательно для заполнения и должно быть строкой не длиннее 255 символов
        ]);

        // Создание нового типа
        $type = new Type();
        $type->name = $request->input('type_name');
        $type->save(); // Сохранение типа в базе данных

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Тип успешно добавлен'], 200);
    }

    public function destroytype($id)
    {
        // Находим тип по его идентификатору
        $type = Type::where('id', $id)->first();

        // Проверяем, существует ли тип
        if (!$type) {
            return response()->json(['message' => 'Тип не найден'], 404);
        }

        // Удаляем тип
        $type->delete();

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Тип успешно удален'], 200);
    }




}
