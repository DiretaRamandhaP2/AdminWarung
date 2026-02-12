<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Store\Interface\StoreRepositoryInterface;
use App\Repositories\Users\Interface\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    protected $user;
    protected $store;

    public function __construct(
        UserRepositoryInterface $user,
        StoreRepositoryInterface $store
    ) {
        $this->user = $user;
        $this->store = $store;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->user->getAll();
        return view('pages.user-pages.main-user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user-pages.form-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isEdit = $request->has('id') ? true : false;
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user,store_owner',
            'store_name' => 'nullable|string|max:255',
        ];

        $data = $request->all();

        // dd($data);

        $validatedData = Validator::make($request->all(), $rules);

        if ($validatedData->fails()) {
            return redirect()->back();
        }

        if ($isEdit == true) {
        } else {
            $this->user->create($data);
            if (isset($data['store_name']) && $data['role'] == 'store_owner') {
                $this->store->createOnlyName($data,Auth::id());
            }
            return redirect()->route('management.users.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $data = $this->user->findById($user);
        return view('pages.user-pages.form-user', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $user = $this->user->delete($user);
        return redirect()->route('management.users.index');
    }

    public function dataTables(){
        return $this->user->DataTables();
    }


}
