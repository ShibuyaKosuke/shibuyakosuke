<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ShibuyaKosuke\LaravelCrudCommand\Exports\Exportable;
use ShibuyaKosuke\LaravelCrudCommand\Exports\Exporter;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller implements Exporter
{
    use Exportable;

    /**
     * @var Request
     */
    private $request;

    /**
     * CompanyController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->authorizeResource(User::class);
    }

    /**
     * @return Builder
     */
    public function getModels(): Builder
    {
        return User::search($this->request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = $this->getModels()->paginate(request('limit'));
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest $request
     * @return RedirectResponse
     */
    public function store(UserFormRequest $request): RedirectResponse
    {
        $user = new User();
        $user->fill(
            $request->all()
        )->save();
        return redirect()->route('users.show', compact('user'))
            ->with('success_message', trans('messages.create.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserFormRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserFormRequest $request, User $user): RedirectResponse
    {
        $user->fill(
            $request->all()
        )->save();
        return redirect()->route('users.show', compact('user'))
            ->with('success_message', trans('messages.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success_message', trans('messages.delete.success'));
    }
}
