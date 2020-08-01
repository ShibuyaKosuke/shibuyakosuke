<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
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
        $this->authorizeResource(Product::class);
    }

    /**
     * @return Builder
     */
    public function getModels(): Builder
    {
        return Product::with(['author'])->search($this->request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = $this->getModels()->paginate(request('limit'));
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductFormRequest $request
     * @return RedirectResponse
     */
    public function store(ProductFormRequest $request): RedirectResponse
    {
        $product = new Product();
        $product->fill(
            $request->all()
        )->save();
        return redirect()->route('products.show', compact('product'))
            ->with('success_message', trans('messages.create.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductFormRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductFormRequest $request, Product $product): RedirectResponse
    {
        $product->fill(
            $request->all()
        )->save();
        return redirect()->route('products.show', compact('product'))
            ->with('success_message', trans('messages.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success_message', trans('messages.delete.success'));
    }
}
