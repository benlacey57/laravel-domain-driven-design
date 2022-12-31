                <div id="roles-table" class="table-responsive">
                    <table class="table table-hover table-striped hhf-table">
                        <thead>
                            @include('roles.list.table.header')
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                @include('roles.list.table.row')
                            @endforeach
                        </tbody>
                    </table>
                </div>
