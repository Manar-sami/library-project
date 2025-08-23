<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookApiController extends Controller
{
     /**
     * @OA\Get(
     *     path="/api/books",
     *     summary="Get all books",
     *     description="Return list of all books with their authors",
     *     tags={"Books"},
     *     @OA\Response(
     *          response=200,
     *          description="List of books",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="title", type="string", example="Clean Code"),
     *                  @OA\Property(property="author", type="object",
     *                      @OA\Property(property="id", type="integer", example=10),
     *                      @OA\Property(property="name", type="string", example="Robert C. Martin")
     *                  )
     *              )
     *          )
     *     )
     * )
     */
  public function index()
    {

        return Book::with('author')->get();
    }

    /**
     * @OA\Get(
     *     path="/api/books/{id}",
     *     summary="Get book by ID",
     *     description="Return a specific book with author details",
     *     tags={"Books"},
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Book ID",
     *          @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Book data",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="integer", example=1),
     *              @OA\Property(property="title", type="string", example="Clean Code"),
     *              @OA\Property(property="author", type="object",
     *                  @OA\Property(property="id", type="integer", example=10),
     *                  @OA\Property(property="name", type="string", example="Robert C. Martin")
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Book not found"
     *     )
     * )
     */

    public function show($id)
    {

        return Book::with('author')->findOrFail($id);
    }
}
