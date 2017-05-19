<?php

namespace ${NAMESPACE};

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected \$service;

    public function __construct(${SERVICE}ServiceInterface \$service)
    {
        \$this->service = \$service;
    }

    public function index()
    {
        \$items = \$this->service->getAll();
    }

    public function create()
    {
        return view('', []);
    }

    public function store(Request \$request)
    {
        \$this->service->validateStoreInput(\$request);

        \$input = \$this->request->all();
        \$this->service->store(\$input);

        return redirect()->route('')->with([
            'success' => 'Registro inserido com sucesso!'
        ]);
    }

    public function show(\$recordId)
    {

    }

    public function edit(\$recordId)
    {
        \$item = \$this->service->getById(\$recordId);

        return view('', [
            'item' => \$item
        ]);
    }

    public function update(Request \$request, \$recordId)
    {
        \$this->service->validateUpdateInput(\$request);

        \$input = \$this->request->all();
        \$this->service->update(\$recordId, \$input);

        return redirect()->route('')->with([
            'success' => 'Registro atualizado com sucesso!'
        ]);
    }

    public function destroy(\$recordId)
    {
        \$this->service->delete(\$recordId);

        return redirect()->route('')->with([
            'success' => 'Registro removido com sucesso!'
        ]);
    }
}