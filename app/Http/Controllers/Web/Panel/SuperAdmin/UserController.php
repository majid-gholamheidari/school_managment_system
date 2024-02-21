<?php

namespace App\Http\Controllers\Web\Panel\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\UserRequest;
use App\Http\Resources\Web\Panel\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.sa.users.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $perPage = request('per_page', 15);
        $page = request('page', 1);
        $users = User::with('positions')
            ->where(function ($query) {
                $search = trim(request('search')['value'] ?? "");
                if (strlen($search) > 0)
                    $query->where(DB::raw('concat(f_name," ",l_name)') , 'LIKE' , '%' . $search . '%');
            })
            ->skip( ($page - 1) * $perPage )
            ->take(15)
            ->get();
        return response()->json([
            'results' => UserResource::collection($users),
            "recordsTotal" => User::count(),
            "recordsFiltered" => $users->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        $user = User::where('username', $username)->first();
        if (!$user)
            return redirect()->back()->withErrors(['کاربر مورد نظر موجود نمی باشد.']);

        return view('panel.sa.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $username)
    {
        $user = User::where('username', $username)->first();
        if (!$user)
            return response()->json([
                'message' => 'کاربر مورد نظر موجود نمی باشد.',
            ], 400);

        $user->update($request->all());
        return response()->json([
            'message' => 'مشخصات کاربر مورد نظر با موفقیت به روز رسانی شد.',
            'target' => route('panel.sa.users.edit', $user->username)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * @param $username
     * @return JsonResponse
     */
    public function resetPassword($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user)
            return response()->json([
                'message' => 'کاربر مورد نظر موجود نمی باشد.',
            ], 400);

        $user->update(['password' => Hash::make($user->username)]);
        return response()->json([
            'message' => 'رمز عبور کاربر مورد نظر به نام کاربری ایشان تغییر یافت.',
            'target' => route('panel.sa.users.edit', $user->username)
        ], 200);
    }
}
