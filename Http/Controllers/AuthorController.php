<?php

namespace Modules\Author\Http\Controllers;

use App\Models\Menu;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Modules\Author\Entities\Author;
use Modules\Author\Http\Requests\CreateAuthorFormRequest;

class AuthorController extends Controller
{

    private $data = array();

    public function __construct()
    {
        // $this->data['menu'] = [
        //     [
        //         'route' => route('author.index'),
        //         'title' => 'Home',
        //         'is_active' => FacadesRequest::is('author/author') ? true : false,
        //         'icon' => 'ti-home'
        //     ],
        //     [
        //         'route' => route('author.create'),
        //         'title' => 'Novo',
        //         'is_active' => FacadesRequest::is('author/author/create') ? true : false,
        //         'icon' => 'ti-circle-plus'
        //     ],
        // ];

        $this->data['menu'] = Menu::where('system_id', '9c24bb2c-8573-45be-a8ed-fb6d426ea8dd')->with('menu_list')->get();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $this->data['authors'] = Author::all();

        return view('author::index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $this->data['form'] = [
            [
                'size' => 'col-12',
                'item' => [
                    [
                        'component' => 'input.input',
                        'name' => 'author_name',
                        'title' => 'Nome do author',
                        'type' => 'text',
                        'placeholder' => 'Nome...',
                        'class' => 'mb-3',
                        'required' => true
                    ]
                ]
            ],
            [
                'size' => 'col-12',
                'item' => [
                    [
                        'component' => 'input.input',
                        'name' => 'author_birthday',
                        'title' => 'Data de nascimento',
                        'type' => 'date',
                        'class' => 'mb-3',
                        'required' => true
                    ]
                ]
            ],
            [
                'size' => 'col-12',
                'item' => [
                    [
                        'component' => 'input.input',
                        'name' => 'author_picture',
                        'title' => 'Foto do author',
                        'type' => 'file',
                        'class' => 'mb-3'
                    ]
                ]
            ]
        ];

        return view('author::create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateAuthorFormRequest $request)
    {
        //

        $file = $request->file('author_picture')->store('public/module/author/avatars');
        $file = explode('public/', $file);

        Author::create([
            'name' => $request->input('author_name'),
            'birthday' => $request->input('author_birthday'),
            'avatar_path' => $file[1]
        ]);

        return to_route('author.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('author::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('author::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
