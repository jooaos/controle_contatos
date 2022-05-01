<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\ContactCreateRequest;
use App\Http\Requests\Contact\ContactUpdateRequest;
use App\Services\Contact\Contract\ContactServiceContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * @var ContactServiceContract $contactService
     */
    protected ContactServiceContract $contactService;

    /**
     * @param ContactServiceContract $contactService
     */
    public function __construct(ContactServiceContract $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.contact', [
            'contacts' => $this->contactService->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.contact-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactCreateRequest $request)
    {
        try {
            $this->contactService->create($request->all());
            return redirect('contacts')->with('positive-status', 'Cadastro concluído com sucesso');
        } catch (\Exception $e) {
            Log::error(
                'controller.ContactController.store',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            return redirect('contacts')->with('negative-status', 'Não foi possível realizar o cadastro do usuário. Tente novamente.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $contact = $this->contactService->getById($id);
            return view('contact.contact-show', [
                'contact' => $contact
            ]);
        } catch (\Exception $e) {
            Log::error(
                'controller.ContactController.store',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            return redirect('contacts')->with('negative-status', 'Não foi possível visualizar o contato. Tente novamente.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $contact = $this->contactService->getById($id);
            return view('contact.contact-update', [
                'contact' => $contact
            ]);
        } catch (\Exception $e) {
            Log::error(
                'controller.ContactController.edit',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            return redirect('contacts')->with('negative-status', 'Não foi possível atualizar o contato. Tente novamente.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContactUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, $id)
    {
        try {
            $this->contactService->update($id, $request->all());
            return redirect('contacts')->with('positive-status', 'Contato atualizado com sucesso!');
        } catch (\Exception $e) {
            Log::error(
                'controller.ContactController.update',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            return redirect('contacts')->with('negative-status', 'Não foi possível atualizar o contato. Tente novamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->contactService->delete($id);
            return redirect('contacts')->with('positive-status', 'Contato excluído com suceso!');
        } catch (\Exception $e) {
            Log::error(
                'controller.ContactController.destroy',
                [
                    'status_code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]
            );
            return redirect('contacts')->with('negative-status', 'Não foi possível excluir o contato. Tente novamente.');
        }
    }
}
