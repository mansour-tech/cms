<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Role;

class RoleComposer 
{

    protected $roles;

    public function __construct(Role $roles)
    {
        $this->roles = $roles ;
    }
    public function compose(View $view)
    {
        $view->with('roles', $this->roles->all());
    }
}
?>