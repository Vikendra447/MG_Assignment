<!DOCTYPE html>
<head></head>
<title></title>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 id="heading"></h2>
                </div>
                    <form method="POST" id="addclientform" action="">
                        <div class="inn-wrapper">
                            {{ csrf_field() }}
                           

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->name }}"
                                               @else value='{{ old("name") }}' @endif required>
                                        <label class="form-label">Name*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_name')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-name"
                                          style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('name', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="number" name="number" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->number }}"
                                               @else value='{{ old("number") }}' @endif onkeypress="return isNumberKey(event)" required>
                                        <label class="form-label">Phone Number with Country Code*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_phone')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-number"
                                          style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('number', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="company_name" name="company_name" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->company_name }}"
                                               @else value='{{ old("company_name") }}' @endif required>
                                        <label class="form-label">Company Name*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_cname')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-company" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('company_name', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="address" name="address" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->address }}"
                                               @else value='{{ old("address") }}' @endif required>
                                        <label class="form-label">Address*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_address')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-address" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('address', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="pincode" name="pincode" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->pincode }}"
                                               @else value='{{ old("pincode") }}' @endif onkeypress="return isNumberKey(event)" required>
                                        <label class="form-label">Pincode*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_pincode')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-pincode" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('pincode', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line chosen-bx" style="padding-right:25px;">
                                        <select name="country" id="country" class="form-control chosen-select" data-placeholder=" " required>
                                            <option value=""></option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" @if( !empty($user) ) @if( $user->country == $country->id ) {{ 'selected' }}  @endif @endif @if(empty($user) && old('country') == $country->id) {{ 'selected' }} @endif >{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Country*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top:0;color:#488ace;"
                                           title="{{Lang::get('messages.user_country')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-country" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('country', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line chosen-bx" style="padding-right:25px;">
                                        <select name="state" id="state" class="form-control chosen-select" data-placeholder=" " required>
                                            <option value=""></option>
                                        </select>
                                        <label class="form-label">State*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top:0;color:#488ace;"
                                           title="{{Lang::get('messages.user_state')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-state"
                                          style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('state', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="city" id="city" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->city }}"
                                               @else value='{{ old("city") }}' @endif required>
                                        <label class="form-label">City*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top:0;color:#488ace;"
                                           title="{{Lang::get('messages.user_city')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-city"
                                          style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('city', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line" style="padding-right:25px;">
                                        <select id="timezone" name="timezone" class="form-control">
                                            @foreach($timezones as $timezone)
                                                <option value="{{ $timezone->tz_id }}" @if(!empty($user)) @if( $user->timezone_id == $timezone->tz_id) {{ 'selected' }}  @endif @endif @if(empty($user) && isUrlAcefone() && $timezone->tz_id == 610) {{ 'selected' }} @elseif(empty($user) && !isUrlAcefone() && $timezone->tz_id == 740) {{ 'selected' }} @endif > {{ $timezone->tz_name }} </option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Timezone*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top:0;color:#488ace;"
                                           title="{{Lang::get('messages.user_tz')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-timezone" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('timezone', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line" style="padding-right:25px;">
                                        <select name="user_role" id="user_role" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" @if(!empty($user)) @if($user->role_id == $role->id) {{ 'selected' }}  @endif @elseif(empty($user) && old('user_role') == $role->id) {{ 'selected' }} @elseif(!isUrlAcefone() && $role->id == 103) {{ 'selected' }}  @endif > {{ $role->display_name }} </option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">User Role*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top:0;color:#488ace;"
                                           title="{{Lang::get('messages.user_role')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" id="email" name="email" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->email }}"
                                               @else value='{{ old("email") }}' @endif required>
                                        <label class="form-label">Email Address*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_email')}}">help_outline</i>
                                    </div>
                                    <span id="error-email"
                                          style="display:none; color: red; font-size: 13px;">This email already exists.</span>
                                    <span id="errormsg-email"
                                          style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('email', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="secondary_email" name="secondary_email" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->secondary_emails }}"
                                               @else value='{{ old("secondary_email") }}' @endif>
                                        <label class="form-label">Secondary Email Addresses</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_secondary_email')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-secondary_email"
                                          style="display:none; color: red;">Invalid comma seperated email ids.</span>
                                    {!! $errors->first('secondary_email', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        @if(isset($user))
                                            <input type="text" id="login_id" name="login_id" class="form-control" value="{{$user['login_id']}}" required >
                                        @else
                                            <input type="text" id="login_id" name="login_id" class="form-control" value="{{ old('login_id') }}" required>
                                        @endif
                                        <label class="form-label">Login ID*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="Login ID of User Account">help_outline</i>
                                    </div>
                                    <span id="error-login-id"
                                          style="display:none; color: red; font-size: 13px;">This login id already exists.<br></span>
                                    <span id="errormsg-login-id" style="display:none; color: red;font-size: 13px;">This field is required.<br></span>
                                    <span id="errormsg-login-id-validation" style="display:none; color: red;font-size: 13px;">Login ID must be atleat 6 characters long.</span>
                                    {!! $errors->first('login_id', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-6" id="auto_generate_password_div">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Auto Generate Password</div>
                                    <div class="switch">
                                        <label><input onchange="autoGeneratePassword()" type="checkbox" id="auto_generate_password"
                                                      name="auto_generate_password"
                                                      @if(empty($user)) checked @endif><span
                                                    class="lever switch-col-cyan"></span></label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 15px;top: 5px;color:#488ace;"
                                           title="Auto Generate Password">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="password_div">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" id="password" name="password" class="form-control" autocomplete="none">
                                        <label class="form-label">Password*</label>
                                        <i class="material-icons" style="cursor: pointer;position: absolute;right: 30px;top: 5px;color:#488ace;"
                                           title="View Password" onclick="showPassword()">
                                            remove_red_eye
                                        </i>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_password')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-password" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('password', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            {{--<div class="col-md-2">--}}
                                {{--<div class="form-group form-float">--}}
                                    {{--<i class="material-icons" style="top: 5px;padding-right:20px;color:#488ace;cursor: pointer;"--}}
                                       {{--title="View Password" onclick="showPassword()">--}}
                                        {{--remove_red_eye--}}
                                    {{--</i>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="client_id" name="client_id" class="form-control"
                                               @if( !empty($user) ) value="{{ $user->client_id }}"
                                               @else value='{{ old("client_id") }}' @endif required>
                                        <label class="form-label">Client Id*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_clientid')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-client_id" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('client_id', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>


                            @if(empty($user))

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="billing_type" class="form-control" id="billing_type" required onchange="checkBillingType()">
                                            <option value=""></option>
                                            @foreach($billingTypes as $key=>$val)
                                                <option value="{{ $key }}" @if(!empty(old('billing_type'))) @if( old('billing_type') == $key) {{"selected "}} @endif @elseif($key==4) selected @endif >{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Billing Cycle*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.billing_cycle')}}">help_outline</i>
                                        <span style="font-size: 13px; color:red; display: none;"
                                              id="billingTypeValidationError">Please select this first.</span>
                                    </div>
                                </div>
                            </div>

                                <div class="col-md-6" @if(!config('app.modules')['membership_plan']) style="display:none;" @endif >
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="membership_plan" class="form-control" id="membership_plan" onchange="setclientPlanName()" required>
                                                @if(config('app.modules')['membership_plan'])
                                                    <option value=""></option>
                                                @else
                                                    <option value="1">Default</option>
                                                @endif
                                            </select>
                                            <label class="form-label">Membership Plan*</label>
                                            <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                               style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                               title="{{Lang::get('messages.billing_membership_plan')}}">help_outline</i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" id="client_plan_name_option" @if(empty($membership_discount['client_plan_name']) || !config('app.modules')['membership_plan']) style="display: none;" @endif>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="client_plan_name" class="form-control" id="client_plan_name"
                                                   @if(!empty($membership_discount['client_plan_name'])) value="{{ $membership_discount['client_plan_name'] }}" @else value="{{ !empty(old('client_plan_name'))?old('client_plan_name'):"Default" }}" @endif>
                                            <label class="form-label">Client Plan Name*</label>
                                            <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                               style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                               title="{{Lang::get('messages.client_plan_name')}}">help_outline</i>
                                        </div>
                                        <span id="errormsg-client_plan_name" style="display:none; color: red;">This field is required.</span>
                                        {!! $errors->first('client_plan_name', '<p class="help-block" style="color: red" >:message</p>') !!}
                                    </div>
                                </div>


                            @endif

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="account_type" class="form-control" id="account_type" required>
                                            @foreach(config('app.account_type') as $key=>$val)
                                                <option value="{{ $key }}" @if(isset($user) && $user->account_type ==  $key) selected @endif>{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Account Type</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.account_type')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>

                            <div @if(empty($user)) class="col-md-3" @else class="col-md-6" @endif>
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Send Credentials</div>
                                    <div class="switch">
                                        <label><input type="checkbox" id="credential_status"
                                                      name="credential_status"
                                                      checked><span
                                                    class="lever switch-col-cyan"></span></label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 15px;top: 5px;color:#488ace;"
                                           title="To send credentials on email">help_outline</i>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="clearfix"></div>--}}

                            @if(empty($user))
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="demo-switch-title">Force Reset Password</div>
                                        <div class="switch">
                                            <label><input type="checkbox" id="force_reset_password"
                                                          name="force_reset_password"
                                                          checked><span
                                                        class="lever switch-col-cyan"></span></label>
                                            <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                               style="position: absolute;right: 15px;top: 5px;color:#488ace;"
                                               title="To allow force reset password ">help_outline</i>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Admin Recording</div>
                                    <div class="switch">
                                        <label><input type="checkbox" id="admin_recording"
                                                      name="admin_recording" @if((!empty($user) && $user->admin_recording) || empty($user)) checked @endif><span
                                                    class="lever switch-col-cyan"></span></label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 15px;top: 5px;color:#488ace;"
                                           title="To force call recording">help_outline</i>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="faqs-bx panel-group" id="additional_fields_panel" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="headingOne_10">
                                        <h2 class="panel-title" style="background: #f0f0f0; color: #333">
                                            <a role="button" data-toggle="collapse" data-parent="#additional_fields"
                                               href="#additional_fields" aria-expanded="false"
                                               aria-controls="additional_fields" class="collapse">Additional Fields
                                            </a>
                                        </h2>
                                    </div>

                                    <div id="additional_fields" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne_10" aria-expanded="true">
                                        <div class="panel-body" style="padding-top: 35px !important;">



                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line chosen-bx" style="padding-right:25px;">
                                        <select name="extension_trunk" id="extension_trunk"
                                                class="form-control chosen-select" data-placeholder=" ">
                                            <option value=""></option>
                                            @if(auth()->user()->type=='reseller')
                                                @foreach($ext_trunk as $row)
                                                    <option value="{{ $row->id }}" @if($row->id==@$user->extension_trunk || old('extension_trunk') == $row->id){{"selected"}} @elseif(!isUrlAcefone() && $row->id == 'Mypbx_5bf3e6d91b014') {{ 'selected' }} @endif>{{ $row->name }}</option>
                                                @endforeach
                                            @else

                                                @foreach($trunk as $row)
                                                    <option value="{{ $row->id }}" @if($row->id==@$user->extension_trunk || old('extension_trunk') == $row->id){{"selected"}} @elseif(!@$user->extension_trunk && $row->id == 'Mypbx_5bf3e6d91b014') {{ 'selected' }} @endif>{{ $row->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="form-label">Extension Trunk*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top:0;color:#488ace;"
                                           title="{{Lang::get('messages.user_extension_trunk')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line chosen-bx" style="padding-right:25px;">
                                        <select name="failover_extension_trunk" id="failover_extension_trunk"
                                                class="form-control chosen-select" data-placeholder=" ">
                                            <option value=""></option>
                                            @if(auth()->user()->type=='reseller')
                                                @foreach($ext_trunk as $row)
                                                    <option value="{{ $row->id }}" @if($row->id==@$user->failover_extension_trunk || old('failover_extension_trunk') == $row->id){{"selected"}} @elseif($row->id == 'Mypbx_5bf3e6d91b014') {{ 'selected' }} @endif>{{ $row->name }}</option>
                                                @endforeach
                                            @else


                                                @foreach($trunk as $row)
                                                    <option value="{{ $row->id }}"
                                                    @if($row->id == @$user->failover_extension_trunk || old('failover_extension_trunk') == $row->id)
                                                        {{"selected"}}
                                                    @elseif($row->id == 'Mypbx_5bf3e6d91b014' && !@$user->failover_extension_trunk)
                                                        {{ 'selected' }}
                                                    @endif>
                                                        {{ $row->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="form-label">Failover Extension Trunk*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top:0;color:#488ace;"
                                           title="{{Lang::get('messages.failover_extension_trunk')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="c2c_trunk" id="c2c_trunk" class="form-control"
                                                data-placeholder=" ">
                                            <option value=""></option>
                                            <option >Select An Option</option>
                                            @if(auth()->user()->type=='reseller')
                                                @foreach($click_trunk as $row)
                                                    <option value="{{ $row->id }}" @if($row->id==@$user->c2c_trunk || old('c2c_trunk') == $row->id){{"selected"}}  @elseif($row->id == 'Mypbx_5bf3e6d91b014' && empty($user->c2c_trunk) ) {{ 'selected' }}  @endif>{{ $row->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach($trunk as $row)
                                                    <option value="{{ $row->id }}" @if($row->id==@$user->c2c_trunk || old('c2c_trunk') == $row->id) {{ 'selected' }}  @elseif($row->id == 'Mypbx_5bf3e6d91b014' && empty($user->c2c_trunk)) {{ 'selected' }} @endif>{{ $row->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                        <label class="form-label"> Click to Call Trunk</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_c2c_trunk')}}">help_outline</i>
                                    </div>
                                    {!! $errors->first('c2c_trunk', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" min="0" class="form-control" name="c2c_limit"
                                               @if(!empty($user)) value="{{@$user->c2c_limit}}"
                                               @else value="{{ old('c2c_limit') }}" @endif style="width: 100%"
                                               onkeypress="return isNumberKey(event)">
                                        <label class="form-label"> Click to Call Concurrent Limit</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_c2c_limit')}}">help_outline</i>
                                    </div>
                                    {!! $errors->first('c2c_limit', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            @if(config('app.modules')['broadcast'])
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="broadcast_trunk" id="broadcast_trunk" class="form-control chosen-select"
                                                data-placeholder=" ">
                                            <option value=""></option>
                                            <option >Select An Option</option>
                                            @if(auth()->user()->type=='reseller')
                                                @foreach($broad_trunk as $row)
                                                    <option value="{{ $row->id }}" @if($row->id==@$user->broadcast_trunk || old('broadcast_trunk') == $row->id){{"selected"}} @elseif(!isUrlAcefone() && $row->id == 'Mypbx_5bf3e6d91b014') {{ 'selected' }} @endif>{{ $row->name }}</option>
                                                @endforeach
                                            @else
                                                @foreach($trunk as $row)
                                                    <option value="{{ $row->id }}" @if($row->id==@$user->broadcast_trunk || old('broadcast_trunk') == $row->id){{"selected"}} @elseif(!isUrlAcefone() && $row->id == 'Mypbx_5bf3e6d91b014') {{ 'selected' }} @endif>{{ $row->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="form-label"> Broadcast Trunk</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_broadcast_trunk')}}">help_outline</i>
                                    </div>
                                    {!! $errors->first('broadcast_trunk', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                                {{--<div class="clearfix"></div>--}}

                            <div class="col-md-6" style="display: none;">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" min="0" class="form-control" name="broadcast_limit"
                                               value="100" style="width: 100%"
                                               onkeypress="return isNumberKey(event)">
                                        <label class="form-label"> Broadcast Call Concurrent Limit</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_broadcast_limit')}}">help_outline</i>
                                    </div>
                                    {!! $errors->first('broadcast_limit', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            @endif



                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="recording_access" class="form-control" id="recording_access" @if(!empty($user)) value="{{ $user['recording_access'] }}" @else value="{{ old('recording_access') }}" @endif required>
                                            <option value="1" @if(!empty($user) && $user['recording_access'] == '1') selected @endif>No access</option>
                                            <option value="2" @if((!empty($user) && $user['recording_access'] == '2') || empty($user)) selected @endif>Approval Required</option>
                                            <option value="3" @if(!empty($user) && $user['recording_access'] == '3') selected @endif>No Approval Required</option>
                                        </select>
                                        <label class="form-label">Recording Access</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.recording_access')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>


                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                        {{--<div class="inn-wrapper">--}}
                            {{--<div class="header">--}}
                                {{--<h2>--}}
                                    {{--Additional Fields--}}
                                {{--</h2>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="inn-wrapper">--}}

                        <!-- <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line" style="padding-right:25px;">
                                        <select id="web_server" name="web_server" class="form-control">
                                            @foreach($servers as $server)
                            <option value="{{ $server->id }}" @if( !empty($user) ) @if( $user->web_server == $server->id ) {{ 'selected' }}  @endif @endif >{{ $server->server_name }}</option>
                                            @endforeach
                                </select>
                                <label class="form-label">Web Server</label>
                                <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                   style="position: absolute;right: 0;top:-2px;color:#488ace;"
                                   title="{{Lang::get('messages.user_server')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-web"
                                          style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('web_server', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div> -->

                            @if(!empty($user))
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select id="servername" name="servername" class="form-control">
                                                @foreach($servers_list as $servers)
                                                    <option value="{{ $servers->id }}" @if($user->pbx_server == $servers->id) {{ "selected" }} @endif>{{ $servers->host.":".$servers->port }}</option>
                                                @endforeach
                                            </select>
                                            <label class="form-label">PBX Server</label>
                                            <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                               style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                               title="{{Lang::get('messages.user_clientid')}}">help_outline</i>
                                        </div>
                                        <span id="errormsg-servername" style="display:none; color: red;">This field is required.</span>
                                        {!! $errors->first('servername', '<p class="help-block" style="color: red" >:message</p>') !!}
                                    </div>
                                </div>
                            @endif

                            <div class="clearfix"></div>

                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Call Broadcast Timing</div>
                                    <div class="form-line">
                                        <select name="broadcast_time" id="broadcast_time" class="form-control">
                                            <option value="1" @if( !empty($user) && $user->broadcast_time == '1' ) {{'selected'}}  @endif >
                                                Default
                                            </option>
                                            <option value="2" @if( (!empty($user) && $user->broadcast_time == '2') || empty($user) ) {{'selected'}}  @endif>
                                                24*7
                                            </option>
                                            <option value="3" @if( !empty($user) && $user->broadcast_time == '3' ) {{'selected'}}  @endif>
                                                Custom
                                            </option>
                                        </select>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.broadcast_time')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Call Broadcast Start</div>
                                    <div class="form-line">
                                        <input type="text" id="broadcast_start" name="broadcast_start"
                                               class="timepicker form-control" placeholder="From Time"
                                               @if( !empty($user) ) value="{{ $user->broadcast_start }}"
                                               @else value='' @endif >

                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.broadcast_start')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Call Broadcast End</div>
                                    <div class="form-line">
                                        <input type="text" id="broadcast_end" name="broadcast_end"
                                               class="timepicker form-control" placeholder="To Time"
                                               @if( !empty($user) ) value="{{ $user->broadcast_end }}"
                                               @else value='' @endif >

                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.broadcast_end')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" hidden>
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Allow Extensions</div>
                                    <div class="switch">
                                        <label><input type="checkbox" id="extension_status"
                                                      onclick="shownumberext(this)"
                                                      name="extension_status" checked><span
                                                    class="lever switch-col-cyan"></span></label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.allowextension')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">OTP Authentication (CDR)</div>
                                    <div class="switch">
                                        <label><input type="checkbox" id="allow_cdr_otp"
                                                      name="allow_cdr_otp"
                                                      @if( !empty($user) ) @if( $user->allow_cdr_otp ) {{"checked"}} @endif @else checked @endif ><span
                                                    class="lever switch-col-cyan"></span></label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 15px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.allow_cdr_otp')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="extensions_div" hidden>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="extensions" name="extensions" class="form-control" value="99999">
                                        <label class="form-label">Number of Extensions</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_number_of_extensions')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-extensions" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('extensions', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="CaptchaLen" name="CaptchaLen" class="form-control"  max="4" min="1"
                                               @if( !empty($user)&& !empty($user->captcha_length)) value="{{ $user->captcha_length  }}"
                                               @else value='4' @endif >
                                        <label class="form-label">Captcha Length</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.captchalength')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-extensions" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('extensions', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            @if( !isTypeReseller() && config('app.modules')['forwarding_campaign'])
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group form-float">--}}
                                        {{--<div class="demo-switch-title">Call Recording for Forwarding Campaign</div>--}}
                                        {{--<div class="switch">--}}
                                            {{--<label><input type="checkbox" id="call_recording"--}}
                                                          {{--name="call_recording"--}}
                                                          {{--@if( !empty($user) ) @if( $user->call_recording ) {{"checked"}} @endif @else @if(old("call_recording") == 'on') checked @endif @endif ><span--}}
                                                        {{--class="lever switch-col-cyan"></span></label>--}}
                                            {{--<i data-toggle="tooltip" class="material-icons" aria-hidden="true"--}}
                                               {{--style="position: absolute;right: 0px;top: 5px;color:#488ace;"--}}
                                               {{--title="{{Lang::get('messages.user_recording')}}">help_outline</i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="col-md-6" id="recordingExpiryBlock"
                                     @if(!empty($user) && $user->call_recording) @else hidden @endif>
                                    <div class="form-group form-float">
                                        <div class="form-line" style="padding-right:25px;">
                                            <select id="recording_expiry" name="recording_expiry" class="form-control">
                                                @for($month=1; $month<=11; $month++)
                                                    <option value="{{ $month * 30 }}"
                                                            @if(empty($user) && $month == 6) selected
                                                            @endif @if(!empty($user) && $user->recording_expiry == ($month*30)) selected @endif @if(empty($user) && old('recording_expiry') == $month*30 ) {{ 'selected' }} @endif >{{ $month }} @if($month == 1)
                                                            month @else months @endif</option>
                                                @endfor
                                                @for($year=1; $year<=7; $year++)
                                                    <option value="{{ $year*365 }}"
                                                            @if(!empty($user) && $user->recording_expiry == ($year*365)) selected @endif @if(empty($user) && old('recording_expiry') == $year*365 ) {{ 'selected' }} @endif>{{ $year }} @if($year == 1)
                                                            year @else years @endif</option>
                                                @endfor
                                            </select>
                                            <label class="form-label">Keep recordings for</label>
                                            <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                               style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                               title="{{Lang::get('messages.recording_expiry')}}">help_outline</i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{--<div class="col-md-6" style="display: none;">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Market Place Status</div>
                                    <div class="switch">
                                        <label><input type="checkbox" id="marketplace_status"
                                                      name="marketplace_status"><span
                                                    class="lever switch-col-cyan"></span></label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.user_marketplace')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="clearfix"></div>
                        {{--</div>--}}
                        {{--<div class="inn-wrapper">--}}
                            {{--<div class="header">--}}
                                {{--<h2>--}}
                                    {{--Zoho CRM Integration--}}
                                {{--</h2>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group form-float">--}}
                                    {{--<div class="demo-switch-title">Allow Zoho Integration</div>--}}
                                    {{--<div class="switch">--}}
                                        {{--<label><input type="checkbox" id="zoho_integration"--}}
                                                      {{--name="zoho_integration"--}}
                                                      {{--@if( !empty($user) )--}}
                                                      {{--@if( $user->is_zoho_enabled )--}}
                                                      {{--{{"checked"}}--}}
                                                      {{--@endif--}}
                                                      {{--@else--}}
                                                      {{--@if(old("zoho_integration") == 'on')--}}
                                                      {{--checked--}}
                                                    {{--@endif--}}
                                                    {{--@endif ><span--}}
                                                    {{--class="lever switch-col-cyan"></span></label>--}}
                                        {{--<i data-toggle="tooltip" class="material-icons" aria-hidden="true"--}}
                                           {{--style="position: absolute;right: 0px;top: 5px;color:#488ace;"--}}
                                           {{--title="To Enable or Disable Zoho CRM">help_outline</i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="clearfix"></div>
                        @if(empty($user))
                            {{--<div class="inn-wrapper">--}}
                                <div class="header">
                                    <h2>
                                        Billing
                                    </h2>
                                </div>
                            {{--</div>--}}

                        {{--<div class = "inn-wrapper">--}}
                        <div class="clearfix"></div><br>
                            @if(empty($user))
                                <input type="hidden" id="billing_status" name="billing_status" value="1">
                            @endif
                            <div class="clearfix"></div>
                            <div id = "billing_div" class = "billing_div">
                            @if( isTypeAdmin() )
                                <div class="col-md-6" id="connection_charge_div">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="connection_charge" class="form-control"
                                                    id="connection_charge" data-placeholder=" ">
                                                @isset($connectionCharges)
                                                    @foreach($connectionCharges as $connectionCharge)
                                                        <option value="{{ $connectionCharge->id }}" @if((empty($user) && old('connection_charge') == $connectionCharge->id) || $connectionCharge->charge==0) {{" selected "}} @endif >{{ $connectionCharge->charge }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                            <label class="form-label">Connection Charge</label>
                                            <span style="font-size: 13px; color:red; display: none;"
                                                id="connectionChargeValidationMessage">This field is required.</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="connection_charge" class="form-control" id="connection_charge" value="1">
                            @endif

                            <div class="col-md-6" id="billing_start_date_div">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="billing_start_date"
                                            class="form-control" readonly
                                            id="billing_start_date" required @if(empty($user)) value="{{ date('Y-m-d') }}" @endif>
                                        <label class="form-label">Billing Start Date*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.billing_start_date')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="next_billing_date_div">
                                <div class="form-group form-float" id="nextBillingDateInput">
                                    <div class="form-line">
                                        <input type="text" name="next_billing_date"
                                            class="datepicker form-control"
                                            id="next_billing_date" required readonly @if(empty($user)) value="{{ old('next_billing_date') }}" @endif >
                                        <label class="form-label">Next Billing Date*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.next_billing_date')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="end_date_div">
                                <div class="form-group form-float" id="endDateInput" hidden>
                                    <div class="form-line">
                                        <input type="text" name="end_date"
                                            class="datepicker form-control"
                                            id="end_date" required readonly @if(empty($user)) value="{{ old('end_date') }}" @endif >
                                        <label class="form-label">End Date*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.billing_end_date')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="clearfix"></div>--}}

                            <div class="col-md-6" id="plan_type_div">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="plan_type" class="form-control" id="plan_type" required>
                                            @foreach(config('billing.plan_types') as $key=>$val)
                                                <option value="{{ $key }}" @if(empty($user) && old('plan_type') == $key) {{" selected "}} @endif >{{ ucfirst($val) }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Billing Type*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.billing_type')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            @permission('view-grace-period')
                            <div class="col-md-6" id="grace_period_div">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="grace_period" class="form-control" id="grace_period" required @if(empty($user)) @if(!empty(old('grace_period'))) value="{{ old('grace_period') }}" @else value="3" @endif @else @endif>
                                        <label class="form-label">Grace Period*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.billing_grace_period')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            @endpermission
                            <div class="col-md-6" id="currency_div">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="currency" class="form-control" id="currency" @if(config('app.modules')['membership_plan']) onchange="getmembershipPlans()" @endif>
                                            @if(isset($allowed_currencies))
                                                @foreach($allowed_currencies as $allowed_currency)
                                                    <option value="{{ $allowed_currency }}"
                                                    @if(empty($billing_data))
                                                        @if(old('currency') == $allowed_currency)
                                                            {{ "selected" }}
                                                        @elseif(isUrlAcefone() && $allowed_currency == 'GBP')
                                                            {{ "selected" }}
                                                        @endif
                                                    @else
                                                        @if($billing_data['currency'] == $allowed_currency)
                                                            {{ "selected" }}
                                                        @endif
                                                        disabled
                                                    @endif
                                                    >{{ ucfirst($allowed_currency) }}</option>
                                                @endforeach
                                            @else
                                                @foreach(config('billing.currencies') as $key=>$val)
                                                    <option value="{{ $key }}"
                                                    @if(empty($billing_data))
                                                        @if(old('currency') == $key)
                                                            {{ "selected" }}
                                                        @elseif(isUrlAcefone() && $key == 'GBP')
                                                            {{ "selected" }}
                                                        @endif
                                                    @else
                                                        @if($billing_data['currency'] == $key)
                                                            {{ "selected" }}
                                                        @endif
                                                        disabled
                                                    @endif
                                                    >{{ ucfirst($val) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="form-label">Currency*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.billing_currency')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="billing_timezone" class="form-control" id="billing_timezone" required>
                                                <option value="501" selected>America/New York</option>
                                        </select>
                                        <label class="form-label">Billing Timezone*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.billing_timezone')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group form-float fld_margin m-t-20">
                                    <span id="billingValidationMessage" style="font-size: 13px; color: red;"></span>
                                </div>
                            </div>

                            {{--@if(auth()->user()->type == 'reseller')--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group form-float">--}}
                                        {{--<div class="form-line">--}}
                                            {{--<input type="text" name="contract_end_date"--}}
                                                   {{--class="datepicker form-control"--}}
                                                   {{--id="contract_end_date" required @if(empty($user)) value="{{ old('contract_end_date') }}" @endif>--}}
                                            {{--<label class="form-label">Contract End Date*</label>--}}
                                            {{--<i data-toggle="tooltip" class="material-icons" aria-hidden="true"--}}
                                               {{--style="position: absolute;right: 0px;top: 5px;color:#488ace;"--}}
                                               {{--title="{{Lang::get('messages.billing_contract_end_date')}}">help_outline</i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group form-float">--}}
                                        {{--<div class="form-line">--}}
                                            {{--<select name="contract_service_flag" class="form-control" id="contract_service_flag" required>--}}
                                                {{--<option value="1"> YES</option>--}}
                                                {{--<option value="0"> NO</option>--}}
                                            {{--</select>--}}
                                            {{--<label class="form-label">Stop Services After Contract Expire</label>--}}
                                            {{--<i data-toggle="tooltip" class="material-icons" aria-hidden="true"--}}
                                               {{--style="position: absolute;right: 0px;top: 5px;color:#488ace;"--}}
                                               {{--title="{{Lang::get('messages.billing_stop_services')}}">help_outline</i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}


                        </div>



                    {{--<div class="clearfix"></div>--}}
                    {{--<div class="inn-wrapper">--}}
                            {{--<div class="header">--}}
                                {{--<h2>--}}
                                    {{--Membership Plan Discount--}}
                                {{--</h2>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                        <div class="inn-wrapper" hidden>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Allow Discount</div>
                                    <div class="switch">
                                        <label><input type="checkbox" id="allow_discount"
                                                      onclick="showdiscountOptions(this)"
                                                      name="allow_discount"
                                                      ><span
                                                    class="lever switch-col-cyan"></span></label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.allow_discount')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                           <!--  @if($page_type=='edit')
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="demo-switch-title">Edit Discount</div>
                                    <div class="switch">
                                        <label><input type="checkbox" id="edit_discount"
                                                      onclick="editDiscount(this)"
                                                      name="edit_discount"
                                                      ><span
                                                    class="lever switch-col-cyan"></span></label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0px;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.edit_discount')}}">help_outline</i>
                                    </div>
                                </div>
                            </div>
                            @endif -->


                            <div class="clearfix"></div>
                            <div id="discount_options">

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="discount_type" class="form-control" id="discount_type" onchange="changediscountLabels()">
                                            <option value="amount" @if(!empty($membership_discount) && $membership_discount['discount_type']=='amount') selected @endif>Amount</option>
                                            <option value="percentage" @if(!empty($membership_discount) && $membership_discount['discount_type']=='percentage') selected @endif>Percentage</option>
                                        </select>
                                        <label class="form-label">Discount Type*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.discount_type')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-discount_type" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('discount_type', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="discount_valid_from" class="form-control" id="discount_valid_from">
                                            <option @if(!empty($membership_discount['discount_valid_from']) && $membership_discount['discount_valid_from']=='today') selected @endif value="today">Today</option>

                                                <option @if(!empty($membership_discount['discount_valid_from']) && $membership_discount['discount_valid_from']=='nextbillingdate') selected @endif value="nextbillingdate">Next Billing Date</option>

                                        </select>
                                        <label class="form-label">Discount Valid From*</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.discount_type')}}">help_outline</i>
                                    </div>

                                    <span id="errormsg-discount_valid_from" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('discount_valid_from', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control" name="discount_validity"
                                                        id="discount_validity">
                                            @for($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                            <option value="0">Always</option>
                                        </select>
                                        <label class="form-label">Discount Validity (months)</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.discount_validity')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-discount_validity" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('discount_validity', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="membership_plan_discount" class="form-control" id="membership_plan_discount"  @if(!empty($membership_discount['membership_plan_discount'])) value="{{ $membership_discount['membership_plan_discount']}}" @else value="{{old('membership_plan_discount')}}" @endif>
                                        <label class="form-label">Membership Plan Discount(amount)</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#488ace;"
                                           title="{{Lang::get('messages.membership_plan_discount')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-membership_plan_discount" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('membership_plan_discount', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="membership_plan_discount_validity" class="form-control" id="membership_plan_discount_validity"  @if(empty($user)) value="{{ old('membership_plan_discount_validity') }}" @endif>
                                        <label class="form-label">Membership Plan Discount Validity</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#00bcd4;"
                                           title="{{Lang::get('messages.membership_plan_discount_validity')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-membership_plan_discount_validity" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('membership_plan_discount_validity', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div> -->



                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group form-float">--}}
                                    {{--<div class="form-line">--}}
                                        {{--<input type="number" name="monitoring_price_discount" class="form-control" id="monitoring_price_discount"  @if(!empty($membership_discount['monitoring_price_discount'])) value="{{ $membership_discount['monitoring_price_discount']}}" @else value="{{old('monitoring_price_discount')}}" @endif>--}}
                                        {{--<label class="form-label">Call Monitoring Price Discount(amount)</label>--}}
                                        {{--<i data-toggle="tooltip" class="material-icons" aria-hidden="true"--}}
                                           {{--style="position: absolute;right: 0;top: 5px;color:#00bcd4;"--}}
                                           {{--title="{{Lang::get('messages.monitoring_price_discount')}}">help_outline</i>--}}
                                    {{--</div>--}}
                                    {{--<span id="errormsg-monitoring_price_discount" style="display:none; color: red;">This field is required.</span>--}}
                                    {{--{!! $errors->first('monitoring_price_discount', '<p class="help-block" style="color: red" >:message</p>') !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <!-- <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="monitoring_discount_validity" class="form-control" id="monitoring_discount_validity"  @if(empty($user)) value="{{ old('monitoring_discount_validity') }}" @endif>
                                        <label class="form-label">Call Monitoring Price Discount Validity(amount)</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#00bcd4;"
                                           title="{{Lang::get('messages.monitoring_discount_validity')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-monitoring_discount_validity" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('monitoring_discount_validity', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div> -->

                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group form-float">--}}
                                    {{--<div class="form-line">--}}
                                        {{--<input type="number" name="queue_price_discount" class="form-control" id="queue_price_discount"  @if(!empty($membership_discount['queue_price_discount'])) value="{{ $membership_discount['queue_price_discount']}}" @else value="{{old('queue_price_discount')}}" @endif>--}}
                                        {{--<label class="form-label">Queue Price Discount(amount)</label>--}}
                                        {{--<i data-toggle="tooltip" class="material-icons" aria-hidden="true"--}}
                                           {{--style="position: absolute;right: 0;top: 5px;color:#00bcd4;"--}}
                                           {{--title="{{Lang::get('messages.queue_price_discount')}}">help_outline</i>--}}
                                    {{--</div>--}}
                                    {{--<span id="errormsg-queue_price_discount" style="display:none; color: red;">This field is required.</span>--}}
                                    {{--{!! $errors->first('queue_price_discount', '<p class="help-block" style="color: red" >:message</p>') !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <!-- <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="queue_discount_validity" class="form-control" id="queue_discount_validity"  @if(empty($user)) value="{{ old('queue_discount_validity') }}" @endif>
                                        <label class="form-label">Queue Price Discount Validity</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#00bcd4;"
                                           title="{{Lang::get('messages.queue_discount_validity')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-queue_discount_validity" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('queue_discount_validity', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div> -->

                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group form-float">--}}
                                    {{--<div class="form-line">--}}
                                        {{--<input type="number" name="conference_price_discount" class="form-control" id="conference_price_discount"  @if(!empty($membership_discount['conference_price_discount'])) value="{{ $membership_discount['conference_price_discount']}}" @else value="{{old('conference_price_discount')}}" @endif>--}}
                                        {{--<label class="form-label">Conference Price Discount(amount)</label>--}}
                                        {{--<i data-toggle="tooltip" class="material-icons" aria-hidden="true"--}}
                                           {{--style="position: absolute;right: 0;top: 5px;color:#00bcd4;"--}}
                                           {{--title="{{Lang::get('messages.conference_price_discount')}}">help_outline</i>--}}
                                    {{--</div>--}}
                                    {{--<span id="errormsg-conference_price_discount" style="display:none; color: red;">This field is required.</span>--}}
                                    {{--{!! $errors->first('conference_price_discount', '<p class="help-block" style="color: red" >:message</p>') !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <!-- <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="conference_discount_validity" class="form-control" id="conference_discount_validity"  @if(empty($user)) value="{{ old('conference_discount_validity') }}" @endif>
                                        <label class="form-label">Conference Price Discount Validity</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#00bcd4;"
                                           title="{{Lang::get('messages.conference_discount_validity')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-conference_discount_validity" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('conference_discount_validity', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div> -->

                            <!-- <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="recording_price_discount" class="form-control" id="recording_price_discount"  @if(empty($user)) value="{{ old('recording_price_discount') }}" @endif>
                                        <label class="form-label">Recording Price Discount(amount)</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#00bcd4;"
                                           title="{{Lang::get('messages.recording_price_discount')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-recording_price_discount" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('recording_price_discount', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" name="recording_discount_validity" class="form-control" id="recording_discount_validity"  @if(empty($user)) value="{{ old('recording_discount_validity') }}" @endif>
                                        <label class="form-label">Recording Price Discount Validity</label>
                                        <i data-toggle="tooltip" class="material-icons" aria-hidden="true"
                                           style="position: absolute;right: 0;top: 5px;color:#00bcd4;"
                                           title="{{Lang::get('messages.recording_discount_validity')}}">help_outline</i>
                                    </div>
                                    <span id="errormsg-recording_discount_validity" style="display:none; color: red;">This field is required.</span>
                                    {!! $errors->first('recording_discount_validity', '<p class="help-block" style="color: red" >:message</p>') !!}
                                </div>
                            </div> -->

                            </div>
                        </div>
                        @endif
                                    </div>
                                </div>
                            </div>
                            </div>
                            {{--<div class="inn-wrapper">--}}
                                <div class="col-sm-12">
                                    <button type="submit" id="savebutton"
                                            class="btn btn-primary m-t-15 waves-effect">Save
                                    </button>
                                    <button type="button" onclick="window.history.back()"
                                            class="btn btn-default m-t-15 waves-effect">Cancel
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            {{--</div>--}}

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    @parent
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/momentjs/moment.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

    <script type="text/javascript">

        $(document).ready( function() {
            if($('#broadcast_time').val() == '3'){

                $('#broadcast_start').prop('disabled',false);
                $('#broadcast_end').prop('disabled',false);
            }
            else
            {
                if($('#broadcast_time').val()=='1'){

                    var var1;
                    $('#broadcast_start').val('09:00:00');
                    $('#broadcast_end').val('21:00:00');}
                else {

                    $('#broadcast_start').val('00:00:00');
                    $('#broadcast_end').val('23:59:59');
                }


                $('#broadcast_start').prop('disabled',true);
                $('#broadcast_end').prop('disabled',true);
            }






            $('#broadcast_time').change(function(){

                if($(this).val() == '3'){

                    $('#broadcast_start').prop('disabled',false);
                    $('#broadcast_end').prop('disabled',false);
                }
                else
                {
                    if($(this).val()=='1'){

                        $('#broadcast_start').val('09:00:00');
                        $('#broadcast_end').val('21:00:00');}
                    else {

                        $('#broadcast_start').val('00:00:00');
                        $('#broadcast_end').val('23:59:59');
                    }


                    $('#broadcast_start').prop('disabled',true);
                    $('#broadcast_end').prop('disabled',true);
                }
            });
        });

        $("#broadcast_start").datetimepicker({
            format: 'HH:mm:ss'
        });

        $("#broadcast_end").datetimepicker({
            format: 'HH:mm:ss'
        });


        $(document).ready(function () {
            checkBillingType();
        });var id = "{{$id}}";
        if(id){
            var login_id_exists=0;
        }else{
            var login_id_exists=1;
        }


        var autoGeneratedPassword=0;
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        var date = new Date().toJSON().slice(0, 10);

        //date after 30 days
        function getDateAfterThirtyDays(date) {
            var today = new Date(date);
            today.setDate(today.getDate() + 30);
            var thirtyDays = today.toJSON().slice(0, 10);
            return thirtyDays;
        }


        //first of next month
        // function getNextMonthDate(date) {
        //     var today = new Date(date);
        //     var month = today.getMonth();
        //     month = month + 2;
        //     if (month < 10) {
        //         month = '0' + month;
        //     }
        //     var year = today.getFullYear();
        //     if (month == '01') {
        //         year++;
        //     }
        //     var nextMonth = year + '-' + month + '-01';
        //     return nextMonth;
        // }
        // @if($page_type=='edit')
        // editDiscount();
        // function editDiscount(){
        //     if($("#edit_discount").is(':checked')){
        //         $('#discount_type option:not(:selected)').attr('disabled', false);
        //         $('#discount_valid_from option:not(:selected)').attr('disabled', false);

        //         $("#membership_plan_discount").prop("readonly",false);
        //         $("#monitoring_price_discount").prop("readonly",false);
        //         $("#queue_price_discount").prop("readonly",false);
        //         $("#conference_price_discount").prop("readonly",false);
        //     }else{
        //         $('#discount_type option:not(:selected)').attr('disabled', true);
        //         $('#discount_valid_from option:not(:selected)').attr('disabled', true);
        //         $("#membership_plan_discount").prop("readonly",true);
        //         $("#monitoring_price_discount").prop("readonly",true);
        //         $("#queue_price_discount").prop("readonly",true);
        //         $("#conference_price_discount").prop("readonly",true);
        //     }
        // }
        // @endif

        @if(config('app.modules')['membership_plan'])
        getmembershipPlans();
        @endif
        function getmembershipPlans(){
                var currency = $("#currency").val();
                var membership_plan = "";

            $.ajax({
                    type: "POST",
                    url: "{{url('/get-membership-plans')}}",
                    data : {
                        'currency' : currency,
                        'type' : 'customer',
                    },
                    success: function (result) {
                        var result = result.trim();
                        var plans = JSON.parse(result);
                        var plan_options = "<option value=''></option>";

                        for (var plan in plans) {
                            plan_options += "<option data-name='"+ plans[plan]['visible_name'] +"' value='"+plans[plan]['id']+"'";
                            if(plans[plan]['id']==membership_plan){
                               plan_options += " selected ";
                               $("#membership_plan").parent().addClass('focused');
                            }
                            plan_options += "> "+ plans[plan]['internal_name'] +"-(" + plans[plan]['visible_name'] + ")</option>";
                        }
                        $("#membership_plan").html(plan_options);


                        // setclientPlanName();
                    },
                    error: function(xhr, status, error) {
                    }

                });
        }


        // setclientPlanName();
        function setclientPlanName(){


            if($("#membership_plan").val()){

                var clientPlanName = $("#membership_plan").find(':selected').attr('data-name');
                $("#client_plan_name_option").show();
                $("#client_plan_name").val(clientPlanName);
                $("#client_plan_name").parent().addClass("focused");
            }else{
                $("#client_plan_name_option").hide();
            }


        }



        changediscountLabels();
        function changediscountLabels(){
            if($("#discount_type").val()=="percentage"){

                $("#membership_plan_discount").next().html("Membership Plan Discount(percentage)");
                $("#monitoring_price_discount").next().html("Call Monitoring Price Discount(percentage)");
                $("#queue_price_discount").next().html("Queue Price Discount(percentage)");
                $("#conference_price_discount").next().html("Conference Price Discount(percentage)");
                // $("#recording_price_discount").next().html("Recording Price Discount(percentage)");

            }else if($("#discount_type").val()=="amount"){
                $("#membership_plan_discount").next().html("Membership Plan Discount(amount)");
                $("#monitoring_price_discount").next().html("Call Monitoring Price Discount(amount)");
                $("#queue_price_discount").next().html("Queue Price Discount(amount)");
                $("#conference_price_discount").next().html("Conference Price Discount(amount)");
                // $("#recording_price_discount").next().html("Recording Price Discount(amount)");
            }
        }



        showdiscountOptions();
        function showdiscountOptions(obj=null){


            if($("#membership_plan").val()){

                if($("#allow_discount").is(':checked')){

                    $("#discount_options").show();
                }else{
                    $("#discount_options").hide();
                }
            }else{

               $("#allow_discount").prop("checked",false);
               $("#discount_options").hide();
               if(obj){
                showNotification('alert-success', 'Please select membership plan to allow discount.', 'top', 'center', 'animated fadeInDown', 'animated fadeOutUp');
               }
            }

        }



        function getNextMonthDate(date) {

            var today = new Date(date);
            var month = today.getMonth();
            today.setMonth(month + 1);
            today.setDate(1);
            return moment(today).format('YYYY-MM-DD');
        }


        //date after one year
        function getNextYearDate(date) {
            var today = new Date(date);
            var year = today.getFullYear();
            var month = today.getMonth();
            var day = today.getDate();
            month++;
            if (month < 10) {
                month = '0' + month;
            }
            var nextYear = year + 1 + '-' + month + '-' + day;
            return nextYear;
        }


        //same date of next month
        function getSameDayDate(inputDate) {
            var today = new Date(inputDate);
            var date = today.getDate();
            var month = today.getMonth();
            month = month + 2;
            if (month < 10) {
                month = '0' + month;
            }
            var year = today.getFullYear();
            if (month == '01') {
                year++;
            }
            if (date < 10) {

                date = '0' + date;
            }
            var lastDate = new Date(year, month, 0).getDate();
            if (date > lastDate) {
                date = '01';
            }
            var sameDay = year + '-' + month + '-' + date;
            return sameDay;
        }


        function getNextBillingDate(date, billingType) {

            if (billingType == 1) {

                return getDateAfterThirtyDays(date);
            }
            else if (billingType == 2) {

                return getNextMonthDate(date);
            } else if (billingType == 3) {
                return getNextYearDate(date);
            }
        }



        function showPassword() {

            if ($('#password').attr('type') == 'password')

                $('#password').attr('type', 'text');
            else
                $('#password').attr('type', 'password');
        }


        function autoGeneratePassword() {

            if($("#auto_generate_password").is(":checked")) {

                var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz@_";
                var pwd = "";
                var i;

                for (i = 0; i < 12; i++) {
                    var index = Math.floor(Math.random() * chars.length);
                    pwd += chars[index];
                }
                $('#password').val(pwd);
                $('#password').parent().addClass('focused');
                $('#credential_status').prop("checked", true);
                $('#force_reset_password').prop("checked", true);
                $('#password_div').show();
                $('#auto_generate_password_div').attr("class","col-md-2");
                autoGeneratedPassword = 1;
            }else{
                $('#password_div').show();
                $('#password').val("");
                $('#password').parent().addClass('focused');
                $('#auto_generate_password_div').attr("class","col-md-2");
                autoGeneratedPassword = 0;
            }
            

        }

        autoGeneratePassword();

        $('#password').on('input propertychange paste', function() {
            autoGeneratedPassword=0;
        });

        $('#credential_status').change(function() {
            if(!(this.checked) && autoGeneratedPassword) {

                $('#credential_status').prop("checked",true);
            }
        });

        // $('#force_reset_password').change(function() {
        //     if(!(this.checked) && autoGeneratedPassword) {
        //         $('#force_reset_password').prop("checked",true);
        //     }
        // });


        $("#login_id").keyup(function () {


            if ($('#heading').text() != ' Add Account ')

                return;

            // if ($('#login_id').val().trim().length < 6 || $('#login_id').val().trim().length > 15)
            //     $('#errormsg-login-id-validation').show();
            // else
            //     $('#errormsg-login-id-validation').hide();

            $.ajax({
                type: "POST",
                url: "{{url('/check-login-id-for-client')}}",
                data : {
                    'login_id' : $('#login_id').val().trim(),
                    'id' : id
                },
                success: function (res) {
                    if( res[0] == "true" ) {

                        $('#error-login-id').hide();
                        login_id_exists = 0;
                    }
                    else {

                        $('#error-login-id').show();
                        login_id_exists = 1;
                    }
                }

            });

            // if($('#login_id').val().trim().length < 6)
            //     $('#errormsg-login-id-validation').show();
            // else
            //     $('#errormsg-login-id-validation').hide();
        });

        /*function shownumberext(obj) {
            if ($("#extension_status").is(':checked')) {
                $("#extensions_div").show();
            } else {
                $("#extensions_div").hide();
            }
        }*/

        // function billingstatus(obj){
        //     if($("#billing_status").is(':checked')){
        //         $("#billing_div").show();
        //     }else{
        //         $("#billing_div").hide();
        //     }
        // }

        //billingstatus();

        $('#call_recording').change(function () {
            if ($(this).is(':checked')) {

                $('#recordingExpiryBlock').show();
            } else {
                $('#recordingExpiryBlock').hide();
            }
        });

        $("#call_recording").trigger("change");

        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
        $("#addclientform").validate({
            rules : {

                'name' : {

                    'checkblank' : true
                },
                'number' : {
                    'checkblank' : true,
                    'phone' : true
                },
                'company_name' : 'checkblank',
                'address' : 'checkblank',
                'country' : 'checkblank',
                'pincode' : {
                    'checkblank' : true,
                    'minlength' : 4,
                    'pincode' : true
                },
                'state' : 'checkblank',
                'timezone' : 'checkblank',
                'email' : 'checkblank',
                'login_id' : {
                    'nospace' : true,
                    'checkblank' : true,
                    'minlength' : 6
                },
                @if( isset($page_type) && $page_type == 'add' )
                'password' : 'checkblank',
                @endif

                {{--@if(isTypeReseller())--}}
                {{--'contract_end_date' : 'checkblank',--}}
                {{--@endif--}}
                'extension_trunk' : 'checkblank',
                // 'c2c_limit' : {
                //     'checkblank' : true,
                //     'checkpositive' : true
                // },
                // 'broadcast_limit' : {
                //     'checkblank' : true,
                //     'checkpositive' : true
                // },
                // 'broadcast_trunk' : 'checkblank',
                // 'c2c_trunk' : 'checkblank',
                'billing_start_date': 'checkblank',
                'next_billing_date': 'checkblank',
                'billing_type': 'checkblank',
                'client_id' : 'checkblank',

                @if(config('app.modules')['membership_plan'])
                'membership_plan_discount' : {'checkblank' : true,'number': true,'min' :0},
                // 'membership_plan_discount_validity' : 'checkpositive',
                'monitoring_price_discount' : {'checkblank' : true,'number': true,'min' :0},
                // 'monitoring_discount_validity' : 'checkpositive',
                'queue_price_discount' : {'checkblank' : true,'number': true,'min' :0},
                // 'queue_discount_validity' : 'checkpositive',
                'conference_price_discount' : {'checkblank' : true,'number': true,'min' :0},
                'discount_validity' : {'checkblank' : true,'number': true,'min' :0},

                // 'conference_discount_validity' : 'checkpositive',
                // 'recording_price_discount' : 'checkpositive',
                // 'recording_discount_validity' : 'checkpositive',
                'membership_plan' : 'checkblank',
                'client_plan_name' : 'checkblank',
                @endif

                // 'extensions' : 'checkpositive'
                },
                submitHandler: function (form) {
                    submitform();
                }
            });

        $.validator.addMethod("nospace", function (value) {
            return !hasWhiteSpace(value);return;
        }, 'This field should not contain spaces.');

        $.validator.addMethod("checkblank", function (value) {
            return ($.trim(value).length > 0);
        }, 'This field is required.');

        $.validator.addMethod("phone", function (value) {
            return /^[0-9]{1,15}$/.test(value);
        }, 'This field can contain at most 15 digits.');

        $.validator.addMethod("pincode", function (value) {
            return /^[a-zA-Z0-9]{1,10}$/.test(value);
        }, 'This field can contain at most 10 digits or letters.');

        $.validator.addMethod("email", function (value) {
            return /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(value);
        }, 'This email address is not valid.');

        $.validator.addMethod("checkpositive", function (value) {
            return (value >= 0);
        }, 'This filed should be a positive number.');

        $('#connection_charge').change(function () {
            if ($('#connection_charge').val() == null) {

                $('#connection_charge').parent().removeClass('focused');
            } else {
                $('#connection_charge').parent().addClass('focused');
            }
        });

        $('#plan_type').change(function() {
            if($('#plan_type').val() == '' || $('#plan_type').val() == null){

                $('#plan_type').parent().removeClass('focused');
            }else{
                $('#plan_type').parent().addClass('focused');
            }
        });

        $('#currency').change(function(){
            if($('#currency').val() == '' || $('#currency').val() == null){

                $('#currency').parent().removeClass('focused');
            }else{
                $('#currency').parent().addClass('focused');
            }
        });

        $('#grace_period').change(function(){
            if($('#grace_period').val() != ''){

                $('#grace_period').parent().addClass('focused');
            }else{
                $('#grace_period').parent().removeClass('focused');
            }
        });

        $('#billing_start_date').click(function () {
            if ($('#billing_type').val() == null) {

                $('#billingTypeValidationError').show();
            }
            else {

                $('#billingTypeValidationError').hide();
            }
        });

        $('#billing_type').change(function () {
            $('#billingTypeValidationError').hide();
            if ($(this).val() != null) {
                if($(this).val() == 3){

                    $('#nextBillingDateInput').hide();
                    $('#endDateInput').show();
                    if ($('#billing_start_date').val() != '') {
                        var startDate = new Date($('#billing_start_date').val());
                        startDate.setDate(startDate.getDate() + 10);
                        var endDate = startDate.toJSON().slice(0, 10);
                        $('#end_date').val(endDate);
                        $('#end_date').parent().addClass('focused');
                    }
                }else{

                    $('#endDateInput').hide();
                    $('#nextBillingDateInput').show();
                    if ($('#billing_start_date').val() != '') {
                        var nextBillingDate = getNextBillingDate($('#billing_start_date').val(), $('#billing_type').val());
                        $('#next_billing_date').val(nextBillingDate);
                        if ($('#billing_type').val() != null) {
                            $('#next_billing_date').parent().addClass('focused');
                        }
                    }

                }

            }

        });

        /*$('#billing_start_date').datetimepicker({
            format: 'YYYY-MM-DD',
            //minDate: today,
        }).on('dp.change', function (e) {
            if ($('#billing_type').val() == null) {
                $('#billingTypeValidationError').show();
            }
            else {
                $('#billingTypeValidationError').hide();
                if ($('#billing_type').val() == 3) {
                    var startDate = new Date($('#billing_start_date').val());
                    startDate.setDate(startDate.getDate() + 10);
                    var endDate = startDate.toJSON().slice(0, 10);
                    $('#end_date').val(endDate);
                    $('#end_date').parent().addClass('focused');
                } else {
                    var nextBillingDate = getNextBillingDate(this.value, $('#billing_type').val());
                    $('#next_billing_date').val(nextBillingDate);
                    $('#next_billing_date').parent().addClass('focused');
                }
            }
        });*/

        function submitform() {
            var edit = '<?php echo !empty($user) ? "1" : "0";  ?>';
            if (edit == 0) {
                if ($.trim($("#password").val()) == "") {

                    $("#errormsg-email").hide();
                    $("#errormsg-password").show();
                    return;
                }
            }



            if (($.trim($("#client_id").val()) == "") && $('#user_role').val() == '2') {

                $("#errormsg-password").hide();
                $("#errormsg-client_id").show();
                return;
            }
            var secondaryEmails = $.trim($("#secondary_email").val());
            var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if(secondaryEmails){
                var emails = secondaryEmails.split(",");
                for (email of emails){
                    if(!(emailRegex.test(email))){

                        $("#errormsg-secondary_email").show();
                        return;
                    }
                }

            }else{

                $("#errormsg-secondary_email").hide();
            }
            // if ($("#extension_status").is(":checked") && ($.trim($("#extensions").val()) == "")) {
            //     $("#errormsg-extensions").show();
            //     return;
            // }

            if($('#error-email').is(":visible")) {
                return;
            }


            $("#errormsg-trunk").hide();
            if(login_id_exists==0){
                document.getElementById("addclientform").submit();
            }else{
                $('#error-login-id').show();
            }


        }





        function checkBillingType()

        {

            if($("#billing_type").val() == 4)

            {

                $("#connection_charge_div").hide();
                $("#billing_start_date_div").hide();
                $("#next_billing_date_div").hide();
                $("#plan_type_div").hide();
                $("#grace_period_div").hide();
                $("#currency_div").hide();
                $("#end_date_div").hide();
            }
            else
            {
                $("#connection_charge_div").show();
                $("#billing_start_date_div").show();
                $("#next_billing_date_div").show();
                $("#plan_type_div").show();
                $("#grace_period_div").show();
                $("#currency_div").show();
                if($("#billing_type").val() == 3){
                    $("#next_billing_date_div").hide();
                    $("#end_date_div").show();
                }else{
                    $("#end_date_div").hide();
                    $("#next_billing_date_div").show();
                }
            }

        }





        $('#country').change(function (event) {

            loadState($(this).val())

        });

        $("#country").trigger("change");

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }


        function emailcheck() {

            // alert('1');
            var email = document.getElementById('email').value;
            var id = parseInt('{{ request()->route('id') }}');
            //alert(email);
            data = {
                'email': email,
                'id': id
            };
            $.ajax({
                type: "POST",
                url: "{{url('number/emailcheck')}}",
                data: data,
                success: function (data) {
                    if (data == 1) {

                        //  alert('email exist');
                        $("#savebutton").prop("type", "button");
                        document.getElementById("error-email").style.display = 'block';
                    }
                    else {

                        document.getElementById("error-email").style.display = 'none';
                        $("#savebutton").prop("type", "submit");
                    }
                    // alert('1');
                    // $("#choice").show();
                }
            });
        }
        function loadState(cval, isCallback) {

            var countryID = cval;
            if (countryID) {
                var url = '{{ url('/get-state-list', ':id') }}';
                url = url.replace(escape(':id'), countryID);

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (res) {
                        if (res) {

                            $("#state").empty();
                            //$("#state").append('<option value="">Select</option>');
                            $.each(res, function (key, value) {
                                $("#state").append('<option    ' + (isCallback && value.id == '<?php echo isset($user) ? $user->state : '';?>' ? 'selected' : '') + (value.id == '{{ old("state") }}' ? 'selected' : '') + '     value="' + value.id + '">' + value.name + '</option>');
                            });

                            if (isCallback) {
                            }

                            //$("#state").selectpicker('refresh');
                            $('#state').trigger("chosen:updated");
                            $('#state').parent().addClass('focused');
                        } else {
                            $("#state").empty();
                        }
                    }

                });
            } else {
                // $("#state").empty();
                /*$("#city").empty();*/
            }
        }

        // }

        @isset($user)
        loadState('<?php echo isset($user) ? $user->country : '';?>', true);
        @endisset

        /*$('#city').chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });*/
        $('#web_server').chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
        $('#user_role').chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
        $('#trunk').chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
        $('#timezone').chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%",
            search_contains: true
        });
        $('#c2c_trunk').chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%",
            search_contains: true
        });
        $('#broadcast_trunk').chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%",
            search_contains: true
        });

        $('.chosen-select').chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%",
            search_contains: true
        });
        // shownumberext();

        $('#c2c_trunk').change(function () {
            if ($(this).val() != '') {

                $(this).parent().addClass('focused');
            } else {
                $(this).parent().removeClass('focused');
            }
        });

        $('#broadcast_trunk').change(function () {
            if ($(this).val() != '') {

                $(this).parent().addClass('focused');
            } else {
                $(this).parent().removeClass('focused');
            }
        });

        $('#extension_trunk').change(function () {
            if ($(this).val() != '') {

                $(this).parent().addClass('focused');
            } else {
                $(this).parent().removeClass('focused');
            }
        });

        $('.chosen-select').change(function(){
            if($(this).val() != ''){

                $(this).parent().addClass('focused');
                var id = $(this).attr("id");
                $("#"+id+"-error").remove();
            }else{
                $(this).parent().removeClass('focused');
            }
        });

        // $('#contract_end_date').datetimepicker({
        //     format: 'YYYY-MM-DD',
        //     minDate: today,
        // });
    </script>
@endsection
@endif

