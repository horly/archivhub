 <div class="row mb-5">
                            <!-- Site Card -->
                            <div class="col-md-3 col-sm-6">
                                <div class="stat-card border">
                                    <div class="stat-title">
                                        <div class="icon-circle icon-sites">
                                            <i class="fa-solid fa-city"></i>
                                        </div>
                                        Sites
                                    </div>
                                    <div class="stat-value">{{ number_format($sitesCount, 0, '', ' ') }} </div>
                                    <div class="stat-change">
                                        <i class="fas fa-arrow-up"></i>
                                        {{ number_format($sitesThisMonth, 0, '', ' ') }} {{ __('dashboard.this_month') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Locaux Card -->
                            <div class="col-md-3 col-sm-6">
                                <div class="stat-card border">
                                    <div class="stat-title">
                                        <div class="icon-circle icon-locaux">
                                            <i class="fas fa-door-open"></i>
                                        </div>
                                        {{ __('dashboard.rooms') }}
                                    </div>
                                    <div class="stat-value">{{ number_format($roomsCount, 0, '', ' ') }} </div>
                                    <div class="stat-change">
                                        <i class="fas fa-arrow-up"></i>
                                        {{ number_format($roomsThisMonth, 0, '', ' ') }} {{ __('dashboard.this_month') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Boîtes Card -->
                            <div class="col-md-3 col-sm-6">
                                <div class="stat-card border">
                                    <div class="stat-title">
                                        <div class="icon-circle icon-boites">
                                            <i class="fa-solid fa-box-archive"></i>
                                        </div>
                                        {{ __('dashboard.boxes') }}
                                    </div>
                                    <div class="stat-value">{{ number_format($boxesCount, 0, '', ' ') }}</div>
                                    <div class="stat-change">
                                        <i class="fas fa-arrow-up"></i>
                                        {{ number_format($boxesThisMonth, 0, '', ' ') }} {{ __('dashboard.this_month') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Documents Card -->
                            <div class="col-md-3 col-sm-6">
                                <div class="stat-card border">
                                    <div class="stat-title">
                                        <div class="icon-circle icon-documents">
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        Documents
                                    </div>
                                    <div class="stat-value">{{ number_format($documentsCount, 0, '', ' ') }}</div>
                                    <div class="stat-change">
                                        <i class="fas fa-arrow-up"></i>
                                        {{ number_format($documentsThisMonth, 0, '', ' ') }} {{ __('dashboard.this_month') }}
                                    </div>
                                </div>
                            </div>
                        </div>
