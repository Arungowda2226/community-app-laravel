    @extends('frontend.layouts.app')

    @section('title', __('My Account'))

    @section('content')
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <x-frontend.card>
                        <x-slot name="header">
                            @lang('My Account')
                        </x-slot>

                        <x-slot name="body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <x-utils.link
                                        :text="__('My Profile')"
                                        class="nav-link active"
                                        id="my-profile-tab"
                                        data-toggle="pill"
                                        href="#my-profile"
                                        role="tab"
                                        aria-controls="my-profile"
                                        aria-selected="true" />

                                    <x-utils.link
                                        :text="__('User Details')"
                                        class="nav-link"
                                        id="user-tab"
                                        data-toggle="pill"
                                        href="#user"
                                        role="tab"
                                        aria-controls="user"
                                        aria-selected="false"/>

                                    <x-utils.link
                                        :text="__('Family')"
                                        class="nav-link"
                                        id="family-tab"
                                        data-toggle="pill"
                                        href="#family"
                                        role="tab"
                                        aria-controls="family"
                                        aria-selected="false"/>

                                    <x-utils.link
                                        :text="__('BUSINESS')"
                                        class="nav-link"
                                        id="business-tab"
                                        data-toggle="pill"
                                        href="#business"
                                        role="tab"
                                        aria-controls="business"
                                        aria-selected="false"/>

                                    <x-utils.link
                                        :text="__('EVENT')"
                                        class="nav-link"
                                        id="event-tab"
                                        data-toggle="pill"
                                        href="#event"
                                        role="tab"
                                        aria-controls="event"
                                        aria-selected="false"/>

                                    <x-utils.link
                                        :text="__('Edit Information')"
                                        class="nav-link"
                                        id="information-tab"
                                        data-toggle="pill"
                                        href="#information"
                                        role="tab"
                                        aria-controls="information"
                                        aria-selected="false"/>

                                    @if (! $logged_in_user->isSocial())
                                        <x-utils.link
                                            :text="__('Password')"
                                            class="nav-link"
                                            id="password-tab"
                                            data-toggle="pill"
                                            href="#password"
                                            role="tab"
                                            aria-controls="password"
                                            aria-selected="false" />
                                    @endif

                                    <x-utils.link
                                        :text="__('Two Factor Authentication')"
                                        class="nav-link"
                                        id="two-factor-authentication-tab"
                                        data-toggle="pill"
                                        href="#two-factor-authentication"
                                        role="tab"
                                        aria-controls="two-factor-authentication"
                                        aria-selected="false"/>
                                </div>
                            </nav>

                            <div class="tab-content" id="my-profile-tabsContent">
                                <div class="tab-pane fade pt-3 show active" id="my-profile" role="tabpanel" aria-labelledby="my-profile-tab">
                                    @include('frontend.user.account.tabs.profile')
                                </div><!--tab-profile-->

                                <div class="tab-pane fade pt-3" id="family" role="tabpanel" aria-labelledby="family-tab">
                                    @include('frontend.user.account.tabs.familyDetails')
                                </div><!--tab-family-->

                                <div class="tab-pane fade pt-3" id="user" role="tabpanel" aria-labelledby="user-tab">
                                    @include('frontend.user.account.tabs.user')
                                </div><!--tab-information-->

                                <div class="tab-pane fade pt-3" id="business" role="tabpanel" aria-labelledby="business-tab">
                                    @include('frontend.user.account.tabs.business')
                                </div><!--tab-information-->

                                <div class="tab-pane fade pt-3" id="event" role="tabpanel" aria-labelledby="event-tab">
                                    @include('frontend.user.account.tabs.event')
                                </div><!--tab-information-->

                                <div class="tab-pane fade pt-3" id="information" role="tabpanel" aria-labelledby="information-tab">
                                    @include('frontend.user.account.tabs.information')
                                </div><!--tab-information-->

                                @if (! $logged_in_user->isSocial())
                                    <div class="tab-pane fade pt-3" id="password" role="tabpanel" aria-labelledby="password-tab">
                                        @include('frontend.user.account.tabs.password')
                                    </div><!--tab-password-->
                                @endif

                                <div class="tab-pane fade pt-3" id="two-factor-authentication" role="tabpanel" aria-labelledby="two-factor-authentication-tab">
                                    @include('frontend.user.account.tabs.two-factor-authentication')
                                </div><!--tab-information-->
                            </div><!--tab-content-->
                        </x-slot>
                    </x-frontend.card>
                </div><!--col-md-10-->
            </div><!--row-->
        </div><!--container-->
    @endsection
