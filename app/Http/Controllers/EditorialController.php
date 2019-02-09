<?php

namespace App\Http\Controllers;

use App\DataTables\EditorialDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEditorialRequest;
use App\Http\Requests\UpdateEditorialRequest;
use App\Repositories\EditorialRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EditorialController extends AppBaseController
{
    /** @var  EditorialRepository */
    private $editorialRepository;

    public function __construct(EditorialRepository $editorialRepo)
    {
        $this->editorialRepository = $editorialRepo;
    }

    /**
     * Display a listing of the Editorial.
     *
     * @param EditorialDataTable $editorialDataTable
     * @return Response
     */
    public function index(EditorialDataTable $editorialDataTable)
    {
        return $editorialDataTable->render('editorials.index');
    }

    /**
     * Show the form for creating a new Editorial.
     *
     * @return Response
     */
    public function create()
    {
        return view('editorials.create');
    }

    /**
     * Store a newly created Editorial in storage.
     *
     * @param CreateEditorialRequest $request
     *
     * @return Response
     */
    public function store(CreateEditorialRequest $request)
    {
        $input = $request->all();

        $editorial = $this->editorialRepository->create($input);

        Flash::success('Editorial saved successfully.');

        return redirect(route('editorials.index'));
    }

    /**
     * Display the specified Editorial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $editorial = $this->editorialRepository->findWithoutFail($id);

        if (empty($editorial)) {
            Flash::error('Editorial not found');

            return redirect(route('editorials.index'));
        }

        return view('editorials.show')->with('editorial', $editorial);
    }

    /**
     * Show the form for editing the specified Editorial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $editorial = $this->editorialRepository->findWithoutFail($id);

        if (empty($editorial)) {
            Flash::error('Editorial not found');

            return redirect(route('editorials.index'));
        }

        return view('editorials.edit')->with('editorial', $editorial);
    }

    /**
     * Update the specified Editorial in storage.
     *
     * @param  int              $id
     * @param UpdateEditorialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEditorialRequest $request)
    {
        $editorial = $this->editorialRepository->findWithoutFail($id);

        if (empty($editorial)) {
            Flash::error('Editorial not found');

            return redirect(route('editorials.index'));
        }

        $editorial = $this->editorialRepository->update($request->all(), $id);

        Flash::success('Editorial updated successfully.');

        return redirect(route('editorials.index'));
    }

    /**
     * Remove the specified Editorial from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $editorial = $this->editorialRepository->findWithoutFail($id);

        if (empty($editorial)) {
            Flash::error('Editorial not found');

            return redirect(route('editorials.index'));
        }

        $this->editorialRepository->delete($id);

        Flash::success('Editorial deleted successfully.');

        return redirect(route('editorials.index'));
    }
}
