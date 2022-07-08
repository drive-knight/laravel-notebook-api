<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotebookRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotebookController extends Controller
{
    /**
     * Get List Notebook Entries
     * @OA\Get (
     *     path="/api/v1/notebook",
     *     tags={"Notebook"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="full_name",
     *                         type="string",
     *                         example="Sergei Rachmaninoff"
     *                     ),
     *                     @OA\Property(
     *                         property="company",
     *                         type="string",
     *                         example="Apple"
     *                     ),
     *                     @OA\Property(
     *                         property="phone",
     *                         type="string",
     *                         example="+7987654321"
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         format="email",
     *                         example="email@email.com"
     *                     ),
     *                     @OA\Property(
     *                         property="date_of_birth",
     *                         type="string",
     *                         format="date",
     *                         example="1985-03-19"
     *                     ),
     *                     @OA\Property(
     *                         property="photo_path",
     *                         type="string",
     *                         example="photo.png"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return NotebookResource::collection(Notebook::paginate());
    }

    /**
     * Get Detail Notebook Entry
     * @OA\Get (
     *     path="/api/v1/notebook/{id}",
     *     tags={"Notebook"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="full_name", type="string", example="Sergei Rachmaninoff"),
     *              @OA\Property(property="company", type="string", example="Apple"),
     *              @OA\Property(property="phone", type="string", example="+7987654321"),
     *              @OA\Property(property="email", type="string", format="email", example="email@email.com"),
     *              @OA\Property(property="date_of_birth", type="string", format="date", example="1985-03-19"),
     *              @OA\Property(property="photo_path", type="string", example="photo.png")
     *          )
     *      ),
     *     @OA\Response(
     *          response=404,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */
    public function show(Notebook $notebook)
    {
        return new NotebookResource($notebook);
    }

    /**
     * Create Notebook Entry
     * @OA\Post (
     *     path="/api/v1/notebook",
     *     tags={"Notebook"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="full_name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="company",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="phone",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string",
     *                          format="email"
     *                      ),
     *                      @OA\Property(
     *                          property="date_of_birth",
     *                          type="string",
     *                          format="date"
     *                      ),
     *                      @OA\Property(
     *                          property="photo_path",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "full_name":"Sergei Rachmaninoff",
     *                     "company":"Apple",
     *                     "phone":"+7987654321",
     *                     "email":"email@email.com",
     *                     "date_of_birth":"1985-03-19",
     *                     "photo_path":"photo.png"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="full_name", type="string", example="Sergei Rachmaninoff"),
     *              @OA\Property(property="company", type="string", example="Apple"),
     *              @OA\Property(property="phone", type="string", example="+7987654321"),
     *              @OA\Property(property="email", type="string", format="email", example="email@email.com"),
     *              @OA\Property(property="date_of_birth", type="string", format="date", example="1985-03-19"),
     *              @OA\Property(property="photo_path", type="string", example="photo.png")
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="fail"),
     *          )
     *      )
     * )
     */
    public function store(NotebookRequest $request)
    {
        $new_notebooks = Notebook::create($request->validated());

        return new NotebookResource($new_notebooks);
    }

    /**
     * Delete Notebook Entry
     * @OA\Delete (
     *     path="/api/v1/notebook/{id}",
     *     tags={"Notebook"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="delete notebook entry success")
     *         )
     *     )
     * )
     */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Update Notebook Entry
     * @OA\Put (
     *     path="/api/v1/notebook/{id}",
     *     tags={"Notebook"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="full_name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="company",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="phone",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="date_of_birth",
     *                          type="string",
     *                          format="date"
     *                      ),
     *                      @OA\Property(
     *                          property="photo_path",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "full_name":"Sergei Rachmaninoff",
     *                     "company":"Apple",
     *                     "phone":"+7987654321",
     *                     "email":"email@email.com",
     *                     "date_of_birth":"1985-03-19",
     *                     "photo_path":"photo.png"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="full_name", type="string", example="Sergei Rachmaninoff"),
     *              @OA\Property(property="company", type="string", example="Apple"),
     *              @OA\Property(property="phone", type="string", example="+7987654321"),
     *              @OA\Property(property="email", type="string", example="email@email.com"),
     *              @OA\Property(property="date_of_birth", type="string", format="date", example="1985-03-19"),
     *              @OA\Property(property="photo_path", type="string", example="photo.png")
     *          )
     *      )
     * )
     */
    public function update(NotebookRequest $request, Notebook $notebook)
    {
        $notebook->update($request->validated());

        return new NotebookResource($notebook);
    }
}
