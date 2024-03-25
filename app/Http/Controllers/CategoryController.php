<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Service\CategoryService;


class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function store(CategoryRequest $request) {
        $response = $this->categoryService->create($request);
        return $response;
    }



}
