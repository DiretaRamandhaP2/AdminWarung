<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    public function login()
    {
        return view('pages.login.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard.admin');
        } else {
            return redirect()->route('login')->withErrors(['Invalid credentials']);
        }
    }

    public function index(Request $request)
    {
        // Ambil parameter pencarian
        $search = $request->get('search');
        $sortBy = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'asc');

        // Query data dengan pencarian dan sorting
        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Sorting
        if (in_array($sortBy, ['id', 'name', 'email', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        // Pagination
        $users = $query->paginate(10)->withQueryString();

        return view('pages.users.table', compact('users', 'search', 'sortBy', 'sortOrder'));
    }
}
