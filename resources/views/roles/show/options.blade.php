                <div class="row mb-5">
                    <div class="col-12">
                        <div class="options float-right">
                            @if ($loggedInUser->can('edit-roles'))
                                @include('roles/show/options/edit-role')
                            @endif
                        </div>
                    </div>
                </div>
