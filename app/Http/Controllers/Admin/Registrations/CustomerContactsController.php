<?php

namespace App\Http\Controllers\Admin\Registrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Admin\ManagerUser\{
    Permission,
};
use App\Models\Admin\{
    Customer,
    TbStatus,
    TypeContact,
    CustomerContacts
};

class CustomerContactsController extends Controller
{
    private $model;
    private $permissionName = 'CadCustomerContacts';
    private $objPermissions;

    public function __construct(CustomerContacts $model, Permission $permission)
    {
        $this->model = $model;
        $this->objPermissions = $permission;
        $this->objPermissions->name = $this->permissionName;
    }

    public function store(Request $request)
    {
        if ($this->negarAcesso('new', true)) {
            return back()->with('messageDanger', 'Usuário sem permissão de edição.');
        }

        $data = $request->all();
        $customerContact = $this->model->create($data);
        $returMsg = $customerContact->contact;
        return back()->with('messageSuccess', 'O contato do cliente '.$returMsg.', foi criado com sucesso.');
    }

    public function destroy(int $contactId, int $customerId)
    {
        if(!$contactId > 0 OR !$customerId > 0){
            return back()->with('messageDanger', 'Erro ao excluir o contato, dados inválidos.');
        }

        $customerContact = CustomerContacts::where('id', '=', $contactId)->first();
        if (is_null($customerContact)) {
            return back()->with('messageDanger', 'Erro ao excluir o contato, dados não encontrado.');
        }

        $customer = Customer::where('id', '=', $customerId)->first();
        if (is_null($customer)) {
            return back()->with('messageDanger', 'Erro ao excluir o contato, dados não encontrado.');
        }

        if($customerContact->customerId != $customerId){
            return back()->with('messageDanger', 'Erro ao excluir o contato, contato não pertence ao cliente.');
        }

        $returMsg = $customerContact->contact;

        if($customerContact->delete()){
            return back()->with('messageSuccess', 'O contato '.$returMsg.', foi removido com sucesso.');
        }else{
            return back()->with('messageDanger', 'Erro ao remover o contato '.$returMsg.". Se o problema persistir entre em contato com o suporte.");
        }
    }

    /**
     * Método responsável por validar o acesso do usuário logado as actions da controller.
     */
    private function negarAcesso($tipo = 'view', $isRedirect = false)
    {
        //Verifica se o grupo é Admin já da permissão diretamente
        if(auth()->user()->hasRole(env('ROLE_NAME_ADMIN', 'admin'))){ return false; }

        $nome = $this->permissionName."-".ucfirst($tipo);
        if (!auth()->user()->role->hasPermission($nome)) {
            if($isRedirect){
                return true;
            }else{
                abort(403, 'Acesso negado');
            }
        }else{
            if($isRedirect){
                return false;
            }
        }
    }
}
