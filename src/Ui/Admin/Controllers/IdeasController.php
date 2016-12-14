<?php

namespace Arc\Ui\Admin\Controllers;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Arc\Repositories\IdeaRepository;
use Arc\Validators\IdeaValidator;


class IdeasController extends Controller
{

    /**
     * @var IdeaRepository
     */
    protected $repository;

    /**
     * @var IdeaValidator
     */
    protected $validator;

    public function __construct(IdeaRepository $repository, IdeaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $ideas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ideas,
            ]);
        }

        return view('ideas.index', compact('ideas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IdeaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(IdeaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $idea = $this->repository->create($request->all());

            $response = [
                'message' => 'Idea created.',
                'data'    => $idea->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idea = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $idea,
            ]);
        }

        return view('ideas.show', compact('idea'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $idea = $this->repository->find($id);

        return view('ideas.edit', compact('idea'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  IdeaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(IdeaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $idea = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Idea updated.',
                'data'    => $idea->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Idea deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Idea deleted.');
    }
}
