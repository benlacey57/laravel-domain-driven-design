<?php

namespace App\Http\Controllers;

use App\Exceptions\HowApp\UserPermissionException;
use App\Http\Controllers\Responses\ShowRoleHttpResponse;
use App\Http\Controllers\Responses\ShowRoleJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Laravel controller for managing user roles via the HHF admin portal.
 *
 * @author Greg Merriman <gmerriman@hhf.uk.com>
 * @copyright Henry Howard Finance Plc
 */
class RolesController extends Controller
{
    /**
     * The processor used when data is submitted to create or modify a role.
     *
     * @var ProcessorInterface
     */
    protected $processor;

    /**
     * The repository used to store, modify or fetch a role.
     *
     * @var RoleInterface
     */
    protected $repository;

    /**
     * The repository used to fetch permissions.
     *
     * @var PermissionInterface
     */
    protected $permissionsRepository;

    /**
     * Creates a new Roles controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->processor = app()->make('RolesProcessor');
        $this->repository = app()->make('RolesRepository');
        $this->permissionsRepository = app()->make('PermissionsRepository');
    }

    /**
     * Show the default roles screen - a listing of roles.
     *
     * @return Response
     */
    public function index()
    {
        return view(
            'roles.list',
            [
                'roles' => $this->repository->getAll(),
                'title' => __('hhf/common.roles-and-permissions'),
            ]
        );
    }

    /**
     * Show the role represented by the given id or slug.
     *
     * @param int|string $param
     * @return Response
     */
    public function show($param)
    {
        if (is_numeric($param)) {
            $role = $this->repository->getByID($param);
        } else {
            $role = $this->repository->getBy('slug', $param);
        }

        if ($role->wasRecentlyCreated()) {
            $status = 'create-success';
        } elseif ($role->wasRecentlyUpdated()) {
            $status = 'update-success';
        }

        return view(
            'roles.show',
            [
                'role' => $role,
                'title' => $role->name,
                'status' => $status ?? null,
                'audits' => $role->getAuditsPaginated(),
                'allPermissions' => $this->permissionsRepository->getAll(),
            ]
        );
    }

    /**
     * Store a new user role.
     *
     * @return Response
     * @throws UserPermissionException
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create-roles')) {
            throw new UserPermissionException(__('hhf/role.no_permission.create'));
        }

        $newRole = $request->all();

        $this->processor->validate($newRole);
        $role = $this->repository->store($newRole);

        if ($request->ajax()) {
            return (new ShowRoleJsonResponse($role->slug))->response();
        }

        return (new ShowRoleHttpResponse($role->slug))->response();
    }

    /**
     * Update a user role (by the give role id).
     *
     * @param int $id
     * @return Response
     * @throws UserPermissionException
     */
    public function update(Request $request, $id)
    {
        if ($request->user()->cannot('edit-roles')) {
            throw new UserPermissionException(__('hhf/role.no_permission.edit'));
        }

        $updatedRole = $request->all();
        $updatedRole['id'] = $id;

        $this->processor->validate($updatedRole);
        $role = $this->repository->store($updatedRole);

        if ($request->ajax()) {
            return (new ShowRoleJsonResponse($role->slug))->response();
        }

        return (new ShowRoleHttpResponse($role->slug))->response();
    }
}
