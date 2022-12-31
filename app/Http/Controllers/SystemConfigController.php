<?php

namespace App\Http\Controllers;

use App\Enums\PermissionSlugEnum;
use App\Exceptions\HowApp\UserPermissionException;
use App\UseCases\SystemConfig\GetSystemConfigItemsUseCase;
use App\UseCases\SystemConfig\StoreSystemConfigItemsUseCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class SystemConfigController
 */
class SystemConfigController extends Controller
{
    /**
     * @var string
     */
    protected $partnerSchema;

    /**
     * SystemConfigController constructor.
     */
    public function __construct()
    {
        $this->getSystemConfigItemsUseCase = app(GetSystemConfigItemsUseCase::class);
        $this->storeSystemConfigItemsUseCase = app(StoreSystemConfigItemsUseCase::class);
    }

    /**
     * @throws UserPermissionException
     */
    public function show()
    {
        $this->permissionCheck();

        //Get options
        $options = $this->getSystemConfigItemsUseCase->handle();

        //Return view
        return view(
            'system-config.list',
            [
                'title' => 'System Configuration',
                'options' => $options,
            ]
        );
    }

    /**
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $this->permissionCheck();

        //Store
        $settings = $request->except('_token');
        $this->storeSystemConfigItemsUseCase->handle($settings);

        //Flash message
        $message = 'System Config has updated successfully.';
        $request->session()->flash('success', $message);

        //Redirect
        return redirect()->route('system-config');
    }

    /**
     * Check permission for this module.
     *
     * @return void
     */
    private function permissionCheck()
    {
        //Permission check
        if (! Auth::user()->hasPermissionTo(PermissionSlugEnum::ADMINISTER_SYSTEM_CONFIG)) {
            throw new UserPermissionException(__('hhf/system-config.no_permission.access'));
        }
    }
}
