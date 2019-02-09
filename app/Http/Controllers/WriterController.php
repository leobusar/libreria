<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWriterRequest;
use App\Http\Requests\UpdateWriterRequest;
use App\Repositories\WriterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WriterController extends AppBaseController
{
    /** @var  WriterRepository */
    private $writerRepository;

    public function __construct(WriterRepository $writerRepo)
    {
        $this->writerRepository = $writerRepo;
    }

    /**
     * Display a listing of the Writer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->writerRepository->pushCriteria(new RequestCriteria($request));
        $writers = $this->writerRepository->all();

        return view('writers.index')
            ->with('writers', $writers);
    }

    /**
     * Show the form for creating a new Writer.
     *
     * @return Response
     */
    public function create()
    {
        return view('writers.create');
    }

    /**
     * Store a newly created Writer in storage.
     *
     * @param CreateWriterRequest $request
     *
     * @return Response
     */
    public function store(CreateWriterRequest $request)
    {
        $input = $request->all();

        $writer = $this->writerRepository->create($input);

        Flash::success('Writer saved successfully.');

        return redirect(route('writers.index'));
    }

    /**
     * Display the specified Writer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $writer = $this->writerRepository->findWithoutFail($id);

        if (empty($writer)) {
            Flash::error('Writer not found');

            return redirect(route('writers.index'));
        }

        return view('writers.show')->with('writer', $writer);
    }

    /**
     * Show the form for editing the specified Writer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $writer = $this->writerRepository->findWithoutFail($id);

        if (empty($writer)) {
            Flash::error('Writer not found');

            return redirect(route('writers.index'));
        }

        return view('writers.edit')->with('writer', $writer);
    }

    /**
     * Update the specified Writer in storage.
     *
     * @param  int              $id
     * @param UpdateWriterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWriterRequest $request)
    {
        $writer = $this->writerRepository->findWithoutFail($id);

        if (empty($writer)) {
            Flash::error('Writer not found');

            return redirect(route('writers.index'));
        }

        $writer = $this->writerRepository->update($request->all(), $id);

        Flash::success('Writer updated successfully.');

        return redirect(route('writers.index'));
    }

    /**
     * Remove the specified Writer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $writer = $this->writerRepository->findWithoutFail($id);

        if (empty($writer)) {
            Flash::error('Writer not found');

            return redirect(route('writers.index'));
        }

        $this->writerRepository->delete($id);

        Flash::success('Writer deleted successfully.');

        return redirect(route('writers.index'));
    }
}
