<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkedSocialAccountFormRequest;
use App\Models\LinkedSocialAccount;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ShibuyaKosuke\LaravelCrudCommand\Exports\Exportable;
use ShibuyaKosuke\LaravelCrudCommand\Exports\Exporter;

/**
 * Class LinkedSocialAccountController
 * @package App\Http\Controllers
 */
class LinkedSocialAccountController extends Controller implements Exporter
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
        $this->authorizeResource(LinkedSocialAccount::class);
    }

    /**
     * @return Builder
     */
    public function getModels(): Builder
    {
        return LinkedSocialAccount::with(['id'])->search($this->request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $linked_social_accounts = $this->getModels()->paginate(request('limit'));
        return view('linked_social_accounts.index', compact('linked_social_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('linked_social_accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LinkedSocialAccountFormRequest $request
     * @return RedirectResponse
     */
    public function store(LinkedSocialAccountFormRequest $request): RedirectResponse
    {
        $linked_social_account = new LinkedSocialAccount();
        $linked_social_account->fill(
            $request->all()
        )->save();
        return redirect()->route('linked_social_accounts.show', compact('linked_social_account'))
            ->with('success_message', trans('messages.create.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param LinkedSocialAccount $linked_social_account
     * @return View
     */
    public function show(LinkedSocialAccount $linked_social_account): View
    {
        return view('linked_social_accounts.show', compact('linked_social_account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LinkedSocialAccount $linked_social_account
     * @return View
     */
    public function edit(LinkedSocialAccount $linked_social_account): View
    {
        return view('linked_social_accounts.edit', compact('linked_social_account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LinkedSocialAccountFormRequest $request
     * @param LinkedSocialAccount $linked_social_account
     * @return RedirectResponse
     */
    public function update(LinkedSocialAccountFormRequest $request, LinkedSocialAccount $linked_social_account): RedirectResponse
    {
        $linked_social_account->fill(
            $request->all()
        )->save();
        return redirect()->route('linked_social_accounts.show', compact('linked_social_account'))
            ->with('success_message', trans('messages.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LinkedSocialAccount $linked_social_account
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(LinkedSocialAccount $linked_social_account): RedirectResponse
    {
        $linked_social_account->delete();
        return redirect()->route('linked_social_accounts.index')
            ->with('success_message', trans('messages.delete.success'));
    }
}
