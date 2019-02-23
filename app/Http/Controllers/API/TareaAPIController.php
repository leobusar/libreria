<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTareaAPIRequest;
use App\Http\Requests\API\UpdateTareaAPIRequest;
use App\Models\Tarea;
use App\Repositories\TareaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TareaController
 * @package App\Http\Controllers\API
 */

class TareaAPIController extends AppBaseController
{
    /** @var  TareaRepository */
    private $tareaRepository;

    public function __construct(TareaRepository $tareaRepo)
    {
        $this->tareaRepository = $tareaRepo;
    }

    /**
     * Display a listing of the Tarea.
     * GET|HEAD /tareas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tareaRepository->pushCriteria(new RequestCriteria($request));
        $this->tareaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tareas = $this->tareaRepository->all();

        return $this->sendResponse($tareas->toArray(), 'Tareas retrieved successfully');
    }

    /**
     * Store a newly created Tarea in storage.
     * POST /tareas
     *
     * @param CreateTareaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTareaAPIRequest $request)
    {
        $input = $request->all();

        $tareas = $this->tareaRepository->create($input);

        return $this->sendResponse($tareas->toArray(), 'Tarea saved successfully');
    }

    /**
     * Display the specified Tarea.
     * GET|HEAD /tareas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tarea $tarea */
        $tarea = $this->tareaRepository->findWithoutFail($id);

        if (empty($tarea)) {
            return $this->sendError('Tarea not found');
        }

        return $this->sendResponse($tarea->toArray(), 'Tarea retrieved successfully');
    }

    /**
     * Update the specified Tarea in storage.
     * PUT/PATCH /tareas/{id}
     *
     * @param  int $id
     * @param UpdateTareaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTareaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tarea $tarea */
        $tarea = $this->tareaRepository->findWithoutFail($id);

        if (empty($tarea)) {
            return $this->sendError('Tarea not found');
        }

        $tarea = $this->tareaRepository->update($input, $id);

        return $this->sendResponse($tarea->toArray(), 'Tarea updated successfully');
    }

    /**
     * Remove the specified Tarea from storage.
     * DELETE /tareas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tarea $tarea */
        $tarea = $this->tareaRepository->findWithoutFail($id);

        if (empty($tarea)) {
            return $this->sendError('Tarea not found');
        }

        $tarea->delete();

        return $this->sendResponse($id, 'Tarea deleted successfully');
    }
}
