                        <div class="row">
                            <div class="col-6">
                                <p class="item">
                                    <span class="label">{{ __('hhf/common.created_at') }}</span><span class="sr-only">:</span>
                                    <span class="data">{{ HowAppDatetime::format($role->created_at) }}</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="item">
                                    <span class="label">{{ __('hhf/common.last_updated') }}</span><span class="sr-only">:</span>
                                    <span class="data">{{ HowAppDatetime::format($role->updated_at) }}</span>
                                </p>
                            </div>
                        </div>
